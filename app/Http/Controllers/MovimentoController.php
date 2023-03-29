<?php

namespace App\Http\Controllers;

use App\Http\Requests\Movimento\StoreMovimentoRequest;
use App\Http\Requests\Movimento\UpdateMovimentoRequest;
use App\Models\Movimento;
use App\Models\MovimentoPatrimonio;
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

    public function store(StoreMovimentoRequest $request)
    {
        $data = $request->all();
        if(!$this->verificarServidores($data))
            return redirect()->back()->with('fail', 'Os servidores de origem e destino não podem ser o mesmo!');
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

    public function update(UpdateMovimentoRequest $request)
    {
        $data = $request->all();
        $movimento = Movimento::find($data['movimento_id']);

        if(!$this->verificarServidores($data))
        {
            return redirect()->back()->with('fail', 'Os servidores de origem e destino não podem ser o mesmo!');
        } elseif(!$this->verificarItensMovimento($data, $movimento))
        {
            return redirect()->route('movimento.edit', ['movimento_id' => $movimento->id])->with('fail', 'Não é possivel alterar os servidores, pois já existem itens atrelados a essa movimentação!');
        }

        $movimento->update($data);
        return redirect()->route('movimento.edit', ['movimento_id' => $movimento->id])->with('success', 'Movimento Alterado com Sucesso!');
    }

    public function delete($movimento_id)
    {
        $movimento = Movimento::find($movimento_id);
        if($movimento->status == 'Não Concluido')
        {
            $movimento->delete();
            return redirect()->route('movimento.index')->with('success', 'Movimento removido com sucesso!');
        }

        return redirect()->route('movimento.index')->with('fail', 'O movimento já foi concluido e não pode ser excluido');


    }

    public function adicionarPatrimonio(Request $request)
    {
        $data = $request->all();
        $movimento = Movimento::find($data['movimento_id']);
        $patrimonio = Patrimonio::find($data['patrimonio_id']);

        $item_movimento = $movimento->itens_movimento()
            ->wherePivot('patrimonio_id', $patrimonio->id)
            ->first();

        if (!$item_movimento) {
            $movimento->itens_movimento()->sync($patrimonio);
            return redirect()->route('movimento.edit', ['movimento_id' => $movimento->id])
                ->with('success', 'Patrimônio Adicionado ao Movimento com Sucesso!');
        } else {
            return redirect()->route('movimento.edit', ['movimento_id' => $movimento->id])
                ->with('fail', 'Este Patrimônio já Consta na Movimentação.');
        }
    }

    public function removerPatrimonio($movimento_patrimonio_id)
    {
        $item_movimento = MovimentoPatrimonio::find($movimento_patrimonio_id);
        $item_movimento->delete();

        return redirect()->back()->with('success', 'Patrimônio removido com sucesso da movimentação');
    }

    private function verificarServidores($data)
    {
        $servidor_origem_id = $data['servidor_origem_id'];
        $servidor_destino_id = $data['servidor_destino_id'];

        if($servidor_origem_id == $servidor_destino_id)
        {
            return false;
        }

        return true;
    }

    private function  verificarItensMovimento($data, $movimento)
    {
        if(count($movimento->itens_movimento) > 0) {
            $servidor_origem_id = $data['servidor_origem_id'];
            $servidor_destino_id = $data['servidor_destino_id'];
            if($movimento->servidor_origem_id != $servidor_origem_id || $movimento->servidor_destino_id != $servidor_destino_id)
                return false;
            return true;
        }

    }
}
