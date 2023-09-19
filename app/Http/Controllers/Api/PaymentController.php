<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class PaymentController extends Controller
{
    public function salvaDatiPayment(Request $request)
    {
        $dati = $request->input('dati');

        // $dati = $request->validate([
        //     'total_amount' => 'numeric|min:0',
        //     'order_status' => 'boolean',
        // ]);

        // $order = new Order();
        // $order->total_amount = $request->total_amount;
        // $order->order_status = $request->order_status;
        // $order->save();

        return response()->json(['messaggio' => $dati]);
    }

    public function inviaDati(Request $request)
    {
        $name = $request->input('name');
        $last_name = $request->input('last_name');
        $address = $request->input('address');
        $email = $request->input('email');
        $mobile_phone = $request->input('mobile_phone');
        $date_time = $request->input('date_time');
        $total_amount = $request->input('total_amount');
        $order_status = $request->input('order_status');
        $restaurant_id = $request->input('restaurant_id');

        return response()->json(['message' => 'Dati ricevuti con successo'], 200);
    }
}
