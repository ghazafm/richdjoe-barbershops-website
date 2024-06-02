<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\TransactionLog;
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
            ->where('payment_status', 'process')
            ->get();
        $paymentCount = $transactions->count();


        // Pass the data to the view
        return view('admin.payment', ['transactions' => $transactions, 'paymentCount' => $paymentCount]);
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


    public function verify_payment($id)
    {
        // Validate the request


        // Find the transaction by its ID
        $transaction = Transaction::findOrFail($id);

        // Update the payment_status to "verified"
        $transaction->update(['payment_status' => 'verified']);

        // Log the transaction

        TransactionLog::create([
            'id' => $transaction->id,
            'user_id' => $transaction->user->id,
            'user_name' => $transaction->user->name,
            'user_email' => $transaction->user->email,
            'kapster_id' => $transaction->kapster->id,
            'kapster_name' => $transaction->kapster->name,
            'service_id' => $transaction->service->id,
            'service_name' => $transaction->service->name,
            'schedule' => $transaction->schedule,
            'total_price' => $transaction->total_price,
            'service_status' => $transaction->service_status,
            'payment_status' => $transaction->payment_status,
            'rating' => $transaction->rating,
            'comment' => $transaction->comment
        ]);


        // Redirect back with a success message
        return redirect()->back()->with('success', 'Payment verified successfully.');
    }

    public function decline_payment($id)
	{
        // Find the transaction by its ID
        $transaction = Transaction::findOrFail($id);

        // Update the payment_status to "decline"
        $transaction->update(['payment_status' => 'decline']);

        // Log the transaction

        TransactionLog::create([
            'id' => $transaction->id,
            'user_id' => $transaction->user->id,
            'user_name' => $transaction->user->name,
            'user_email' => $transaction->user->email,
            'kapster_id' => $transaction->kapster->id,
            'kapster_name' => $transaction->kapster->name,
            'service_id' => $transaction->service->id,
            'service_name' => $transaction->service->name,
            'schedule' => $transaction->schedule,
            'total_price' => $transaction->total_price,
            'service_status' => $transaction->service_status,
            'payment_status' => $transaction->payment_status,
            'rating' => $transaction->rating,
            'comment' => $transaction->comment
        ]);


        // Redirect back with a success message
        return redirect()->back()->with('success', 'Payment cancelled.');
	}


    public function search_payment(Request $req)
    {
        $search = $req->input('search');

        // Search transactions using Eloquent
        $transactions = Transaction::where('service_status', 'verified')
            ->where('payment_status', 'process')
            ->where(function ($query) use ($search) {
                $query->where('id', 'LIKE', '%' . $search . '%')
                    ->orWhere('total_price', 'like', '%' . $search . '%')
                    ->orWhere('schedule', 'like', '%' . $search . '%')
                    ->orWhereHas('user', function ($query) use ($search) {
                        $query->where('name', 'like', '%' . $search . '%');
                    })
                    ->orWhereHas('kapster', function ($query) use ($search) {
                        $query->where('name', 'like', '%' . $search . '%');
                    })
                    ->orWhereHas('service', function ($query) use ($search) {
                        $query->where('name', 'like', '%' . $search . '%');
                    });
            })
            ->get();

        // Return view with search results
        return view('admin.payment', ['transactions' => $transactions, 'paymentCount' => $transactions->count()]);
    }


    public function filter_payment(Request $req)
    {
        // Initialize a query builder with fixed conditions for service_status and payment_status
        $query = Transaction::query()
            ->where('service_status', 'verified')
            ->where('payment_status', 'process');

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

        if ($req->filled('rating')) {
            $query->where('rating', $req->input('rating'));
        }

        if ($req->filled('comment')) {
            $query->where('comment', 'like', '%' . $req->input('comment') . '%');
        }

        if ($req->filled('price_from') && $req->filled('price_to')) {
            $query->whereBetween('total_price', [$req->input('price_from'), $req->input('price_to')]);
        }

        if ($req->filled('date_from') && $req->filled('date_to')) {
            $query->whereBetween('schedule', [$req->input('date_from'), $req->input('date_to')]);
        }

        // Retrieve filtered transactions with pagination
		$transactions = $query->get();
		$transactionCount = $transactions->count();

        // Pass the data to the view
        return view('admin.payment', ['transactions' => $transactions, 'paymentCount' => $transactionCount]);
    }


    public function sort_payment(Request $req)
    {
        // Retrieve transactions with service_status set to "verified"
        $transactions = Transaction::with(['user', 'kapster', 'service'])
            ->where('service_status', 'verified')
            ->where('payment_status', 'process');

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
