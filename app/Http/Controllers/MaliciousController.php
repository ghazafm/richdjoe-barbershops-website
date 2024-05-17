<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MaliciousController extends Controller
{
    public function index(){
        return view("malicious.index");
    }
}
