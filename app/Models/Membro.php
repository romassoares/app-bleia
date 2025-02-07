<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Membro extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['nome', 'cpf', 'estado_civil', 'naturalidade', 'cep', 'cidade', 'bairro', 'rua', 'numero', 'nome_mae', 'nome_pai', 'data_batismo', 'data_nascimento', 'cargo_id', 'ponto_id', 'users_id'];
    public function setAll($data)
    {
        $this->nome = $data['nome'];
        $this->cpf = $data['cpf'];
        $this->estado_civil = $data['estado_civil'];
        $this->naturalidade = $data['naturalidade'];
        // $this->cep = $data['cep'];
        // $this->cidade = $data['cidade'];
        $this->bairro = $data['bairro'];
        $this->rua = $data['rua'];
        $this->numero = $data['numero'];
        $this->nome_mae = $data['nome_mae'];
        $this->nome_pai = $data['nome_pai'];
        $this->data_batismo = $data['data_batismo'];
        $this->data_nascimento = $data['data_nascimento'];
        $this->cargo_id = $data['cargo_id'];
        $this->ponto_id = $data['ponto_id'];
        $this->users_id = $data['users_id'];
    }
    public static function estadosCivis()
    {
        return [
            'cas' => 'Casado',
            'sol' => 'Solteiro',
            'viu' => 'Viúvo',
            'div' => 'Divorciado',
        ];
    }

    public function getSexo()
    {
        return $this->sexo == 'm' ? 'Masculino' : 'Feminino';
    }
    public function getEstadoCivil()
    {
        $estado_civil = '';
        switch ($this->estado_civil) {
            case 'cas':
                $estado_civil = 'Casado';
                break;
            case 'sol':
                $estado_civil = 'Solteiro';
                break;
            case 'viu':
                $estado_civil = 'Viúvo';
                break;
            case 'div':
                $estado_civil = 'Divorciado';
                break;
            default:
                $estado_civil = 'Não reconhecido';
                break;
        }
        return $estado_civil;
    }
    // public function Dizimo()
    // {
    //     return $this->belongsTo(Dizimo::class);
    // }
    public function Dizimos()
    {
        return $this->hasMany(Dizimo::class, 'id')->withTrashed();
    }
    public function Ponto()
    {
        return $this->hasOne(Ponto::class, 'id', 'ponto_id')->withTrashed();
    }
    public function Cargo()
    {
        return $this->hasOne(Cargo::class, 'id', 'cargo_id')->withTrashed();
    }
}
