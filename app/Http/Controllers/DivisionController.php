<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestDivision\RequestDivision;
use App\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DivisionController extends Controller
{
    public function index()
    {
        $divisions = Division::orderby('name', 'ASC')->get();
        return view('dashboard.division.index', ['divisions' => $divisions]);
    }
}
