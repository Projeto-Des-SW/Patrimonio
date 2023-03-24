<?php

namespace App\Http\Controllers;

use App\Http\Requests\Cargo\StoreCargoRequest;
use App\Http\Requests\Cargo\UpdateCargoRequest;
use App\Models\Cargo;
use App\Models\Servidor;
use Illuminate\Http\Request;

class CargoController extends Controller
{
    public function index(){
        $cargos = Cargo::all();
        return view('cargo.index', compact('cargos'));
    }

    public function create()
    {
        return view('cargo.create');
    }

    public function store(StoreCargoRequest $request)
    {
        Cargo::create($request->all());
        return redirect(route('cargo.index'))->with('success', 'Cargo Cadastrado com Sucesso!');
    }

    public function edit($cargo_id)
    {
        $cargo = Cargo::find($cargo_id);
        return view('cargo.edit', compact('cargo'));
    }

    public function update(UpdateCargoRequest $request)
    {
        Cargo::find($request->cargo_id)->update($request->all());
        return redirect(route('cargo.index'))->with('success', 'Cargo Editado com Sucesso!');
    }

    public function delete($cargo_id)
    {
        $cargo = Cargo::find($cargo_id);
        $servidor = Servidor::where('cargo_id', $cargo->id)->first();
        if ($servidor == null) {
            $cargo->delete();
            return redirect(route('cargo.index'))->with('success', 'Cargo Removido com Sucesso!');
        } else {
            return redirect(route('cargo.index'))->with('fail', 'Não é possivel remover este cargo, há servidores vinculados a ele!');
        }
    }
}
