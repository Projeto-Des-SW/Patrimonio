<?php

namespace App\Http\Controllers;

use App\Models\Movimento;
use Illuminate\Http\Request;

class MovimentoController extends Controller
{
    public function index()
    {
        $movimentos = Movimento::all();

        return view('movimento.index', compact('movimentos'));
    }
}
