<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\OrderContract;
use App\Http\Controllers\BaseController;
use App\Models\Statuses;
use App\Orders;
use Illuminate\Http\Request;

class OrderController extends BaseController
{
    protected $orderRepository;

    public function __construct(OrderContract $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function index()
    {
        $orders = Orders::with('orderDetails', 'address')->get();
        $this->setPageTitle('Orders', 'List of all orders');
        return view('admin.orders.index', compact('orders'));
    }

    public function editStatus(Request $request) {
        $order = Orders::query()->where('id', $request->order_id)->first();
        $status = Statuses::query()->where('name', $request->status)->first();
        $order->status_id = $status->id;
        $order->save();
        return redirect()->back();
    }

    public function invoice($id) {
        $order = Orders::with('orderDetails', 'address')->where('id', $id)->first();
        return view('admin.orders.invoice')->with(compact('order'));
    }

    public function show($orderNumber)
    {
        $order = $this->orderRepository->findOrderByNumber($orderNumber);

        $this->setPageTitle('Order Details', $orderNumber);
        return view('admin.orders.show', compact('order'));
    }
}
