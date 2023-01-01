<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patrimonio extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'tipo', 'nota_fiscal', 'aprovado', 'descricao', 'servidor_id', 'classificacao_id', 'origem_id', 'sala_id', 'situacao_id'];

    public function servidor()
    {
        return $this->belongsTo(Servidor::class);
    }

    public function classificacao(){
        return $this->belongsTo(Classificacao::class);
    }

    public function origem(){
        return $this->belongsTo(Origem::class);
    }

    public function sala(){
        return $this->belongsTo(Sala::class);
    }

    public function situacao()
    {
        return $this->belongsTo(Situacao::class);
    }

    public function codigos()
    {
        return $this->hasMany(Codigo::class);
    }
}
