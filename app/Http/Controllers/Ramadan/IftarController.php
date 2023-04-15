<?php

namespace App\Http\Controllers\Ramadan;

use Illuminate\Http\Request;
use App\Http\Requests\RequestIftar;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\RequestIftarBazar;
use App\Models\Ifatr;
use App\Models\IftarBazar;

class IftarController extends Controller
{
    public function index()
    {
        $iftar = Ifatr::get();
        return view('ramadan.iftar.index', ['iftar' => $iftar]);
    }
    public function bazarList()
    {
        $nurul = IftarBazar::where('name', 'nurul')->select('amount')->count();
        $t_nurul = IftarBazar::where('name', 'nurul')->sum('amount');
        $mizan = IftarBazar::where('name', 'mizan')->select('amount')->count();
        $t_mizan = IftarBazar::where('name', 'mizan')->sum('amount');
        $afik = IftarBazar::where('name', 'afik')->select('amount')->count();
        $t_afik = IftarBazar::where('name', 'afik')->sum('amount');
        $iftar_cost = IftarBazar::sum('amount');
        $bazar = IftarBazar::get();
        return view('ramadan.iftar.bazar', [
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
    public function crateIftar()
    {
        return view('ramadan.iftar.crate');
    }
    public function storeIftar(RequestIftar $request)
    {
        try {
            Ifatr::create($request->validated());
            return redirect()->route('iftar.index')->with('msg', 'Inserted');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return back()->with('msg', 'Some thing went wrong');
        }
    }
    public function bazarCreate()
    {
        return view('ramadan.iftar.crate-bazar');
    }
    public function storeIftarBazar(RequestIftarBazar $request)
    {
        try {
            IftarBazar::create($request->validated());
            return redirect()->route('bazar.list')->with('msg', 'Inserted');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return back()->with('msg', 'Some thing went wrong');
        }
    }

    public function iftarReport()
    {
        $nurul = IftarBazar::where('name', 'nurul')->select('amount')->count();
        $t_nurul = IftarBazar::where('name', 'nurul')->sum('amount');
        $mizan = IftarBazar::where('name', 'mizan')->select('amount')->count();
        $t_mizan = IftarBazar::where('name', 'mizan')->sum('amount');
        $afik = IftarBazar::where('name', 'afik')->select('amount')->count();
        $t_afik = IftarBazar::where('name', 'afik')->sum('amount');
        $meal_nurul = Ifatr::sum('nurul');
        $meal_mizan = Ifatr::sum('mizan');
        $meal_afik = Ifatr::sum('afik');
        $total = $meal_nurul + $meal_mizan + $meal_afik;
        $iftar_cost = IftarBazar::sum('amount');
        return view('ramadan.iftar.report', [
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
