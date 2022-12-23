<?php

namespace App\Http\Controllers;

use App\Models\Patrimonio;
use App\Models\Predio;
use App\Models\Sala;
use Illuminate\Http\Request;

class SalaController extends Controller
{
    public function index($predio_id)
    {
        $predio = Predio::find($predio_id);
        $salas = $predio->salas;
        return view('sala.index', compact('salas', 'predio'));
    }

    public function create($predio_id)
    {
        $predio = Predio::find($predio_id);
        return view('sala.create', compact('predio'));
    }

    public function store(Request $request)
    {
        Sala::create($request->all());
        return redirect(route('sala.index', ['predio_id' => $request->predio_id]))->with('success', 'Sala Cadastrada com Sucesso!');
    }

    public function edit($sala_id)
    {
        $sala = Sala::find($sala_id);
        $predio = $sala->predio;
        return view('sala.edit', compact('sala', 'predio'));
    }

    public function update(Request $request)
    {
        Sala::find($request->sala_id)->update($request->all());

        return redirect(route('sala.index', ['predio_id' => $request->predio_id]))->with('success', 'Predio Editado com Sucesso!');
    }

    public function delete($sala_id)
    {
        $sala = Sala::find($sala_id);

        $patrimonio = Patrimonio::where('sala_id', $sala->id)->first();
        if ($patrimonio == null) {
            $sala->delete();
            return redirect(route('sala.index', ['predio_id' => $sala->predio_id]))->with('success', 'Sala Removida com Sucesso!');
        } else {
            return redirect(route('sala.index', ['predio_id' => $sala->predio_id]))->with('fail', 'É Necessário Remover Todos os Patrimônios da Sala Antes!');
        }

    }
}
