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

    public function index()
    {
        $membros = Membro::withTrashed()->paginate(8);
        return view('view.membro.index', compact('membros'));
    }

    public function create()
    {
        $cargos = Cargo::all();
        if (count($cargos) == 0)
            return redirect()->route('cargos.create')
                ->with('error', 'Cadastre um cargo antes de cadastrar um Membro');

        $pontos = Ponto::all();
        if (count($pontos) == 0)
            return redirect()->route('ponto.create')
                ->with('error', 'Cadastre um ponto antes de cadastrar um Membro');

        return view('view.membro.form', compact('cargos', 'pontos'));
    }

    public function store(MembroRequest $request, Membro $membro)
    {
        $membro->setAll($request->validated());
        $save = $membro->save();
        if ($save)
            return redirect()
                ->route('membros.show', ["id" => $membro->id])
                ->with('success', ' Item inserido com sucesso');
    }

    public function show(Membro $membro, $id)
    {
        $membro = Membro::withTrashed()
            ->where('id', $id)
            ->first();
        return view('view.membro.show', compact('membro'));
    }

    public function edit($id)
    {
        $membro = Membro::where('id', $id)
            ->withTrashed()
            ->first();
        $cargos = Cargo::all();
        $pontos = Ponto::all();
        return view('view.membro.form', compact('membro', 'cargos', 'pontos'));
    }

    public function update(Request $request, Membro $membro, $id)
    {
        $membro = Membro::findOrFail($id);

        $validatedData = $request->validate([
            'nome' => 'required|max:150|min:2',
            'cpf' => 'required|unique:membros,cpf,' . $id,
            'estado_civil' => 'in:cas,sol,viu,div',
            'naturalidade' => 'required|max:150|min:3',
            // 'cep' => 'required|max:9|min:8',
            // 'cidade' => 'required|max:250|min:3',
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

    public function destroy($id)
    {
        $exists = Membro::where('id', $id)->first();
        if (!$exists)
            return redirect()->back()->with('warning', 'Item não encontrado');
        if ($exists->delete())
            return redirect()->back()->with('success', 'Item removido com sucesso');
    }

    public function restore($id)
    {
        $exists = Membro::where('id', $id)->withTrashed()->first();
        if (!$exists)
            return redirect()->back()->with('warning', 'Item não encontrado');
        if ($exists->restore()) {
            return redirect()->back()->with('success', 'Item restaurado com sucesso');
        }
    }
}
