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
    public function create()
    {
        return view('dashboard.division.create');
    }
    public function store(RequestDivision $request)
    {
        try {
            Division::create($request->validated());
            return redirect()->route('division.index');
        } catch (\Throwable $th) {
            dd($th);
            Log::error($th->getMessage());
            return back();
        }
    }
    public function update(RequestDivision $request, Division $division)
    {
        try {
            $division->update($request->validated());
            return redirect()->route('division.index');
        } catch (\Throwable $th) {
            dd($th);
            Log::error($th->getMessage());
            return back();
        }
    }
}
