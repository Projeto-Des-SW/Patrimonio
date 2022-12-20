<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Codigo extends Model
{
    use HasFactory;

    protected $fillable = ['codigo', 'patrimonio_id'];

    public function patrimonio(){
        return $this->belongsTo(Patrimonio::class);
    }
}
