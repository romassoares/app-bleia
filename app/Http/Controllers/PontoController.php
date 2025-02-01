<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePontoRequest;
use App\Models\Dizimo;
use App\Models\Ponto;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PontoController extends Controller
{
    private $ponto;

    public function __construct(Ponto $ponto)
    {
        $this->ponto = $ponto;
    }
    public function index()
    {
        $pontos = $this->ponto->withTrashed()->paginate(8);
        // dd($pontos);
        return view('view.ponto.index', ['pontos' => $pontos]);
    }

    public function create()
    {
        return view('view.ponto.form');
    }

    public function store(StorePontoRequest $request, Ponto $ponto)
    {
        abort_if(Gate::denies('store', Ponto::class), 403, 'ACESSO NEGADO');
        $ponto->setAll($request->validated());
        $save = $ponto->save();
        if ($save) {
            return redirect()->route('ponto.index')->with('success', 'Item inserido com sucesso');
        }
    }

    public function show($id)
    {
        $exists = $this->ponto->withTrashed()->where('id', $id)->first();
        $dizimos = Dizimo::selectRaw('valor, DATE_FORMAT(mes_referencia, "%M") as mes')
            ->where('ponto_id', $exists->id)
            ->orderBy('mes_referencia', 'asc')
            ->get();
        // dd($dizimos);
        if ($exists) {
            return view('view.ponto.show', ['ponto' => $exists, 'dizimos' => $dizimos]);
        } else {
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $exists = $this->ponto->where('id', $id)->first();
        if ($exists) {
            return view('view.ponto.form', ['ponto' => $exists]);
        } else {
            return redirect()->back();
        }
    }

    public function update(StorePontoRequest $request, $id, Ponto $ponto)
    {
        abort_if(Gate::denies('update', Ponto::class), 403, 'ACESSO NEGADO');
        $exists = $this->ponto->where('id', $id)->first();
        if (!$exists) {
            return redirect()->back();
            // não existe
        }
        $exists->setAll($request->validated());
        $save = $exists->update();
        if ($save) {
            return redirect()->route('ponto.index')->with('success', 'Item inserido com sucesso');
        } else {
            return redirect()->back()->with('error', 'Erro ao tentar inserir item');
        }
    }

    public function destroy($id)
    {
        $exists = Ponto::where('id', $id)->first();
        // dd($exists);
        if (!$exists)
            return redirect()->back()->with('warning', 'Item não encontrado');
        if ($exists->delete()) {
            return redirect()->back()->with('success', 'Item removido com sucesso');
        }
    }

    public function restore($id)
    {
        $exists = Ponto::where('id', $id)->withTrashed()->first();
        if (!$exists)
            return redirect()->back()->with('warning', 'Item não encontrado');
        if ($exists->restore()) {
            return redirect()->back()->with('success', 'Item restaurado com sucesso');
        }
    }
}
