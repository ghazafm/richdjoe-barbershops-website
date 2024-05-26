<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\Kapster;
use App\Models\Service;
use App\Models\TransactionLog;
use Illuminate\Validation\Rule;
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

	public function schedule($place, $service, $kapsters)
	{
		// Pass the data to the view
		return view('book.jadwal', ['kapsters' => $kapsters, 'service_id' => $service, 'place' => $place]);
	}


	public function confirmation($place, $service, $kapster, $schedule)
	{
		$user = auth()->user();
		$transactionData = [
			'customer_id' => $user->id, // Replace with actual customer ID
			'kapster_id' => $kapster->id, // Assuming $kapster is an object
			'service_id' => $service->id, // Assuming $service is an object
			'schedule' => $schedule,
			'total_price' => $service->price, // Replace with actual total price
		];
		$transactionLog = [
			'id',
			'user_id',
			'user_name',
			'user_email',
			'kapster_id',
			'kapster_name',
			'service_id',
			'service_name',
			'schedule',
			'total_price',
			'service_status',
			'payment_status',
			'rating',
			'comment',
		];
	

		// Create the transaction
		$transaction = Transaction::create($transactionData);
		$transaction = TransactionLog::create($transactionData);

		// Pass the data to the view
		return view('book.konfirmasi', [
			'kapster' => $kapster,
			'service' => $service,
			'place' => $place,
			'transaction' => $transaction // Pass the transaction to the view if needed
		]);
	}

	public function confirm($transaction)
	{
		return view('book.log', ['transaction' => $transaction]);
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
