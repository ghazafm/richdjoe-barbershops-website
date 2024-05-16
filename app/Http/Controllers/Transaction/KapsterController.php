<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kapster;

class KapsterController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust maximum file size as needed
            'schedule' => 'nullable|string|max:255',
        ]);

        $kapster = new Kapster();
        $kapster->name = $request->name;
        $kapster->schedule = $request->schedule;

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
            $kapster->photo_path = $photoPath;
        }

        $kapster->save();

        return redirect()->back()->with('success', 'Kapster created successfully.');
    }
}
