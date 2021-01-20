<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Midtrans\Config;
use Midtrans\Notification;

class MidtransController extends Controller
{
    // Callback Midtrans
    public function callback()
    {
        // Set Konfigurasi Midtrans
        Config::$serverKey = config('service.midtrans.serverKey');
        Config::$isProduction = config('service.midtrans.isProduction');
        Config::$isSanitized = config('service.midtrans.isSanitized');
        Config::$is3ds = config('service.midtrans.is3ds');

        // Buat Instance Midtrans NOtification
        $notification = new Notification();

        // Assign Variable YAng Dibutuhkan
        $status = $notification->transaction_status;
        $type = $notification->payment_type;
        $fraud = $notification->fraud_status;
        $order_id = $notification->order_id;

        // Cari Transaksi Berdasarkan Id Order
        $transaction = Transaction::findOrFail($order_id);

        // Handel Notifikasi Status Midtrans
        if ($status == 'capture') {
            if ($type == 'credit_card') {
                if ($fraud == 'challenge') {
                    $transaction->status = 'PENDING';
                } else {
                    $transaction->status = 'SUCCESS';
                }
            }
        } else if ($status == 'settlement') {
            $transaction->status = 'SUCCESS';
        } else if ($status == 'pending') {
            $transaction->status = 'PENDING';
        } else if ($status == 'deny') {
            $transaction->status = 'CANCELLED';
        } else if ($status == 'expire') {
            $transaction->status = 'CANCELLED';
        } else if ($status == 'cancel') {
            $transaction->status = 'CANCELLED';
        }

        // Simpan Transaksi
        $transaction->save();
    }

    // Redirect Success
    public function success()
    {
        return view('midtrans.success');
    }

    // Redirect Unfinished
    public function unfinished()
    {
        return view('midtrans.success');
    }

    // Redirect Error
    public function error()
    {
        return view('midtrans.success');
    }
}
