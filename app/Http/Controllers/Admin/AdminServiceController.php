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
        $services = Service::get();;
        $serviceCount = $services->count();

        // Pass the data to the view
        return view('admin.service', ['services' => $services, 'serviceCount' => $serviceCount]);
    }

    public function add()
    {
        $types = Service::distinct('type')->pluck('type');
        return view('admin.addservice', compact('types'));
    }


    public function addsave(Request $req)
    {
        $service = Service::create([
            'name' => $req->name,
            'description' => $req->description,
            'type' => $req->type,
            'price' => $req->price,
        ]);

        // Handle file upload
        if ($req->hasFile('photo')) {
            $photo = $req->file('photo');
            $fileName = $service->id . '.jpg';
            $photo->move(public_path('images/services/'), $fileName);
        }

        return redirect('/admin/service');
    }


    public function edit($id)
    {
        // Retrieve the Service by ID
        $types = Service::distinct('type')->pluck('type');
        $service = Service::find($id);

        // Pass the data to the view
        return view('admin.editservice', ['service' => $service, 'types' => $types]);
    }

    public function editsave(Request $req)
    {
        // Update the Service
        Service::where('id', $req->id)->update([
            'name' => $req->name,
            'description' => $req->description,
            'type' => $req->type,
            'price' => $req->price,
        ]);

        // Redirect to the Service page
        return redirect('/admin/service');
    }

    public function delete($id)
    {
        // Delete the Service
        Service::where('id', $id)->delete();

        // Redirect to the Service page
        return redirect('/admin/service');
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
            ->get();

        // Pass the data to the view
        return view('admin.service', ['services' => $services, 'serviceCount' => $services->count()]);
    }

    public function filter(Request $req)
    {
        $query = Service::query();

        if ($req->filled('id')) {
            $query->where('customer_id', $req->input('customer_id'));
        }

        if ($req->filled('name')) {
            $query->where('name', $req->input('name'));
        }

        if ($req->filled('description')) {
            $query->where('description', $req->input('description'));
        }

        if ($req->filled('price_from') && $req->filled('price_to')) {
            $query->whereBetween('price', [$req->input('price_from'), $req->input('price_to')]);
        }

        if ($req->filled('date_from') && $req->filled('date_to')) {
            $query->whereBetween('schedule', [$req->input('date_from'), $req->input('date_to')]);
        }

        $transactions = $query->get();
        $transactionCount = $transactions->count();

        return view('admin.service', ['services' => $transactions, 'serviceCount' => $transactionCount]);
    }
}
