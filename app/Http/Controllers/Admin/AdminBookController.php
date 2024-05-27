<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\TransactionLog;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Import Auth facade

class AdminBookController extends Controller
{
	public function book()
{
    $transactions = Transaction::with(['user', 'kapster', 'service'])
        ->where('service_status', 'wait')
        ->get();

    // Menghitung jumlah transaksi
    $transactionCount = $transactions->count();

    // Pass data transaksi dan jumlah transaksi ke view
    return view('admin.book', [
        'transaction' => $transactions,
        'transactionCount' => $transactionCount
    ]);
}


	public function detail_book($id)
	{
		$transaction = Transaction::with(['user', 'service', 'kapster'])->find($id);

		if ($transaction) {
			return view('admin.book_detail', compact('transaction'));
		} else {
			return response()->view('admin.book_detail', ['error' => 'Booking not found'], 404);
		}
	}

	public function add()
	{
		return view('admin.addbook');
	}

	public function addsave(Request $req)
	{
		// Validate the incoming request data
		$validated = $req->validate([
			'kapster_id' => 'required|integer',
			'service_id' => 'required|integer',
		]);

		try {
			$validated['service_status'] = 'verified';

			$service = Service::findOrFail($validated['service_id']);

			// Calculate the total price based on the service price
			$totalPrice = $service->price;
			$validated['total_price'] = $totalPrice;

			// Add the current user's ID as the customer_id
			$validated['user_id'] = Auth::id();

			// Add the current timestamp for the 'schedule' field
			$validated['schedule'] = now();

			// Create a new transaction record using Eloquent
			Transaction::create($validated);

			// Redirect to the booking page with a success message
			return redirect('/admin/book')->with('success', 'Transaction added successfully.');
		} catch (\Exception $e) {
			// Handle any exceptions and redirect back with an error message
			return redirect()->back()->with('error', 'Failed to add transaction: ' . $e->getMessage());
		}
	}

	public function edit($id)
	{
		// Fetch transaction data by ID using Eloquent
		$transaction = Transaction::findOrFail($id);

		// Return view with transaction data
		return view('booking', compact('transaction'));
	}

	public function editsave(Request $req)
	{
		$validated = $req->validate([
			// 'customer_id' => 'required|integer',
			// 'kapster_id' => 'required|integer',
			// 'service_id' => 'required|integer',
			'total_price' => 'required|numeric',
			'service_status' => 'required|string|max:4',
			'payment_status' => 'required|boolean',
			'rating' => 'nullable|integer',
			'comment' => 'nullable|string|max:255'
		]);

		try {
			// Update data in the transaction table using Eloquent
			$transaction = Transaction::findOrFail($validated['id']);
			$transaction->update($validated);

			// Redirect to the student page with success message
			return redirect('booking')->with('success', 'Transaction updated successfully.');
		} catch (\Exception $e) {
			// Handle the exception and redirect back with an error message
			return redirect()->back()->with('error', 'Failed to update transaction: ' . $e->getMessage());
		}
	}

	public function delete($id)
	{
		try {
			// Delete transaction using Eloquent
			Transaction::where('id', $id)->delete();

			// Redirect to the student page with success message
			return redirect('booking')->with('success', 'Transaction deleted successfully.');
		} catch (\Exception $e) {
			// Handle the exception and redirect back with an error message
			return redirect()->back()->with('error', 'Failed to delete transaction: ' . $e->getMessage());
		}
	}

	public function search_book(Request $req)
	{
		$search = $req->input('search');

		// Search transactions using Eloquent
		$transactions = Transaction::where('id', 'LIKE', '%' . $search . '%')
			->orwhere('customer_id', 'like', '%' . $search . '%')
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
		return view('student.index', ['transactions' => $transactions]);
	}

	public function filter_book(Request $req)
	{
		$query = Transaction::query();
		


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
			$query->whereBetween('total_price', [$req->input('price_from'), $req->input('price_to')]);
		}

		if ($req->filled('date_from') && $req->filled('date_to')) {
			$query->whereBetween('created_at', [$req->input('date_from'), $req->input('date_to')]);
		}

		$transactions = $query->get();
		$transactionCount = $transactions->count();


		return view('admin.book', ['transaction' => $transactions, 'transactionCount' => $transactionCount]);
	}

	public function sort_book(Request $req)
	{
		// Retrieve transactions with service_status set to "wait"
		$transactions = Transaction::with(['user', 'kapster', 'service'])
			->where('service_status', 'wait');

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

	public function verify_service($id)
	{
		// Find the transaction by its ID
		$transaction = Transaction::findOrFail($id);

		// Update the service_status to "verified"
		$transaction->update(['service_status' => 'verified']);

		// Redirect back with a success message
		return redirect()->back()->with('success', 'Service verified successfully.');
	}


	public function decline_service($id)
	{
		// Find the transaction by its ID
		$transaction = Transaction::findOrFail($id);

		// Update the service_status to "decline"
		$transaction->update(['service_status' => 'decline']);

		// Log
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
		return redirect()->back()->with('success', 'Service declined.');
	}




	// Helper =============================================================================================
	private function sortTransactions($transactions, $sortBy, $sortOrder)
	{
		return $transactions->orderBy($sortBy, $sortOrder)->paginate(10);
	}
}
