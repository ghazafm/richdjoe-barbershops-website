<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\TransactionLog;
use App\Models\Kapster;
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
		$uniquePlaces = Kapster::distinct()->pluck('place');
		// Pass the data to the view
		return view('book.index', ['uniquePlaces' => $uniquePlaces]);
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
		$kapsters = Kapster::where('place', 'LIKE', $place)->get();

		// Pass the data to the view
		return view('book.kapster', ['kapsters' => $kapsters, 'service' => $service, 'place' => $place]);
	}

	public function showKapster($place, $service, $id)
	{
		$kapsters = Kapster::find($id);

		// Pass the data to the view
		return view('book.profil_kapster', ['place' => $place, 'service' => $service, 'kapsters' => $kapsters]);
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
		$transactions = Transaction::where('user_id', $user->id)->paginate(10); // Adjust the number as needed
		return view('book.my_book', ['transactions' => $transactions]);
	}
}
