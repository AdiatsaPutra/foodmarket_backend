<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Food;
use App\Models\Transaction;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Midtrans\Config;
use Midtrans\Snap;

class TransactionController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 6);
        $food_id = $request->input('food_id');
        $status = $request->input('status');

        // Mengambil ID
        if ($id) {
            $transaction = Transaction::with(['food', 'user'])->find($id);
            return ResponseFormatter::success(
                $transaction,
                'Data Transaksi Berhasil Diambil'
            );
        } else {
            return ResponseFormatter::error(
                null,
                'Data Transaksi Tidak Ada',
                404
            );
        }

        // Mengambil Selain Id
        $transaction = transaction::with(['food', 'user'])->where('user_id', Auth::user()->id);

        if ($food_id) {
            $transaction->where('name', $food_id);
        }
        if ($status) {
            $transaction->where('name', $status);
        }

        return ResponseFormatter::success(
            $transaction->paginate($limit),
            'Data List Transaksi Berhasil Diambil'
        );
    }

    // Update Transaction
    public function update(Request $request, $id)
    {
        $transaction = Transaction::findOrFail($id);

        $transaction->update($request->all());
        return ResponseFormatter::success($transaction, 'Transaction Berhasil Diupdate');
    }

    // Checkout
    public function checkout(Request $request)
    {
        // Validasi Request Checkout
        $request->validate([
            'food_id' => 'required|exist:food,id',
            'user_id' => 'required|users:food,id',
            'quantity' => 'required',
            'total' => 'required',
            'status' => 'required',
        ]);

        // Transaksi
        $transaction = Transaction::create([
            'food_id' => $request->food_id,
            'user_id' => $request->user_id,
            'quantity' => $request->quantity,
            'total' => $request->total,
            'status' => $request->status,
            'payment_url' => '',
        ]);

        // Konfigurasi Midtrans
        Config::$serverKey = config('service.midtrans.serverKey');
        Config::$isProduction = config('service.midtrans.isProduction');
        Config::$isSanitized = config('service.midtrans.isSanitized');
        Config::$is3ds = config('service.midtrans.is3ds');

        // Membuat Transaksi Yang Tadi Sudah Dibuat (Relasi)
        $transaction = Transaction::with(['food', 'user'])->find($transaction->id);

        // Membuat Variabel Transaksi Midtrans
        $midtrans = [
            'transaction_details' => [
                'order_id' => $transaction->id,
                // Conversikan Transaction Total Ke Integer
                'gross_amount' => (int) $transaction->total,
            ],
            'customer_details' => [
                'first_name' => $transaction->user->name,
                'email' => $transaction->user->email,
            ],
            'enabled_payments' => ['gopay', 'bank_transfer'],
            'vtweb' => []
        ];

        // Memanggil Midtrans
        try {
            // Ambil Halaman Payment Midtrans
            $paymentUrl = Snap::createTransaction($midtrans)->redirect_url;
            $transaction->payment_url = $paymentUrl;
            $transaction->save();

            // Mengembalikan Data Ke API
            return ResponseFormatter::success(
                $transaction,
                'Transaction Berhasil'
            );
        } catch (Exception $e) {
            return ResponseFormatter::error($e->getMessage(), 'Transaksi Gagal');
        }
    }
}
