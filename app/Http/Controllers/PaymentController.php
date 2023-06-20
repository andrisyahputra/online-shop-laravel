<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Midtrans\Config;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    //
    public function notify(Request $request){
        Config::$isProduction = false;
        Config::$serverKey = env('MIDTRANS_API_KEY');

        $transaction = $request->transaction_status;
        $type = $request->payment_type;
        $order_id = $request->order_id;
        $fraud = $request->fraud_status;
        function trx_update($order_id,$success){
            $trx = Transaksi::where('order_id', $order_id);
            $trx->update(['status' => $success]);
        }

        if ($transaction == 'capture') {
            // For credit card transaction, we need to check whether transaction is challenge by FDS or not
            if ($type == 'credit_card') {
                if ($fraud == 'challenge') {
                    // TODO set payment status in merchant's database to 'Challenge by FDS'
                    // TODO merchant should decide whether this transaction is authorized or not in MAP
                    echo "Transaction order_id: " . $order_id . " is challenged by FDS";
                } else {
                    trx_update($order_id,'success');
                }
            }
        } else if ($transaction == 'settlement') {
            trx_update($order_id,'success');
        } else if ($transaction == 'pending') {
            trx_update($order_id,'pending');
        } else if ($transaction == 'deny') {
            trx_update($order_id,'deny');
        } else if ($transaction == 'expire') {
            trx_update($order_id,'expire');
        } else if ($transaction == 'cancel') {
            trx_update($order_id,'cencel');
        }
    }
}
