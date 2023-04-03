<?php

namespace App\Http\Controllers;

use App\Models\District;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    public function index()
    {
        $districts = District::orderby('name', 'ASC')->get();
        return view('dashboard.district.index', ['items' => $districts]);
    }
}
