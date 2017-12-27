<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MyTest extends Controller
{
    public function index()
    {
    	return view('my_test_view', compact('tt'));
    }
}
