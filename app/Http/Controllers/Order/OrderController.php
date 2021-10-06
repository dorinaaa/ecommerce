<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class OrderController extends Controller
{
    public function getOrdersById(Request $request){

        //var_dump($request->selected_order_id);

        try {
            //$order =  $this->findOneOrFail($request->selected_order_id);

            $order_statuses = DB::table('statuses')
            ->select('name', 'color', 'statuses.id', 'orders.id as porosi_id')
            ->join('orders', 'orders.status_id', '=', 'statuses.id')
            ->where('orders.id', $request->selected_order_id)
            ->get();
            
            return view('orders.tracking', compact('order_statuses'));
    
        } catch (ModelNotFoundException $e) {
    
            throw new ModelNotFoundException($e);
        }
    }
}
