<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\TransactionLogController;


class AdminPaymentController extends Controller
{

    // Payment ====================================================
    public function payment()
    {
        // Retrieve transactions with service_status set to "verified"
        $transactions = Transaction::with(['user', 'kapster', 'service'])
            ->where('service_status', 'verified')
            ->paginate(10);

        // Pass the data to the view
        return view('admin.payment', ['transactions' => $transactions]);
    }

    public function detail($id)
	{
		$transaction = Transaction::with(['user', 'service', 'kapster'])->find($id);

		if ($transaction) {
			return view('admin.payment_detail', compact('transaction'));
		} else {
			return response()->view('admin.payment_detail', ['error' => 'Payment not found'], 404);
		}
	}


    public function verify_payment(Request $request)
    {
        // Validate the request
        $request->validate([
            'transaction_id' => 'required|exists:transactions,id',
        ]);

        try {
            // Find the transaction by its ID
            $transaction = Transaction::findOrFail($request->input('transaction_id'));

            // Update the payment_status to "verified"
            $transaction->update(['payment_status' => 'verified']);

            // Log the transaction
            TransactionLogController::logTransaction($transaction);

            // Redirect back with a success message
            return redirect()->back()->with('success', 'Payment verified successfully.');
        } catch (\Exception $e) {
            // Handle any exceptions and redirect back with an error message
            return redirect()->back()->with('error', 'Failed to verify payment: ' . $e->getMessage());
        }
    }

    public function search_payment(Request $req)
	{
		$search = $req->input('search');

		// Search transactions using Eloquent
		$transactions = Transaction::where('id', 'LIKE', '%' . $search . '%')
			->orwhere('user_id', 'like', '%' . $search . '%')
			->orWhere('kapster_id', 'like', '%' . $search . '%')
			->orWhere('service_id', 'like', '%' . $search . '%')
			->orWhere('total_price', 'like', '%' . $search . '%')
			->orWhere('service_status', 'like', '%' . $search . '%')
			->orWhere('payment_status', 'like', '%' . $search . '%')
			->orWhere('rating', 'like', '%' . $search . '%')
			->orWhere('comment', 'like', '%' . $search . '%')
			->orWhere('created_at', 'like', '%' . $search . '%')
			->orWhere('updated_at', 'like', '%' . $search . '%')
			->paginate();

		// Return view with search results
		return view('admin.payment', ['transactions' => $transactions]);
	}

    public function filter_payment(Request $req)
    {
        // Initialize a query builder
        $query = Transaction::query();

        // Apply filters based on the request
        if ($req->filled('id')) {
            $query->where('id', $req->input('id'));
        }

        if ($req->filled('customer_id')) {
            $query->where('customer_id', $req->input('customer_id'));
        }

        if ($req->filled('kapster_id')) {
            $query->where('kapster_id', $req->input('kapster_id'));
        }

        if ($req->filled('service_id')) {
            $query->where('service_id', $req->input('service_id'));
        }

        if ($req->filled('service_status')) {
            $query->where('service_status', $req->input('service_status'));
        }

        if ($req->filled('payment_status')) {
            $query->where('payment_status', $req->input('payment_status'));
        }

        if ($req->filled('rating')) {
            $query->where('rating', $req->input('rating'));
        }

        if ($req->filled('comment')) {
            $query->where('comment', 'like', '%' . $req->input('comment') . '%');
        }

        if ($req->filled('price_from') && $req->filled('price_to')) {
            $query->whereBetween('price', [$req->input('price_from'), $req->input('price_to')]);
        }

        if ($req->filled('date_from') && $req->filled('date_to')) {
            $query->whereBetween('created_at', [$req->input('date_from'), $req->input('date_to')]);
        }

        // Filter by service_status set to "verified"
        $query->where('service_status', 'verified');

        // Retrieve filtered transactions with pagination
        $transactions = $query->paginate(10);

        // Pass the data to the view
        return view('admin.book', ['transactions' => $transactions]);
    }

    public function sort_payment(Request $req)
    {
        // Retrieve transactions with service_status set to "verified"
        $transactions = Transaction::with(['user', 'kapster', 'service'])
            ->where('service_status', 'verified');

        // Apply sorting based on the request
        if ($req->filled('sort_by') && $req->filled('sort_order')) {
            $sortBy = $req->input('sort_by');
            $sortOrder = $req->input('sort_order');
            $transactions = $this->sortTransactions($transactions, $sortBy, $sortOrder);
        }

        // Paginate the sorted transactions
        $transactions = $transactions->paginate(10);

        // Pass the data to the view
        return view('admin.book', ['transactions' => $transactions]);
    }


    // Helper =============================================================================================
    private function sortTransactions($transactions, $sortBy, $sortOrder)
    {
        return $transactions->orderBy($sortBy, $sortOrder)->paginate(10);
    }
}
