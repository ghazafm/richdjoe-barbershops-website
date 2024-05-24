<?php

namespace App\Http\Controllers;

use App\Models\TransactionLog;
use Illuminate\Http\Request;

class TransactionLogController extends Controller
{
    /**
     * Display a listing of the transaction logs.
     */
    public function index()
    {
        $transactionLogs = TransactionLog::all();
        return response()->json($transactionLogs);
    }

    /**
     * Store a newly created transaction log in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer',
            'user_name' => 'required|string|max:255',
            'user_email' => 'required|email|max:255',
            'kapster_id' => 'required|integer',
            'kapster_name' => 'required|string|max:255',
            'service_id' => 'required|integer',
            'service_name' => 'required|string|max:255',
            'schedule' => 'required|date',
            'total_price' => 'required|numeric',
            'service_status' => 'required|in:wait,decline,verified',
            'payment_status' => 'required|in:process,verified',
            'rating' => 'nullable|integer|min:1|max:5',
            'comment' => 'nullable|string|max:255',
        ]);

        $transactionLog = TransactionLog::create($request->all());

        return response()->json($transactionLog, 201);
    }

    /**
     * Display the specified transaction log.
     */
    public function show($id)
    {
        $transactionLog = TransactionLog::findOrFail($id);
        return response()->json($transactionLog);
    }

    /**
     * Update the specified transaction log in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|integer',
            'user_name' => 'required|string|max:255',
            'user_email' => 'required|email|max:255',
            'kapster_id' => 'required|integer',
            'kapster_name' => 'required|string|max:255',
            'service_id' => 'required|integer',
            'service_name' => 'required|string|max:255',
            'schedule' => 'required|date',
            'total_price' => 'required|numeric',
            'service_status' => 'required|in:wait,decline,verified',
            'payment_status' => 'required|in:process,verified',
            'rating' => 'nullable|integer|min:1|max:5',
            'comment' => 'nullable|string|max:255',
        ]);

        $transactionLog = TransactionLog::findOrFail($id);
        $transactionLog->update($request->all());

        return response()->json($transactionLog);
    }

    /**
     * Remove the specified transaction log from storage.
     */
    public function destroy($id)
    {
        $transactionLog = TransactionLog::findOrFail($id);
        $transactionLog->delete();

        return response()->json(null, 204);
    }
}
