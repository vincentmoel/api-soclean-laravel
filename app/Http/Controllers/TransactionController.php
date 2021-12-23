<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;


class TransactionController extends Controller
{

    public function index()
    {
        
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'weight' => 'required|numeric',
            'service' => 'required',
            'price' => 'required|numeric',
            'status' => 'required'
        ]);

        $validatedData['invoice'] = 1;
        Transaction::create($validatedData);

        return response()->json(['message' => 'success']);
    }

    public function show(Transaction $transaction)
    {
        //
    }

    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    public function destroy(Transaction $transaction)
    {
        //
    }
}
