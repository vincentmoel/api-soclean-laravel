<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;


class TransactionController extends Controller
{

    public function index()
    {
        return response()->json([
            'data' => Transaction::get()
        ]);
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'member' => 'required',
            'kode_pesanan' => 'required',
            'layanan' => 'required',
            'paket' => 'required',
            'berat' => 'required',
            'tgl_masuk' => 'required',
            'tgl_estimasi' => 'required',
            'status' => 'required',
            'harga' => 'required',
        ]);

        Transaction::create($validatedData);

        return response()->json(['message' => 'success']);
    }

    public function show(Transaction $transaction)
    {
        return response()->json([
            'data' => $transaction
        ]);
    }

    public function update(Request $request, Transaction $transaction)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'member' => 'required',
            'kode_pesanan' => 'required',
            'layanan' => 'required',
            'paket' => 'required',
            'berat' => 'required',
            'tgl_masuk' => 'required',
            'tgl_estimasi' => 'required',
            'status' => 'required',
            'harga' => 'required',
        ]);

        $transaction = Transaction::where('invoice',$transaction->invoice)->update($validatedData);



        return response()->json([
            'message' => "success"
        ]);
    }
}
