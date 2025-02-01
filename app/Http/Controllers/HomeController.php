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
        $tot_mes_a_mes = Dizimo::selectRaw("DATE_FORMAT(mes_referencia, '%M') AS mes_referencia, SUM(valor) as total_soma")
            ->groupBy('mes_referencia')
            ->orderBy("mes_referencia", 'desc')
            ->get();
        $labels = $tot_mes_a_mes->pluck('mes_referencia');
        $data = $tot_mes_a_mes->pluck('total_soma');

        return view('home', compact('labels', 'data'));
    }
}
