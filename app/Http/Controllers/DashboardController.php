<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $applicantNumber = Applicant::get()->count();
        return view('dashboard.home.index', ['applicantsNum' => $applicantNumber]);
    }
}
