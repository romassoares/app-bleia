<?php

namespace App\Http\Controllers;

use App\Models\Dizimo;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tot_mes_a_mes = Dizimo::selectRaw('mes_referencia, COUNT(*) as total')
            ->groupBy('mes_referencia')
            ->get();
        return view('home', compact('tot_mes_a_mes'));
    }
}
