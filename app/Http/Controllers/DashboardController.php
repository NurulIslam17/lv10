<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\Applicant;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $applicantNumber = Applicant::get()->count();
        $todoTask = Todo::get()->where('status', 0)->count();
        return view('dashboard.home.index', ['applicantsNum' => $applicantNumber, 'todo' => $todoTask]);
    }
}
