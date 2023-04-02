<?php

namespace App\Http\Controllers;

use App\Http\Requests\applicant\RequestApplicant;
use App\Models\Applicant;
use App\Models\District;
use App\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ApplicantController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function upload($model, $request, $path, $input = "")
    {
        $file = $request->file($input);
        $file_name = "IMG" . time() . $file->getClientOriginalExtension();
        $file->move($path, $file_name);
        $model->$input = $file_name;
        $model->save();
    }

    public function index()
    {
        $applicants = Applicant::with('division', 'district')->orderby('id', 'desc')->get();
        $divisions = Division::get();
        return view('dashboard.applicant.index', ['items' => $applicants, 'divisions' => $divisions]);
    }
    public function store(RequestApplicant $request)
    {
        // dd($request->all());
        try {
            $model = Applicant::create($request->validated());
            $this->upload($model, $request, 'applicant/', 'image');
            return redirect()->route('applicants.index')->with('msg', 'Record Inserted');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return back()->with('msg', 'Something went wrong');
        }
    }

    //  get District
    public function getDistrict(Request $request)
    {
        $data = District::where('division_id', $request->id)->get();
        return response()->json($data);
    }
}
