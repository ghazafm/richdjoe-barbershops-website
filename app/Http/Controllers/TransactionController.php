<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the transactions.
     */
    public function index()
    {
        $transactions = Transaction::all();
        return response()->json($transactions);
    }

    /**
     * Store a newly created transaction in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_id' => 'required|exists:users,id',
            'kapster_id' => 'required|exists:kapsters,id',
            'service_id' => 'required|exists:services,id',
            'transaction_date' => 'required|date',
            'total_price' => 'required|numeric',
            'service_status' => 'required|string|max:4',
            'payment_status' => 'required|boolean',
            'rating' => 'nullable|integer|min:1|max:5',
            'comment' => 'nullable|string|max:255',
        ]);

        $transaction = Transaction::create($validated);

        return response()->json($transaction, 201);
    }

    /**
     * Display the specified transaction.
     */
    public function show($id)
    {
        $transaction = Transaction::findOrFail($id);
        return response()->json($transaction);
    }

    /**
     * Update the specified transaction in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'customer_id' => 'required|exists:users,id',
            'kapster_id' => 'required|exists:kapsters,id',
            'service_id' => 'required|exists:services,id',
            'transaction_date' => 'required|date',
            'total_price' => 'required|numeric',
            'service_status' => 'required|string|max:4',
            'payment_status' => 'required|boolean',
            'rating' => 'nullable|integer|min:1|max:5',
            'comment' => 'nullable|string|max:255',
        ]);

        $transaction = Transaction::findOrFail($id);
        $transaction->update($validated);

        return response()->json($transaction);
    }

    /**
     * Remove the specified transaction from storage.
     */
    public function destroy($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();

        return response()->json(null, 204);
    }
}
