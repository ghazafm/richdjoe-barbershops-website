<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\Kapster;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
		$services = Service::where('type', 'LIKE', 'other');

		// Pass the data to the view
		return view('book.service', ['services' => $services, 'place' => $place]);
	}

	public function haircut($place)
	{
		$services = Service::where('type', 'LIKE', 'haircut');
		return view('user.services.haircut', ['services' => $services, 'place' => $place]);
	}

	public function kapsters($place, $service)
	{
		$kapsters = Kapster::where('place', 'LIKE', $place);

		// Pass the data to the view
		return view('user.services.kapster', ['kapsters' => $kapsters, 'service' => $service, 'place' => $place]);
	}

	public function showKapster($search)
	{
		$kapster = Kapster::find($search);

		// Pass the data to the view
		return view('user.services.kapster', ['kapster' => $kapster]);
	}


	public function confirmation($place, $service, $kapster)
	{
		$user = auth()->user();
		$transactionData = [
			'customer_id' => $user->id, // Replace with actual customer ID
			'kapster_id' => $kapster->id, // Assuming $kapster is an object
			'service_id' => $service->id, // Assuming $service is an object
			'total_price' => $service->price, // Replace with actual total price
		];

		// Create the transaction
		$transaction = Transaction::create($transactionData);

		// Pass the data to the view
		return view('user.services.confirmation', [
			'kapster' => $kapster,
			'service' => $service,
			'place' => $place,
			'transaction' => $transaction // Pass the transaction to the view if needed
		]);
	}

	public function confirm($transaction)
	{
		return view('user.services.log', ['transaction' => $transaction]);
	}


	// Back button ===============================================================
	public function backIndex()
	{
		$uniquePlaces = Kapster::distinct()->pluck('place');
		// Pass the data to the view
		return view('user.services.index', ['uniquePlaces' => $uniquePlaces]);
	}
	public function backServices($place)
	{
		// Retrieve Services with pagination
		$services = Service::where('type', 'LIKE', 'other');

		// Pass the data to the view
		return view('user.services.service', ['services' => $services, 'place' => $place]);
	}
	public function backKapster($place, $service)
	{
		$kapsters = Kapster::where('place', 'LIKE', $place);
		// Pass the data to the view
		return view('user.services.kapster', ['kapsters' => $kapsters, 'service' => $service, 'place' => $place]);
	}
}
