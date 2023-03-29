<?php

namespace App\Http\Controllers;

use App\Http\Requests\applicant\RequestApplicant;
use App\Models\Applicant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ApplicantController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $applicants = Applicant::orderby('id', 'desc')->get();
        return view('dashboard.applicant.index', ['items' => $applicants]);
    }
    public function store(RequestApplicant $request)
    {
        // dd($request->all());
        try {
            Applicant::create($request->validated());
            return redirect()->route('applicants.index')->with('msg', 'Record Inserted');
        } catch (\Throwable $th) {
            // dd($th);
            Log::error($th->getMessage());
            return back()->with('msg', 'Something went wrong');
        }
    }
}
