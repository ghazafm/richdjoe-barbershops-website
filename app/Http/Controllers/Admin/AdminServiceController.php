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
			$query->whereBetween('created_at', [$req->input('date_from'), $req->input('date_to')]);
		}

		$transactions = $query->paginate();

		return view('admin.book', ['transactions' => $transactions]);
	}
}
