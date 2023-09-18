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
    
}

