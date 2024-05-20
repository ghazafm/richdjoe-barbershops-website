<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;

class AdminServiceController extends Controller
{
    public function index()
    {
        // Retrieve Services with pagination
        $services = Service::paginate(10);

        // Pass the data to the view
        return view('admin.service.index', ['services' => $services]);
    }

    public function add()
    {
        return view('admin.service.add');
    }

    public function addsave(Request $req)
    {
        // Create a new Service
        Service::create([
            'name' => $req->name,
            'description' => $req->name,
            'price' => $req->price,
        ]);

        // Redirect to the Service page
        return redirect('/admin/Service');
    }

    public function edit($id)
    {
        // Retrieve the Service by ID
        $service = Service::find($id);

        // Pass the data to the view
        return view('admin.service.edit', ['service' => $service]);
    }

    public function editsave(Request $req)
    {
        // Update the Service
        Service::where('id', $req->id)->update([
            'name' => $req->name,
            'description' => $req->name,
            'price' => $req->price,
        ]);

        // Redirect to the Service page
        return redirect('/admin/Service');
    }

    public function delete($id)
    {
        // Delete the Service
        Service::where('id', $id)->delete();

        // Redirect to the Service page
        return redirect('/admin/Service');
    }

    public function search(Request $req)
    {
        $search = $req->search;

        // Search Services by name or place
        $services = Service::where('id', 'LIKE', '%' . $search . '%')
            ->orwhere('name', 'like', '%' . $search . '%')
            ->orWhere('description', 'like', '%' . $search . '%')
            ->orWhere('price', 'like', '%' . $search . '%')
            ->orWhere('created_at', 'like', '%' . $search . '%')
            ->orWhere('updated_at', 'like', '%' . $search . '%')
            ->paginate();

        // Pass the data to the view
        return view('admin.service.index', ['services' => $services]);
    }
}
