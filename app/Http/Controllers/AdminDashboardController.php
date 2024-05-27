<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Kapster;
use App\Models\Service;
use App\Models\User;
use App\Models\TransactionLog;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $kapsters = Kapster::get();
        $kapstersCount = $kapsters->count();
        $users = User::get();
        $userCount = $users->count();
        $services = Service::get();;
        $serviceCount = $services->count();
        $payment = Service::get();;
        $paymentCount = $payment->count();



        // Pass the data to the view
        return view('admin.index', ['kapstersCount' => $kapstersCount, 'userCount' => $userCount, 'serviceCount' => $serviceCount, 'paymentCount' => $paymentCount]);
    }

   
}
