<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setor extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'codigo', 'setor_pai_id'];

    public function setor_pai(){
        return $this->belongsTo(Setor::class, 'setor_pai_id');
    }
}
