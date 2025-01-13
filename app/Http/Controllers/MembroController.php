<?php

namespace App\Http\Controllers;

use App\Http\Requests\MembroRequest;
use Illuminate\Auth\Events\Validated;
use App\Models\Cargo;
use App\Models\Membro;
use App\Models\Ponto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MembroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $membros = Membro::paginate(15);
        return view('view.membro.index', compact('membros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cargos = Cargo::all();
        if (count($cargos) == 0)
            return redirect()->route('cargos.create');
        $pontos = Ponto::all();
        if (count($pontos) == 0)
            return redirect()->route('ponto.index');
        return view('view.membro.form', compact('cargos', 'pontos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MembroRequest $request, Membro $membro)
    {
        $membro->setAll($request->validated());
        $save = $membro->save();
        if ($save)
            return redirect()->route('membros.show', ["id" => $membro->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Membro  $membro
     * @return \Illuminate\Http\Response
     */
    public function show(Membro $membro, $id)
    {
        $membro = Membro::where('id', $id)->first();
        return view('view.membro.show', compact('membro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Membro  $membro
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $membro = Membro::where('id', $id)->first();
        $cargos = Cargo::all();
        $pontos = Ponto::all();
        return view('view.membro.form', compact('membro', 'cargos', 'pontos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Membro  $membro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Membro $membro, $id)
    {
        $membro = Membro::findOrFail($id);

        $validatedData = $request->validate([
            'nome' => 'required|max:150|min:2',
            'cpf' => 'required|unique:membros,cpf,' . $id,
            'estado_civil' => 'in:cas,sol,viu,div',
            'naturalidade' => 'required|max:150|min:3',
            'cep' => 'required|max:9|min:8',
            'cidade' => 'required|max:250|min:3',
            'bairro' => 'required|max:250|min:3',
            'rua' => 'nullable|max:250|min:3',
            'sexo' => 'in:m,f',
            'numero' => 'nullable|max:10|min:2',
            'nome_mae' => 'nullable|max:250|min:3',
            'nome_pai' => 'nullable|max:250|min:2',
            'data_batismo' => 'nullable|date',
            'data_nascimento' => 'required|date',
            'cargo_id' => 'required',
            'ponto_id' => 'required',
            'users_id' => 'required'
        ]);

        $membro->update($validatedData);

        return redirect()
            ->route('membros.show', ['id' => $membro->id])
            ->with('success', 'Membro atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Membro  $membro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Membro $membro)
    {
        //
    }
}
