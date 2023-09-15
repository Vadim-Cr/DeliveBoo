<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class PaymentController extends Controller
{
    public function salvaDatiPayment(Request $request)
    {
        try {
            $request->validate([
                'total_amount' => 'required|numeric|min:0',
                'order_status' => 'required|boolean',
            ]);

            $order = new Order();
            $order->totalAmount = $request->total_amount;
            $order->orderStatus = $request->order_status;
            $order->save();

            return response()->json(['messaggio' => 'Dati salvati con successo']);
        }   catch (\Exception $e) {
            // Gestisci eventuali errori
            return response()->json(['messaggio' => 'Errore durante il salvataggio dei dati', 'errore' => $e->getMessage()], 500);
        }
    }
    
}

