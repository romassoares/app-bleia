<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Ponto extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'descricao',
        'cidade',
        'bairro',
        'rua',
        'numero',
        'contato',
        'user_id'
    ];

    public function setAll($data)
    {
        $this->descricao = $data['descricao'];
        $this->cidade = $data['cidade'];
        $this->bairro = $data['bairro'];
        $this->rua = $data['rua'];
        $this->numero = $data['numero'];
        $this->contato = $data['contato'];
        $this->user_id = $data['user_id'];
    }

    public function Membro()
    {
        return $this->hasMany(Membro::class, 'ponto_id');
    }
}
