<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Membro extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'foto',
        'nome',
        'cpf',
        'rg',
        'data_batismo',
        'data_nascimento',
        'naturalidade',
        'estado_civil',
        'nome_mae',
        'nome_pai',
        'data_consagracao',
        'data_emissão',
        'cargo_id',
        'ponto_id',
        'users_id'
    ];
}
