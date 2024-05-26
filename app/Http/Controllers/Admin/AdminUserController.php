<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AdminUserController extends Controller
{
    public function index()
    {
        // Retrieve users with pagination
        $users = User::paginate(10);

        // Pass the data to the view
        return view('admin.user', ['users' => $users]);
    }

    public function add()
    {
        return view('admin.adduser');
    }

    public function addsave(Request $req)
    {
        // Create a new user
        User::create([
            'name' => $req->name,
            'email' => $req->email,
            'usertype' => $req->usertype,
            'phone' => $req->phone,
            'address' => $req->address,
            'password' => bcrypt($req->password),
        ]);

        // Redirect to the student page
        return redirect('/admin/user');
    }

    public function edit($id)
    {
        // Retrieve the user by ID
        $user = User::find($id);

        // Pass the data to the view
        return view('admin.edituser', ['user' => $user]);
    }

    public function editsave(Request $req)
    {
        // Update the user
        User::where('id', $req->id)->update([
            'name' => $req->name,
            'email' => $req->email,
            // 'usertype' => $req->usertype,
            'phone' => $req->phone,
            'address' => $req->address,
            'password' => bcrypt($req->password),
        ]);

        // Redirect to the student page
        return redirect('admin/user');
    }

    public function delete($id)
    {
        // Delete the user
        User::where('id', $id)->delete();

        // Redirect to the student page
        return redirect('/admin/user');
    }

    public function search(Request $req)
    {
        $search = $req->search;

        // Search users by name or email
        $users = User::where('name', 'like', '%' . $search . '%')
            ->orWhere('email', 'like', '%' . $search . '%')
            ->orwhere('id', 'like', '%' . $search . '%')
            ->paginate();

        // Pass the data to the view
        return view('admin.user', ['users' => $users]);
    }

    public function filter(Request $req)
    {
        $query = User::query();

        if ($req->filled('id')) {
            $query->where('customer_id', $req->input('customer_id'));
        }

        if ($req->filled('name')) {
            $query->where('name', $req->input('name'));
        }

        if ($req->filled('email')) {
            $query->where('email', $req->input('email'));
        }

        if ($req->filled('phone')) {
            $query->where('phone', $req->input('phone'));
        }

        if ($req->filled('address')) {
            $query->where('address', $req->input('address'));
        }

        if ($req->filled('date_from') && $req->filled('date_to')) {
            $query->whereBetween('created_at', [$req->input('date_from'), $req->input('date_to')]);
        }

        $transactions = $query->paginate();

        return view('admin.book', ['transactions' => $transactions]);
    }
}
