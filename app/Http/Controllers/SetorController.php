<?php

namespace App\Http\Controllers;


use App\Http\Requests\Setor\StoreSetorRequest;
use App\Http\Requests\Setor\UpdateSetorRequest;
use App\Models\Patrimonio;
use Illuminate\Http\Request;
use App\Models\Setor;

class SetorController extends Controller
{
    public function index($setor_pai_id = null)
    {
        $setores = Setor::where('setor_pai_id', null)->get();
        if ($setor_pai_id != null) {
            $setor_pai = Setor::find($setor_pai_id);
            $setores = $setor_pai->setores;
            return view('setor.index', compact('setores', 'setor_pai'));

        }
        return view('setor.index', compact('setores'));
    }

    public function create($setor_pai_id = null)
    {
        if ($setor_pai_id != null) {
            $setor_pai = Setor::find($setor_pai_id);
            return view('setor.create', compact('setor_pai'));
        }
        return view('setor.create');

    }

    public function store(StoreSetorRequest $request)
    {
        if (isset($request->setor_pai_id) && $request->setor_pai_id != null) {
            $setor_pai = Setor::find($request->setor_pai_id);
            if ($setor_pai->setor_folha) {
                $setor_pai->setor_folha = false;
                $setor_pai->update();
            }
        }
        Setor::create($request->all());
        return redirect(route('setor.index'))->with('success', 'Setor Cadastrado com Sucesso!');
    }

    public function edit($setor_id)
    {
        $setor = Setor::find($setor_id);
        return view('setor.edit', compact('setor'));
    }

    public function update(UpdateSetorRequest $request)
    {
        Setor::find($request->setor_id)->update($request->all());
        return redirect(route('setor.index'))->with('success', 'Setor Editado com Sucesso!');
    }

    public function delete($setor_id)
    {
        $setor = Setor::find($setor_id);
        $patrimonio = Patrimonio::where('setor_id', $setor_id)->first();

        if ($patrimonio == null) {
            $setor_filho = Setor::where('setor_pai_id', $setor_id)->first();
            
            if ($setor_filho) {
                return redirect()->back()->with('fail', 'Não é possivel remover o setor, existem sub-setores vinculados a ele!');
            }
            $setor->delete();
            return redirect(route('setor.index'))->with('success', 'Setor Removido com Sucesso!');
        } else {
            return redirect(route('setor.index'))->with('fail', 'Não é possivel remover o setor, existem patrimônios vinculados a ele!');

        }

    }
}
