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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('view.ponto.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePontoRequest $request, Ponto $ponto)
    {
        abort_if(Gate::denies('store', Ponto::class), 403, 'ACESSO NEGADO');
        $ponto->setAll($request->validated());
        $save = $ponto->save();
        if ($save) {
            return redirect()->route('ponto.show', ["id" => $ponto->id]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ponto  $ponto
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $exists = $this->ponto->where('id', $id)->first();
        if ($exists) {
            return view('view.ponto.show', ['ponto' => $exists]);
        } else {
            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ponto  $ponto
     * @return \Illuminate\Http\Response
     */
    public function edit(Ponto $ponto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ponto  $ponto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ponto $ponto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ponto  $ponto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ponto $ponto)
    {
        //
    }
}
