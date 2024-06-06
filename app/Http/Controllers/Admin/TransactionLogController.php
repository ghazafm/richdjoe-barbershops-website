<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TransactionLog;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionLogController extends Controller
{
    /**
     * Display a listing of the transaction logs.
     */
    public function index()
    {
        $logs = TransactionLog::all();
        $logsCount = $logs->count();

        return view('admin.history', ['logs' => $logs, 'logsCount' => $logsCount]);
    }

    public static function logTransaction(Transaction $transaction)
    {
        // Log the transaction
        TransactionLog::create([
            'user_name' => $transaction->user->name,
            'user_address' => $transaction->user->address,
            'kapster_name' => $transaction->kapster->name,
            'kapster_place' => $transaction->kapster->place,
            'service_name' => $transaction->service->name,
            'service_type' => $transaction->service->type,
            'total_price' => $transaction->total_price,
            'service_status' => $transaction->service_status,
            'payment_status' => $transaction->payment_status,
            'rating' => $transaction->rating,
            'comment' => $transaction->comment,
            // Add other fields as needed
        ]);
    }

    public function search_history(Request $req)
    {
        $search = $req->search;

        // Search transaction logs using Eloquent
        $logs = TransactionLog::where('service_status', 'wait')
            ->orwhere('id', 'LIKE', '%' . $search . '%')
            ->orWhere('user_id', 'like', '%' . $search . '%')
            ->orWhere('user_name', 'like', '%' . $search . '%')
            ->orWhere('user_email', 'like', '%' . $search . '%')
            ->orWhere('kapster_id', 'like', '%' . $search . '%')
            ->orWhere('kapster_name', 'like', '%' . $search . '%')
            ->orWhere('service_id', 'like', '%' . $search . '%')
            ->orWhere('service_name', 'like', '%' . $search . '%')
            ->orWhere('schedule', 'like', '%' . $search . '%')
            ->orWhere('total_price', 'like', '%' . $search . '%')
            ->orWhere('service_status', 'like', '%' . $search . '%')
            ->orWhere('payment_status', 'like', '%' . $search . '%')
            ->orWhere('rating', 'like', '%' . $search . '%')
            ->orWhere('comment', 'like', '%' . $search . '%')
            ->orWhere('created_at', 'like', '%' . $search . '%')
            ->orWhere('updated_at', 'like', '%' . $search . '%')
            ->get();

        // Return view with search results
        return view('admin.history', ['logs' => $logs, 'logsCount' => $logs->count()]);
    }
    // Helper========================================================================
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
    public function delete($id)
    {
        $transactionLog = TransactionLog::findOrFail($id);
        $transactionLog->delete();

        return response()->json(null, 204);
    }
    public function filter(Request $req)
	{
		$query = TransactionLog::query();

		if ($req->filled('id')) {
			$query->where('customer_id', $req->input('customer_id'));
		}
        
		if ($req->filled('name')) {
			$query->where('name', $req->input('name'));
		}
        
		if ($req->filled('description')) {
			$query->where('description', $req->input('description'));
		}
        
		if ($req->filled('price_from') && $req->filled('price_to')) {
			$query->whereBetween('total_price', [$req->input('price_from'), $req->input('price_to')]);
		}

		if ($req->filled('date_from') && $req->filled('date_to')) {
			$query->whereBetween('schedule', [$req->input('date_from'), $req->input('date_to')]);
		}

		$transactions = $query->get();
        $transactionCount = $transactions->count();

		return view('admin.history', ['logs' => $transactions, 'logsCount' => $transactionCount]);
	}
}
