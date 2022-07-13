<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ofertas extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'ponto_id',
        'valor',
        'mes_referencia',
        'descricao',
        'users_id',
    ];
}
