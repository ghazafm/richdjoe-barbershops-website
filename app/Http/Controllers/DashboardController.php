<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactFormSubmitted;
use App\Models\Kapster;
use App\Models\Service;
use Illuminate\Support\Facades\Mail;

class DashboardController extends Controller
{
    public function index()
    {
        $services = $this->getServices();
        $kapsters = $this->getKapsters();
        return view('user.index', ['services' => $services, 'kapsters' => $kapsters]);
    }
    public function getServices()
    {
        return Service::get();
    }

    public function getKapsters()
    {
        return Kapster::get();
    }
    public function sendMessage(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Send email
        Mail::to('college@fauzanghaza.com')->send(new ContactFormSubmitted($validatedData));

        // Redirect back with a success message
        return view('user.index')->with('success', 'Your message has been sent successfully!');
    }
}
