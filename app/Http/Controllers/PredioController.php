<?php

namespace App\Http\Controllers;

use App\Http\Requests\Predio\StorePredioRequest;
use App\Http\Requests\Predio\UpdatePredioRequest;
use App\Models\Predio;
use App\Models\Sala;
use Illuminate\Http\Request;

class PredioController extends Controller
{
    public function index()
    {
        $predios = Predio::all();
        return view('predio.index', compact('predios'));
    }

    public function create()
    {
        return view('predio.create');
    }

    public function store(StorePredioRequest $request)
    {
        Predio::create($request->all());
        return redirect(route('predio.index'))->with('success', 'Prédio Cadastrado com Sucesso!');
    }

    public function edit($predio_id)
    {
        $predio = Predio::find($predio_id);
        return view('predio.edit', compact('predio'));
    }

    public function update(UpdatePredioRequest $request)
    {
        Predio::find($request->predio_id)->update($request->all());
        return redirect(route('predio.index'))->with('success', 'Predio Editado com Sucesso!');
    }

    public function delete($predio_id)
    {
        $predio = Predio::find($predio_id);
        $salas = Sala::where('predio_id', $predio->id)->first();
        if ($salas == null) {
            $predio->delete();
            return redirect(route('predio.index'))->with('success', 'Predio Removido com Sucesso!');
        } else {
            return redirect(route('predio.index'))->with('fail', 'É Necessário Remover todas as Salas do Prédio Antes!');
        }
    }
}
