<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Kapster;
use App\Models\Service;
use Illuminate\Http\Request;

class UserBookController extends Controller
{
	public function index()
	{
		$uniquePlaces = Kapster::distinct()->pluck('place');

		// Pass the data to the view
		return view('user.services.index', ['uniquePlaces' => $uniquePlaces]);
	}

	public function services($place)
	{
		// Retrieve Services with pagination
		$services = Service::where();

		// Pass the data to the view
		return view('user.services.service', ['services' => $services, 'place' => $place ]);
	}

	public function haircut()
	{
		return view('user.services.haircut',['place' => $place ]);
	}

	public function kapsters()
	{
		// Retrieve Services with pagination
		$kapsters = Kapster::all();

		// Pass the data to the view
		return view('user.services.kapster', ['kapsters' => $kapsters]);
	}

	public function showKapster($search)
	{
		// Retrieve Services with pagination
		$kapster = Kapster::where('id', 'LIKE', $search);

		// Pass the data to the view
		return view('user.services.kapster', ['kapster' => $kapster]);
	}


}
