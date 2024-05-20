<?php

namespace App\Http\Controllers\Malicious;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MaliciousController extends Controller
{
    public function index(){
        return view("malicious.index");
    }
}
