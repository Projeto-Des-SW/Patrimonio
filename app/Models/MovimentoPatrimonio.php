<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovimentoPatrimonio extends Model
{
    use HasFactory;

    protected $table = 'movimento_patrimonios';

    protected $fillable = ['movimento_id', 'patrimonio_id'];

    public function movimento(){
        return $this->belongsTo(Movimento::class);
    }

    public function patrimonio(){
        return $this->belongsTo(Patrimonio::class);
    }
}
