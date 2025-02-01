@extends('adminlte::page')

@section('title', 'Membro')

@section('content_header')
<h1 class="m-0 text-dark">Membro</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <label for="">Nome</label>
                        <p>{{$membro->nome}}</p>
                    </div>
                    <div class="col">
                        <label for="">Sexo</label>
                        <p>{{$membro->getSexo()}}</p>
                    </div>
                    <div class="col">
                        <label for="">Estado Civil</label>
                        <p>{{$membro->getEstadoCivil()}}</p>
                    </div>
                    @if(!is_null($membro->bairro))
                    <div class="col">
                        <label for="">Naturalidade</label>
                        <p>{{$membro->naturalidade}}</p>
                    </div>
                    @endif
                    @if(!is_null($membro->bairro))
                    <div class="col">
                        <label for="">CPF</label>
                        <p>{{$membro->cpf}}</p>
                    </div>
                    @endif
                </div>
                <div class="row">
                    @if(!is_null($membro->bairro))
                    <div class="col">
                        <label for="">Bairro</label>
                        <p>{{$membro->bairro}}</p>
                    </div>
                    @endif
                    @if(!is_null($membro->rua))
                    <div class="col">
                        <label for="">Rua</label>
                        <p>{{$membro->rua}}</p>
                    </div>
                    @endif
                    @if(!is_null($membro->numero))
                    <div class="col">
                        <label for="">Número</label>
                        <p>{{$membro->numero}}</p>
                    </div>
                    @endif
                    <!-- </div>
                <div class="row"> -->
                    @if(!is_null($membro->nome_mae))
                    <div class="col">
                        <label for="">Nome mãe</label>
                        <p>{{$membro->nome_mae}}</p>
                    </div>
                    @endif
                    @if(!is_null($membro->nome_pai))
                    <div class="col">
                        <label for="">Nome Pai</label>
                        <p>{{$membro->nome_pai}}</p>
                    </div>
                    @endif
                    <!-- </div>
                <div class="row"> -->
                    @if(!is_null($membro->data_batismo))
                    <div class="col">
                        <label for="">Data batismo</label>
                        <p>{{$membro->data_batismo}}</p>
                    </div>
                    @endif
                    @if(!is_null($membro->data_nascimento))
                    <div class="col">
                        <label for="">Data Nascimento</label>
                        <p>{{$membro->data_nascimento}}</p>
                    </div>
                    @endif
                    <div class="col">
                        <label for="">Cargo</label>
                        <p>{{$membro->Cargo->nome ?? ''}}</p>
                    </div>
                    <div class="col">
                        <label for="">Ponto</label>
                        <p>{{$membro->Ponto->descricao ?? ''}}</p>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col">
                        <a class="btn btn-secondary" href="{{route('membros.index')}}">Voltar</a>
                    </div>
                    <div class="col">
                        @if(is_null($membro->deleted_at))
                        <a class="btn btn-primary" href="{{route('membros.edit',['id'=>$membro->id])}}">Editar</a>
                        @else
                        <a class="btn btn-success" href="{{route('membros.restore',['id'=>$membro->id])}}">Restaurar</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @stop