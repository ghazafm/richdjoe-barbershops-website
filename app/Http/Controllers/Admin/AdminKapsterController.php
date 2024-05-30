<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kapster;
use App\Models\Place;

class AdminKapsterController extends Controller
{
    public function index()
    {
        // Retrieve kapsters with pagination
        $kapsters = Kapster::get();
        $kapstersCount = $kapsters->count();

        // Pass the data to the view
        return view('admin.hairartist', ['kapsters' => $kapsters, 'kapstersCount' => $kapstersCount]);
    }

    public function add()
    {
        $places = Place::all();
        return view('admin.addhairartist',['places'=>$places]);
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
        return redirect('/admin/hairartist');
    }

    public function edit($id)
    {
        // Retrieve the kapster by ID
        $kapster = Kapster::find($id);
        $places = Place::all();

        // Pass the data to the view
        return view('admin.edithairartist', ['kapster' => $kapster],['places'=>$places]);
    }

    public function editsave(Request $req)
    {
        // Update the kapster
        Kapster::where('id', $req->id)->update([
            // 'name' => $req->name,
            'photo' => $req->photo,
            'place' => $req->place,
            'schedule' => $req->schedule,
        ]);

        // Redirect to the kapster page
        return redirect('/admin/hairartist');
    }

    public function delete($id)
    {
        // Delete the kapster
        Kapster::where('id', $id)->delete();

        // Redirect to the kapster page
        return redirect('/admin/hairartist');
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
        return view('admin.hairartist', ['kapsters' => $kapsters, 'kapstersCount' => $kapsters->total()]);
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

        $kapsters = $query->get()->paginate();

        return view('admin.book', ['kapsters' => $kapsters, 'kapsterCount' => $kapsters->total()]);
    }
}
