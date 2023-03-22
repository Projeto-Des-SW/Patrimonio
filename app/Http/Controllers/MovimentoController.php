<?php

namespace App\Http\Controllers;

use App\Models\Movimento;
use App\Models\Patrimonio;
use App\Models\Servidor;
use App\Models\TipoMovimento;
use Illuminate\Http\Request;

class MovimentoController extends Controller
{
    public function index()
    {
        $movimentos = Movimento::all();

        return view('movimento.index', compact('movimentos'));
    }

    public function create()
    {
        $tipo_movimentos = TipoMovimento::all();
        $servidores = Servidor::all();
        return view('movimento.create', compact('tipo_movimentos', 'servidores'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $movimento = Movimento::create($data);
        return redirect()->route('movimento.edit', ['movimento_id' => $movimento->id])->with('success', 'Movimento Cadastrado com Sucesso!');
    }

    public function edit($movimento_id)
    {
        $movimento = Movimento::find($movimento_id);
        $tipo_movimentos = TipoMovimento::all();
        $servidores = Servidor::all();
        $patrimonios = Patrimonio::where('servidor_id', $movimento->servidor_origem->id)
            ->get();

        return view('movimento.edit', compact('movimento', 'tipo_movimentos', 'servidores', 'patrimonios'));
    }

    public function update(Request $request)
    {
        $data = $request->all();
        $movimento = Movimento::find($data['movimento_id']);

        $movimento->update($request);

        return redirect()->route('movimento.edit', ['movimento_id' => $movimento->id])->with('success', 'Movimento Alterado com Sucesso!');
    }

    public function adicionarPatrimonio(Request $request)
    {
        $data = $request->all();
        $movimento = Movimento::find($data['movimento_id']);
        $patrimonio = Patrimonio::find($data['patrimonio_id']);

        $movimento->itens_movimento()->sync($patrimonio);

        return redirect()->route('movimento.edit', ['movimento_id' => $movimento->id])->with('success', 'Patrimônio Adicionado ao Movimento com Sucesso!');

    }
}
