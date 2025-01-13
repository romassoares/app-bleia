<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dizimo extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'membros_id',
        'ponto_id',
        'valor',
        'mes_referencia',
        'users_id',
    ];

    public function setAll($data)
    {
        $this->membros_id = $data['membros_id'];
        $this->ponto_id = $data['ponto_id'];
        $this->valor = $data['valor'];
        $this->mes_referencia = $data['mes_referencia'];
        $this->users_id = $data['users_id'];
    }

    // public function Membro()
    // {
    //     return $this->hasOne(Membro::class, 'id');
    // }
    public function Membro()
    {
        return $this->belongsTo(Membro::class, 'membros_id');
    }
}
