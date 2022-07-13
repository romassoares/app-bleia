<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ponto extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'cidade',
        'bairro',
        'rua',
        'numero',
        'contato',
        'users_id',
    ];
}
