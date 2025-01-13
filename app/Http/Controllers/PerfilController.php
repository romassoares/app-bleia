<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Perfil $perfil)
    {
        $perfils = Perfil::first();
        return view('view.perfil.index', compact('perfils'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id_perfil = $request->id_perfil;

        $validated = $request->validate([
            'cnpj' => 'required|unique:perfils|max:18|min:14',
            'razao_social' => 'required|max:250|min:3',
        ]);

        $validated['users_id'] = Auth::id();

        if (empty($id_perfil)) {
            Perfil::create($validated);
        } else {
            $perfil = Perfil::find($id_perfil);
            if (isset($perfil)) {
                $perfil->update($validated);
            }
        }

        return redirect()->route('perfil.index')->with('success', 'Já existe um dízimo para este mês de referência.');;
    }
}
