<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
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

	public function confirm($user_id, $service_id, $kapster_id, $schedule)
	{
		// return view('book.log', ['transaction' => $transaction]);
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

			// Pass the data to the view
		return view('book.detail_book', ['transaction' => $transaction]);
	}

	public function cancel($id)
	{
		// Find the transaction by its ID
		$transaction = Transaction::findOrFail($id);

		// Update the payment_status to "verified"
		$transaction->update(['service_status' => 'cancelled']);
		

		// Redirect back with a success message
		return redirect()->back()->with('success', 'Payment cancelled.');
	}


	// Back button ===============================================================
	public function backIndex()
	{
		$uniquePlaces = Kapster::distinct()->pluck('place');
		// Pass the data to the view
		return view('book.index', ['uniquePlaces' => $uniquePlaces]);
	}
	public function backServices($place)
	{
		// Retrieve Services with pagination
		$services = Service::where('type', 'LIKE', 'other');

		// Pass the data to the view
		return view('book.service', ['services' => $services, 'place' => $place]);
	}
	public function backKapster($place, $service)
	{
		$kapsters = Kapster::where('place', 'LIKE', $place);
		// Pass the data to the view
		return view('book.kapster', ['kapsters' => $kapsters, 'service' => $service, 'place' => $place]);
	}
}
