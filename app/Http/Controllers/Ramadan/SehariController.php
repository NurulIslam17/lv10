<?php

namespace App\Http\Controllers\Ramadan;

use App\Models\Sehari;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\RequestSehari;
use App\Http\Requests\RequestSehariBazar;
use App\Models\SegariBazar;

class SehariController extends Controller
{
    public function index()
    {
        $sehari = Sehari::get();
        return view('ramadan.sehari.index', ['sehari' => $sehari]);
    }
    public function crateSehari()
    {
        return view('ramadan.sehari.crate');
    }
    public function storeSehari(RequestSehari $request)
    {
        try {
            Sehari::create($request->validated());
            return redirect()->route('sehari.index')->with('msg', 'Inserted');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return back()->with('msg', 'Some thing went wrong');
        }
    }
    public function bazarList()
    {
        $nurul = SegariBazar::where('name', 'nurul')->select('amount')->count();
        $t_nurul = SegariBazar::where('name', 'nurul')->sum('amount');
        $mizan = SegariBazar::where('name', 'mizan')->select('amount')->count();
        $t_mizan = SegariBazar::where('name', 'mizan')->sum('amount');
        $afik = SegariBazar::where('name', 'afik')->select('amount')->count();
        $t_afik = SegariBazar::where('name', 'afik')->sum('amount');
        $iftar_cost = SegariBazar::sum('amount');
        $bazar = SegariBazar::get();
        return view('ramadan.sehari.bazar', [
            'nurul' => $nurul,
            't_nurul' => $t_nurul,
            'mizan' => $mizan,
            't_mizan' => $t_mizan,
            'afik' => $afik,
            't_afik' => $t_afik,
            'iftar_cost' => $iftar_cost,
            'bazars' => $bazar,
        ]);
    }
    public function bazarCreate()
    {
        return view('ramadan.sehari.crate-bazar');
    }
    public function storeSehariBazar(RequestSehariBazar $request)
    {
        try {
            SegariBazar::create($request->validated());
            return redirect()->route('sehari.bazar.list')->with('msg', 'Inserted');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return back()->with('msg', 'Some thing went wrong');
        }
        return view('ramadan.sehari.crate-bazar');
    }
    public function sehariReport()
    {
        $nurul = SegariBazar::where('name', 'nurul')->select('amount')->count();
        $t_nurul = SegariBazar::where('name', 'nurul')->sum('amount');
        $mizan = SegariBazar::where('name', 'mizan')->select('amount')->count();
        $t_mizan = SegariBazar::where('name', 'mizan')->sum('amount');
        $afik = SegariBazar::where('name', 'afik')->select('amount')->count();
        $t_afik = SegariBazar::where('name', 'afik')->sum('amount');
        $meal_nurul = Sehari::sum('nurul');
        $meal_mizan = Sehari::sum('mizan');
        $meal_afik = Sehari::sum('afik');
        $total = $meal_nurul + $meal_mizan + $meal_afik;
        $iftar_cost = SegariBazar::sum('amount');
        return view('ramadan.sehari.report', [
            'meal_nurul' => $meal_nurul,
            'meal_mizan' => $meal_mizan,
            'meal_afik' => $meal_afik,
            'nurul' => $nurul,
            't_nurul' => $t_nurul,
            'mizan' => $mizan,
            't_mizan' => $t_mizan,
            'afik' => $afik,
            't_afik' => $t_afik,
            'total' => $total,
            'iftar_cost' => $iftar_cost,
        ]);
    }
}
