<?php

namespace App\Http\Controllers;

use App\Address;
use App\Http\Controllers\Controller;
use App\Order;
use App\OrderDetails;
use App\PayPal\ExtendedPayPalClient;
use App\Product;
use App\Status;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use PayPalCheckoutSdk\Orders\OrdersCaptureRequest;

class PaymentController extends Controller
{
    public function captureOrder(Request $request)
    {
        $orderId = $request->get('orderID');
        DB::beginTransaction();
        try {
            $address = new Address();
            $address->state = $request->orderData[0]['address']['state'];
            $address->city = $request->orderData[0]['address']['city'];
            $address->street = $request->orderData[0]['address']['street'];
            $address->zip_code = $request->orderData[0]['address']['zip_code'];
            $address->save();
            $order = new Order();
            $order->date = Carbon::now();
            $order->total_price = $request->orderData[0]['total_price'];
            $order->user_id = Auth::id() ? Auth::id() : 1;
            $order->address_id = $address->id;

            $paypalRequest = new OrdersCaptureRequest($orderId);
            $paypalRequest->prefer('return=representation');

            // 3. Call PayPal to capture an authorization
            $client = ExtendedPayPalClient::client();
            $response = $client->execute($paypalRequest);

            $status = Status::query()->where('name', 'Billed')->first();

            if ($response->result->status == 'COMPLETED') {
                $order->status_id = $status->id;
                $order->transaction_id = $response->result->id;
                $order->save();

                foreach ($response->result->purchase_units as $purchase_unit) {
                    foreach ($purchase_unit->items as $item) {
                        $orderDetails = new OrderDetails();
                        $product = Product::query()->where('name', $item->name)->first();
                        $orderDetails->order_id = $order->id;
                        $orderDetails->product_id = $product->id;
                        $orderDetails->quantity = $item->quantity;
                        $orderDetails->total_price = $item->quantity * $product->price;
                        $orderDetails->save();
                    }
                }
                DB::commit();
            }
        } catch (\Exception $exception) {
            DB::rollBack();
        }
    }
}
