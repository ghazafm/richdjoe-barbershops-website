<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function book()
	{
		return view('customer.book');
	}

    public function booksave(Request $req)
	{
		// insert data ke table mahasiswa
		DB::table('transaction')->insert([
			'alamat' => $req->alamat,
			'customer_id' => $req->id,
			'ipk' => $req->ipk
		]);
		// alihkan halaman ke halaman mahassiwa
		return redirect('/student');
	}
}
