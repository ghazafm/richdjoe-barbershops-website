<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kapster;

class AdminKapsterController extends Controller
{
    public function index()
    {
        // Retrieve kapsters with pagination
        $kapsters = Kapster::paginate(10);

        // Pass the data to the view
        return view('admin.hairartist', ['kapsters' => $kapsters]);
    }

    public function add()
    {
        return view('admin.kapster.add');
    }

    public function addsave(Request $req)
    {
        // Create a new kapster
        Kapster::create([
            'name' => $req->name,
            'photo' => $req->photo,
            'place' => $req->place,
            'schedule' => $req->schedule,
        ]);

        // Redirect to the kapster page
        return redirect('/admin/kapster');
    }

    public function edit($id)
    {
        // Retrieve the kapster by ID
        $kapster = Kapster::find($id);

        // Pass the data to the view
        return view('admin.kapster.edit', ['kapster' => $kapster]);
    }

    public function editsave(Request $req)
    {
        // Update the kapster
        Kapster::where('id', $req->id)->update([
            'name' => $req->name,
            'photo' => $req->photo,
            'place' => $req->place,
            'schedule' => $req->schedule,
        ]);

        // Redirect to the kapster page
        return redirect('/admin/kapster');
    }

    public function delete($id)
    {
        // Delete the kapster
        Kapster::where('id', $id)->delete();

        // Redirect to the kapster page
        return redirect('/admin/kapster');
    }

    public function search(Request $req)
    {
        $search = $req->search;

        // Search kapsters by name or place
        $kapsters = Kapster::where('id', 'LIKE', '%' . $search . '%')
            ->orwhere('name', 'like', '%' . $search . '%')
            ->orWhere('photo', 'like', '%' . $search . '%')
            ->orWhere('place', 'like', '%' . $search . '%')
            ->orWhere('schedule', 'like', '%' . $search . '%')
            ->orWhere('created_at', 'like', '%' . $search . '%')
            ->orWhere('updated_at', 'like', '%' . $search . '%')
            ->paginate();

        // Pass the data to the view
        return view('admin.kapster.index', ['kapsters' => $kapsters]);
    }

    public function filter(Request $req)
    {
        $query = Kapster::query();

        if ($req->filled('id')) {
            $query->where('customer_id', $req->input('customer_id'));
        }

        if ($req->filled('name')) {
            $query->where('name', $req->input('name'));
        }

        if ($req->filled('photo')) {
            $query->where('photo', $req->input('photo'));
        }

        if ($req->filled('place')) {
            $query->where('place', $req->input('place'));
        }

        if ($req->filled('schedule')) {
            $query->where('schedule', $req->input('schedule'));
        }

        if ($req->filled('date_from') && $req->filled('date_to')) {
            $query->whereBetween('created_at', [$req->input('date_from'), $req->input('date_to')]);
        }

        $transactions = $query->paginate();

        return view('admin.book', ['transactions' => $transactions]);
    }
}
