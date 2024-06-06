<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\TransactionLog;
use App\Models\Kapster;
use App\Models\Place;
use App\Models\Service;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;


class UserBookController extends Controller
{
	public function index()
	{
		$places = Place::all();
		// Pass the data to the view
		return view('book.index', ['places' => $places]);
	}

	public function services($place)
	{
		// Retrieve Services with pagination
		$services = Service::where('type', 'LIKE', 'other')->get();

		// Pass the data to the view
		return view('book.service', ['services' => $services, 'place' => $place]);
	}

	public function haircut($place)
	{
		$services = Service::where('type', 'LIKE', 'haircut')->get();
		return view('book.haircut', ['services' => $services, 'place' => $place]);
	}

	public function kapsters($place, $service)
	{
		$kapsters = Kapster::where('place_id', 'LIKE', $place)->get();

		// Pass the data to the view
		return view('book.kapster', ['kapsters' => $kapsters, 'service' => $service, 'place' => $place]);
	}

	public function showKapster($place, $service, $id)
	{
		$kapster = Kapster::find($id);
		$ratingComment = $this->getReview($id);

		// Check if the response is a JSON response and handle accordingly
		if ($ratingComment instanceof \Illuminate\Http\JsonResponse) {
			return $ratingComment;
		}

		$rating = $ratingComment['average_rating'];
		$comments = $ratingComment['comments'];

		// Pass the data to the view
		return view('book.profil_kapster', [
			'place' => $place,
			'service' => $service,
			'kapster' => $kapster,
			'rating' => $rating,
			'comments' => $comments
		]);
	}

	public function schedule($place, $service, $kapster)
	{
		// Pass the data to the view
		return view('book.jadwal', ['kapster' => $kapster, 'service' => $service, 'place' => $place]);
	}


	public function confirmation($place, $serviceId, $kapsterId, Request $request)
	{
		// Ensure the user is authenticated
		if (Auth::check()) {

			// Find the service by ID and extract its price
			$service = Service::find($serviceId);
			if (!$service) {
				return redirect()->back()->with('error', 'Invalid Service');
			}

			// Find the kapster by ID
			$kapster = Kapster::find($kapsterId);
			if (!$kapster) {
				return redirect()->back()->with('error', 'Invalid Kapster');
			}

			// Get the date and time from the query parameters
			$date = $request->query('date');
			$time = $request->query('time');

			$place = $kapster->place;
			if (!$place) {
				return redirect()->back()->with('error', 'Invalid Place associated with Kapster');
			}
			// Construct the datetime value for the schedule
			if ($date && $time) {
				try {
					$schedule = Carbon::createFromFormat('Y-m-d H:i', $date . ' ' . $time);
				} catch (\Exception $e) {
					return redirect()->back()->with('error', 'Invalid date or time format');
				}
			} else {
				return redirect()->back()->with('error', 'Date and time are required');
			}

			// Prepare transaction data
			$user = Auth::user();
			// Create the transaction

			// Pass the data to the view
			return view('book.konfirmasi', [
				'user' => $user,
				'kapster' => $kapster,
				'service' => $service,
				'schedule' => $schedule, // Store the constructed datetime value
			]);
		} else {
			return redirect()->route('login')->with('error', 'You must be logged in to confirm a booking.');
		}
	}


	public function confirm($place, $service_id, $kapster_id, $schedule)
	{
		$user = Auth::user();
		$service = Service::find($service_id);
		$kapster = Kapster::find($kapster_id);

		$transactionData = [
			'user_id' => $user->id,
			'kapster_id' => $kapster->id,
			'service_id' => $service->id,
			'schedule' => $schedule, // Store the constructed datetime value
			'total_price' => $service->price, // Use the service's price
		];

		$transaction = Transaction::create($transactionData);

		// Redirect to a route that shows the details of the booking
		return redirect()->route('transaction.detail', ['transaction' => $transaction->id]);
	}


	public function cancel($id)
	{
		// Find the transaction by its ID
		$transaction = Transaction::findOrFail($id);

		// Update the payment_status to "verified"
		$transaction->update(['service_status' => 'cancelled']);

		TransactionLog::create([
			'id' => $transaction->id,
			'user_id' => $transaction->user->id,
			'user_name' => $transaction->user->name,
			'user_email' => $transaction->user->email,
			'kapster_id' => $transaction->kapster->id,
			'kapster_name' => $transaction->kapster->name,
			'service_id' => $transaction->service->id,
			'service_name' => $transaction->service->name,
			'schedule' => $transaction->schecule,
			'total_price' => $transaction->total_price,
			'service_status' => $transaction->service_status,
			'payment_status' => $transaction->payment_status,
			'rating' => $transaction->rating,
			'comment' => $transaction->comment
		]);

		// Redirect back with a success message
		return redirect('/');
	}

	public function showTransactionDetail(Transaction $transaction)
	{
		return view('book.detail_book', ['transaction' => $transaction]);
	}



	// History booking ============================================================
	public function mybook()
	{
		$user = Auth::user();
		$transactions = Transaction::where('user_id', $user->id)->get();
		return view('book.my_book', ['transactions' => $transactions]);
	}

	public function review($transaction)
	{

		$transaction = Transaction::with(['kapster'])->find($transaction);

		return view('book.review', ['transaction' => $transaction]);
	}

	public function setReview(Request $request)
	{
		$request->validate([
			'transactionId' => 'required|exists:transactions,id',
			'rating' => 'required|integer|min:1|max:5',
			'comment' => 'required|string|max:255',
		]);

		$transactionId = $request->input('transactionId');
		$rating = $request->input('rating');
		$comment = $request->input('comment');

		Transaction::where('id', $transactionId)->update([
			'comment' => $comment,
			'rating' => $rating,
		]);

		return response()->json(['message' => 'Review submitted successfully']);
	}

	public function getReview($kapsterId)
	{
		// Retrieve the kapster by ID
		$kapster = Kapster::with('transactions')->find($kapsterId);

		if (!$kapster) {
			return response()->json(['error' => 'Kapster not found'], 404);
		}

		// Filter out transactions with both rating and comment
		$ratedTransactions = $kapster->transactions->filter(function ($transaction) {
			return $transaction->rating !== null && $transaction->comment !== null;
		});

		// Sort transactions by creation date in descending order
		$sortedTransactions = $ratedTransactions->sortByDesc('created_at');

		// Map transactions into comments array
		$comments = $sortedTransactions->map(function ($transaction) {
			return [
				'name' => $transaction->user->name ?? 'Anonymous', // Assuming there is a user relationship
				'date' => $transaction->created_at->format('M d, Y'), // Format the date as needed
				'comment' => $transaction->comment,
				'rating' => $transaction->rating,
			];
		});

		// Calculate the average rating
		$averageRating = $ratedTransactions->isEmpty() ? null : $ratedTransactions->avg('rating');

		// Return the average rating and comments
		return ['average_rating' => $averageRating, 'comments' => $comments];
	}
}
