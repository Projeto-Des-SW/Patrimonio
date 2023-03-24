<?php

namespace App\Http\Controllers;

use App\Http\Requests\Predio\StoreServidorRequest;
use App\Http\Requests\Predio\UpdateServidorRequest;
use App\Models\Cargo;
use App\Models\TipoUsuario;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Servidor;
use Illuminate\Support\Facades\Hash;

class ServidorController extends Controller
{
    public function index()
    {
        $servidors = Servidor::withTrashed()->get();
        return view('servidor.index', compact('servidors'));
    }

    public function create()
    {
        $cargos = Cargo::all();
        $tipo_usuarios = TipoUsuario::all();
        return view('servidor.create', compact('cargos', 'tipo_usuarios'));
    }

    public function store(StoreServidorRequest $request)
    {
        $user = User::create(['name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'tipo_usuario_id' => $request->tipo_usuario_id]);
        Servidor::create(['user_id' => $user->id,
            'cpf' => $request->cpf,
            'matricula' => $request->matricula,
            'cargo_id' => $request->cargo_id]);
        return redirect(route('servidor.index'))->with('success', 'Servidor Cadastrado com Sucesso!');
    }

    public function edit($servidor_id)
    {
        $servidor = Servidor::withTrashed()
            ->find($servidor_id);
        $cargos = Cargo::all();
        $tipo_usuarios = TipoUsuario::all();
        return view('servidor.edit', compact('servidor', 'cargos', 'tipo_usuarios'));
    }

    public function update(UpdateServidorRequest $request)
    {
        $servidor = Servidor::withTrashed()->find($request->servidor_id);
        $user = $servidor->user;
        if ($request->password != null) {
            $user->update(['name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'tipo_usuario_id' => $request->tipo_usuario_id]);
        } else {
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'tipo_usuario_id' => $request->tipo_usuario_id,
                'password' => $user->password
            ]);
        }
        $servidor->update(['cpf' => $request->cpf,
            'matricula' => $request->matricula,
            'cargo_id' => $request->cargo_id]);
        return redirect(route('servidor.index'))->with('success', 'Servidor Editado com Sucesso!');
    }

    public function delete($servidor_id)
    {
        $servidor = Servidor::find($servidor_id);
        $user = $servidor->user;
        $servidor->delete();
        $user->delete();
        return redirect(route('servidor.index'))->with('success', 'Servidor Desativado com Sucesso!');
    }

    public function restore($servidor_id)
    {
        $servidor = Servidor::withTrashed()->find($servidor_id);
        $user = User::withTrashed()->find($servidor->user_id);
        $user->restore();
        $servidor->restore();
        return redirect(route('servidor.index'))->with('success', 'Servidor Reativado com Sucesso!');
    }
}
