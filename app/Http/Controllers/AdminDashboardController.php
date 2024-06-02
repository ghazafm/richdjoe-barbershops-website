<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Kapster;
use App\Models\Service;
use App\Models\User;
use App\Models\TransactionLog;
use Carbon\Carbon;

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

    public function totalIncome()
    {
        $totalIncome = TransactionLog::where('service_status', 'verified')
            ->where('payment_status', 'verified')
            ->sum('total_price');

        return view('admin.index', ['totalIncome' => $totalIncome]);
    }

    public function monthlyIncome()
    {
        $sixMonthsAgo = Carbon::now()->subMonths(6)->startOfMonth();
        $now = Carbon::now();

        $monthlyIncome = TransactionLog::where('service_status', 'verified')
            ->where('payment_status', 'verified')
            ->whereBetween('schedule', [$sixMonthsAgo, $now])
            ->get()
            ->groupBy(function ($date) {
                return Carbon::parse($date->schedule)->format('Y-m');
            })
            ->map(function ($row) {
                return $row->sum('total_price');
            });

        return view('admin.monthly_income', ['monthlyIncome' => $monthlyIncome]);
    }
}