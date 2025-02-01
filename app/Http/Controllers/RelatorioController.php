<?php

namespace App\Http\Controllers;

use App\Models\Dizimo;
use App\Models\Membro;
use App\Models\Perfil;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class RelatorioController extends Controller
{
    public function index()
    {
        return view('relatorio');
    }

    public function relatorio(Request $request)
    {
        $perfil = Perfil::first();
        if (is_null($perfil))
            return redirect()->route('perfil.index')->with('error', 'Cadastro o perfil antes de gerar um relatorio');
        $membros = Membro::first();
        if (is_null($membros))
            return redirect()->route('membros.index')->with('error', 'Cadastro um antes de gerar um relatorio');

        $data_ini = $request->data_ini;
        $data_fim = $request->data_fim;
        if (is_null($data_fim) || is_null($data_fim))
            return redirect()->back()->with('error', 'Preenha os campos data INICIAL e FINAL');
        $dizimos = Dizimo::whereBetween('mes_referencia', [$data_ini, $data_fim])->get();
        // dd($dizimos);
        // dd($perfil);
        $data_ini = date('d/M/Y', strtotime($data_ini));
        $data_fim = date('d/M/Y', strtotime($data_fim));
        $pdf = Pdf::loadView('view.relatorio.relatorio', ['dizimos' => $dizimos, 'perfil' => $perfil, 'data_ini' => $data_ini, 'data_fim' => $data_fim]);
        return $pdf->stream('relatorio_' . date('F', strtotime($data_fim)) . '.pdf', [
            'Attachment' => false, // Configura para inline em vez de download
        ]);
        // return $pdf->download('relatorio_' . date('F', strtotime($data_fim)) . '.pdf');
    }
}
