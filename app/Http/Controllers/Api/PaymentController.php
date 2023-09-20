<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class PaymentController extends Controller
{
    public function inviaDati(Request $request)
    {   
        return response()->json([$request]);
    }
}

        // $order = new Order();

        // $order->name = $request->input('name');
        // $order->last_name = $request->input('last_name');
        // $order->address = $request->input('address');
        // $order->email = $request->input('email');
        // $order->mobile_phone = $request->input('mobile_phone');
        // $order->date_time = $request->date_time;
        // $order->total_amount = $request->total_amount;
        // $order->order_status = $request->order_status;
        // $order->restaurant_id = $request->restaurant_id;

        // $order->save();
        // $name = $request->input('name');
        // $last_name = $request->input('last_name');
        // $address = $request->input('address');
        // $email = $request->input('email');
        // $mobile_phone = $request->input('mobile_phone');
        // $total_amount = $request->input('total_amount');
        // $order_status = $request->input('order_status');
        // $restaurant_id = $request->input('restaurant_id');