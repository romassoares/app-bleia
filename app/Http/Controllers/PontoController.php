<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePontoRequest;
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
        $pontos = $this->ponto->paginate(10);
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
            return redirect()->route('ponto.show', ["id" => $ponto->id]);
        }
    }

    public function show($id)
    {
        $exists = $this->ponto->where('id', $id)->first();
        if ($exists) {
            return view('view.ponto.show', ['ponto' => $exists]);
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
            return redirect()->route('ponto.show', ["id" => $exists->id]);
        } else {
            return redirect()->back();
            // não salvou
        }
    }

    public function destroy(Ponto $ponto)
    {
        //
    }
}
