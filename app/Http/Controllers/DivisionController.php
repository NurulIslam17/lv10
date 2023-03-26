<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DivisionController extends Controller
{
    public function index()
    {
        return view('dashboard.division.index');
    }
    public function create()
    {
        return view('dashboard.division.create');
    }
    public function store(Request $request)
    {
        return $request;
    }
}
