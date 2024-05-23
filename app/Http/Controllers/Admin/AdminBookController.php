<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class AdminBookController extends Controller
{
	public function index()
	{
		$transactions = Transaction::with(['user', 'kapster', 'service'])
			->where('service_status', 'wait')
			->paginate(10);
		

		// Pass the data to the view
		return view('admin.book', ['transaction' => $transactions]);
	}

	public function detail($id)
	{
		$transaction = Transaction::find($id);
        return view('admin.book_detail', compact('transaction'));
	}
	public function booksave(Request $req)
	{
		$validated = $req->validate([
			'customer_id' => 'required|integer',
			'kapster_id' => 'required|integer',
			'service_id' => 'required|integer',
			'total_price' => 'required|numeric',
			'service_status' => 'required|string|max:4',
			'payment_status' => 'required|boolean',
			'rating' => 'nullable|integer',
			'comment' => 'nullable|string|max:255'
		]);

		try {
			// Insert data into the transaction table using Eloquent
			Transaction::create($validated);

			// Redirect to the student page with success message
			return redirect('/student')->with('success', 'Transaction saved successfully.');
		} catch (\Exception $e) {
			// Handle the exception and redirect back with an error message
			return redirect()->back()->with('error', 'Failed to save transaction: ' . $e->getMessage());

			// cara nampilin
			// 	<title>Student Page</title>
			// 	<!-- Add your CSS and JS files here -->
			// </head>
			// <body>
			// 	<!-- Flash Messages -->
			// 	@if (session('success'))
			// 		<div class="alert alert-success">
			// 			{{ session('success') }}
			// 		</div>
			// 	@endif

			// 	@if (session('error'))
			// 		<div class="alert alert-danger">
			// 			{{ session('error') }}
			// 		</div>
			// 	@endif

			// 	<!-- Your other page content -->
			// </body>
			// </html>

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
			'id' => 'required|integer|exists:transactions,id',
			'customer_id' => 'required|integer',
			'kapster_id' => 'required|integer',
			'service_id' => 'required|integer',
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
			$query->whereBetween('price', [$req->input('price_from'), $req->input('price_to')]);
		}

		if ($req->filled('date_from') && $req->filled('date_to')) {
			$query->whereBetween('created_at', [$req->input('date_from'), $req->input('date_to')]);
		}

		$transactions = $query->paginate();

		return view('admin.book', ['transactions' => $transactions]);
	}




	// Payment ====================================================
	public function payment()
	{
		// Retrieve transactions with service_status set to "verified"
		$transactions = Transaction::with(['user', 'kapster', 'service'])
			->where('service_status', 'verified')
			->paginate(10);

		// Pass the data to the view
		return view('admin.book', ['transactions' => $transactions]);
	}


	public function verify_payment(Request $request)
	{
		// Validate the request
		$request->validate([
			'transaction_id' => 'required|exists:transactions,id',
		]);

		// Find the transaction by its ID
		$transaction = Transaction::findOrFail($request->input('transaction_id'));

		// Update the payment_status to "verified"
		$transaction->update(['payment_status' => 'verified']);

		// Redirect back with a success message
		return redirect()->back()->with('success', 'Payment verified successfully.');
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
}
