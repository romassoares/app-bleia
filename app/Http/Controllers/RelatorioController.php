<?php

namespace App\Http\Controllers;

use App\Models\Dizimo;
use App\Models\Membro;
use App\Models\Perfil;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RelatorioController extends Controller
{
    public function index()
    {
        return view('relatorio');
    }

    public function relatorio(Request $request)
    {
        $data_ini = $request->data_ini;
        $data_fim = $request->data_fim;
        $dizimos = Dizimo::whereBetween('mes_referencia', [$data_ini, $data_fim])->get();
        // dd($dizimos);
        $perfil = Perfil::first();
        // dd($perfil);
        $data_ini = date('d/M/Y', strtotime($data_ini));
        $data_fim = date('d/M/Y', strtotime($data_fim));
        return view('view.relatorio.relatorio', compact('dizimos', 'perfil', 'data_ini', 'data_fim'));
    }
}
