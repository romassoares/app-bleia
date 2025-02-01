<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use App\Models\Ponto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CargoController extends Controller
{
    public function index()
    {
        $cargos = Cargo::withTrashed()->paginate(8);
        return view('view.cargo.index', compact('cargos'));
    }

    public function create()
    {
        $pontos = Ponto::all();
        if (count($pontos) == 0)
            return redirect()->route('ponto.index');

        return view('view.cargo.form', compact("pontos"));
    }

    public function store(Request $request)
    {
        $idCargo = $request['id'];

        $validated = $request->validate([
            'nome' => 'required|unique:cargos|max:150|min:2'
        ]);

        $validated['users_id'] = Auth::id();
        $msg = '';
        if (empty($idCargo)) {
            Cargo::create($validated);
            $msg = 'Item inserido com sucesso';
        } else {
            $cargo = Cargo::find($idCargo);
            if (isset($cargo)) {
                $cargo->update($validated);
                $msg = 'Item atualizado com sucesso';
            }
        }


        return redirect()->route('cargos.index')->with('success', $msg);
    }

    public function destroy($id)
    {
        $exists = Cargo::where('id', $id)->first();
        if (!$exists)
            return redirect()->back()->with('warning', 'Item não encontrado');
        if ($exists->delete()) {
            return redirect()->back()->with('success', 'Item removido com sucesso');
        }
    }
    public function restore($id)
    {
        $exists = Cargo::where('id', $id)->withTrashed()->first();
        if (!$exists)
            return redirect()->back()->with('warning', 'Item não encontrado');
        if ($exists->restore()) {
            return redirect()->back()->with('success', 'Item restaurado com sucesso');
        }
    }
}
