@extends('adminlte::page')

@section('title', 'Membro')

@section('content_header')
<h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <label for="">Nome</label>
                        <p>
                            {{$membro->nome}}
                        </p>
                    </div>
                    <div class="col">
                        <label for="">cpf</label>
                        <p>{{$membro->cpf}}</p>
                    </div>
                    <div class="col">
                        <label for="">estado_civil</label>
                        <p>{{$membro->estado_civil}}</p>
                    </div>
                    <div class="col">
                        <label for="">naturalidade</label>
                        <p>{{$membro->naturalidade}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="">cep</label>
                        <p>{{$membro->cep}}</p>
                    </div>
                    <div class="col">
                        <label for="">cidade</label>
                        <p>{{$membro->cidade}}</p>
                    </div>
                    <div class="col">
                        <label for="">bairro</label>
                        <p>{{$membro->bairro}}</p>
                    </div>
                    <div class="col">
                        <label for="">rua</label>
                        <p>{{$membro->rua}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="">sexo</label>
                        <p>{{$membro->sexo}}</p>
                    </div>
                    <div class="col">
                        <label for="">numero</label>
                        <p>{{$membro->numero}}</p>
                    </div>
                    <div class="col">
                        <label for="">nome_mae</label>
                        <p>{{$membro->nome_mae}}</p>
                    </div>
                    <div class="col">
                        <label for="">nome_pai</label>
                        <p>{{$membro->nome_pai}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="">data_batismo</label>
                        <p>{{$membro->data_batismo}}</p>
                    </div>
                    <div class="col">
                        <label for="">data_nascimento</label>
                        <p>{{$membro->data_nascimento}}</p>
                    </div>
                    <div class="col">
                        <label for="">cargo_id</label>
                        <p>{{$membro->cargo_id}}</p>
                    </div>
                    <div class="col">
                        <label for="">ponto_id</label>
                        <p>{{$membro->ponto_id}}</p>
                    </div>
                    <!-- </div> -->
                </div>

            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col">
                        <a class="btn btn-secondary" href="{{route('membros.index')}}">Voltar</a>
                    </div>
                    <div class="col">
                        <a class="btn btn-primary" href="{{route('membros.edit',['id'=>$membro->id])}}">Editar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @stop