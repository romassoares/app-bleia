<?php

namespace App\Http\Controllers;

use App\Http\Requests\DizimoRequest;
use App\Models\Dizimo;
use App\Models\Membro;
use App\Models\Ponto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DizimoController extends Controller
{

    public function index()
    {
        $dizimos = Dizimo::paginate(15);
        return view('view.dizimo.index', compact('dizimos'));
    }

    public function create()
    {
        $membros = Membro::all();
        $pontos = Ponto::all();
        return view('view.dizimo.form', compact('membros', 'pontos'));
    }

    public function store(DizimoRequest $request, Dizimo $dizimo)
    {
        $if_exist_mes_atual = Dizimo::whereYear('mes_referencia', date('Y', strtotime($request['mes_referencia'])))
            ->whereMonth('mes_referencia', date('m', strtotime($request['mes_referencia'])))
            ->where('membros_id', $request['membros_id'])
            ->where('ponto_id', $request['ponto_id'])
            ->first();

        // dd($if_exist_mes_atual);
        if ($if_exist_mes_atual)
            return back()->with('error', 'Já existe um dízimo para este mês de referência.');

        $dizimo->setAll($request->validated());

        $save = $dizimo->save();
        if ($save) {
            return redirect()->back()->with('success', 'Item inserido com sucesso.');;
        }
    }

    // public function show($id)
    // {
    //     $dizimo = Dizimo::where('id', $id)->first();
    //     return view('view.dizimo.show', ['membro_id' => $dizimo->membro_id]);
    // }

    public function edit(Dizimo $dizimo)
    {
        //
    }

    public function update(Request $request, Dizimo $dizimo)
    {
        //
    }

    public function destroy(Dizimo $dizimo)
    {
        //
    }
}
