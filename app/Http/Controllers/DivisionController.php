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
        return view('dashboard.division.index');
    }
    public function create()
    {
        return view('dashboard.division.create');
    }
    public function store(RequestDivision $request)
    {
        // return $request;
        try {
            Division::create($request->validated());
            return redirect()->route('division.index');
        } catch (\Throwable $th) {
            dd($th->getMessage());
            Log::error($th->getMessage());
            return back();
        }
    }
}
