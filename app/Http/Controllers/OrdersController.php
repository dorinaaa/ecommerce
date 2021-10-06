<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Orders;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    public function index()
    {
        return response()->json(Orders::with(['product'])->get(),200);
    }


    public function deliverOrder(Orders $order)
        {
            $order->is_delivered = true;
            $status = $order->save();

            return response()->json([
                'status'    => $status,
                'data'      => $order,
                'message'   => $status ? 'Order Delivered!' : 'Error Delivering Order'
            ]);
        }

        public function store(Request $request)
        {
            $order = Orders::create([
                'date' => $request->now(),
                'total_price' => $request->total_price,
                'transaction_id' => $request->transaction_id, 
                'user_id' => Auth::id(),
                'address_id' => $request->address_id,
                'status_id' => $request->status_id,
                'transport_method_id' => $request->transport_method_id
     
            ]);

            return response()->json([
                'status' => (bool) $order,
                'data'   => $order,
                'message' => $order ? 'Order Created!' : 'Error Creating Order'
            ]);
        }

        public function destroy(Orders $order)
        {
            $status = $order->delete();

            return response()->json([
                'status' => $status,
                'message' => $status ? 'Order Deleted!' : 'Error Deleting Order'
            ]);
        }
}
