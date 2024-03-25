<?php

namespace App\Http\Controllers;

use App\Http\Requests\Patrimonio\StoreCodigoPatrimonioRequest;
use App\Http\Requests\Patrimonio\StorePatrimonioRequest;
use App\Http\Requests\Patrimonio\UpdatePatrimonioRequest;
use App\Models\Classificacao;
use App\Models\Codigo;
use App\Models\MovimentoPatrimonio;
use App\Models\Origem;
use App\Models\Predio;
use App\Models\Sala;
use App\Models\Servidor;
use App\Models\Setor;
use App\Models\Situacao;
use Illuminate\Http\Request;
use App\Models\Patrimonio;
use App\Models\Subgrupo;
use PDF;

class PatrimonioController extends Controller
{
    public function index()
    {
        $patrimonios = Patrimonio::paginate(5);

        return view('patrimonio.index', compact('patrimonios'));
    }

    public function create()
    {
        $setores = Setor::all();
        $origens = Origem::orderBy('nome')->get();
        $predios = Predio::with('salas')->orderBy('nome')->get();
        $situacoes = Situacao::orderBy('nome')->get();
        $subgrupos = Subgrupo::orderBy('nome')->get();
        $servidores = Servidor::with(['user' => function ($query) {
            $query->orderBy('name');
        }])->get();

        return view('patrimonio.create', compact('setores', 'origens', 'predios', 'situacoes', 'servidores', 'subgrupos'));
    }

    public function gerarRelatorio()
    {
        $patrimonio = Patrimonio::all();
        $pdf = PDF::loadView('pdf.patrimonio', ['patrimonio' => $patrimonio]);
        return $pdf->stream('relatorio_patrimonio.pdf');
    }


    public function store(StorePatrimonioRequest $request)
    {
        $this->authorize('create', Patrimonio::class);
        $validatedData = $request->validated();

        $patrimonio = Patrimonio::create($validatedData);

        return redirect()->route('patrimonio.codigo.index', ['patrimonio_id' => $patrimonio->id])->with('success', 'Patrimônio Cadastrado com Sucesso, Adicione os Códigos ao Patrimônio.');
    }

    public function edit($patrimonio_id)
    {
        $patrimonio = Patrimonio::find($patrimonio_id);
        $setores = Setor::all();
        $origens = Origem::all();
        $predios = Predio::all();
        $situacoes = Situacao::all();
        $classificacoes = Classificacao::all();
        $servidores = Servidor::all();
        return view('patrimonio.edit', compact('patrimonio', 'setores', 'origens', 'predios', 'situacoes', 'servidores', 'classificacoes'));
    }

    public function update(UpdatePatrimonioRequest $request)
    {
        Patrimonio::find($request->patrimonio_id)->update($request->all());
        return redirect(route('patrimonio.index'))->with('success', 'Patrimonio Editado com Sucesso!');
    }

    public function delete($patrimonio_id)
    {
        $patrimonio = Patrimonio::find($patrimonio_id);
        $movimento = MovimentoPatrimonio::where('patrimonio_id', $patrimonio->id)->first();
        if ($movimento == null) {
            $patrimonio->delete();
            return redirect(route('patrimonio.index'))->with('success', 'Patrimonio Removido com Sucesso!');
        } else {
            return redirect(route('patrimonio.index'))->with('fail', 'Não é possivel remover, o patrimônio já foi movimentado.');
        }
    }

    public function getSalas(Request $request)
    {
        $predio_id = json_decode($request->predio_id);
        $salas = Sala::where('predio_id', $predio_id)->get();
        return response()->json($salas);
    }

    public function codigosPatrimonio($patrimonio_id)
    {
        $patrimonio = Patrimonio::find($patrimonio_id);
        return view('patrimonio.codigo.index_create', compact('patrimonio'));
    }

    public function codigoStore(StoreCodigoPatrimonioRequest $request)
    {
        Codigo::create($request->all());

        return redirect()->route('patrimonio.codigo.index', ['patrimonio_id' => $request->patrimonio_id])->with('success', 'Código Cadastrado com Sucesso!');
    }

    public function codigoDelete($codigo_id)
    {
        $codigo = Codigo::find($codigo_id);
        $patrimonio = Patrimonio::find($codigo->patrimonio_id);
        $codigo->delete();
        return view('patrimonio.codigo.index_create', compact('patrimonio'));
    }

    public function busca(Request $request){
        $item = $request->input('busca');
        $patrimonios = Patrimonio::where('nome', 'ilike',  '%' . $item . '%')->paginate(10);

        return view('patrimonio.index', compact('patrimonios'));
    }
}
