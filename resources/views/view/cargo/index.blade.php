@extends('adminlte::page')

@section('title', 'Cargo')

@section('content_header')
<h1 class="m-0 text-dark">Cargos</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <th>nome</th>
                        <th>ponto</th>
                        <th>ações</th>
                    </thead>
                    <tbody>
                        @foreach ($cargos as $cargo )
                        <tr>
                            <td>{{$cargo->nome}}</td>
                            <td></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <div class="col-12 d-flex justify-content-around">
                    <div class="col">
                        <a href="{{route('cargos.create')}}" class="btn btn-primary">Novo</a>
                    </div>
                    <div class="col">
                        {{$cargos->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop