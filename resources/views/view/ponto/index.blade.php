@extends('adminlte::page')

@section('title', 'Home')

@section('content_header')
<h1 class="m-0 text-dark">Membros</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table class="table table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>cidade</th>
                            <th>bairro</th>
                            <th>numero</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pontos as $ponto)
                        <tr>
                            <td>{{$ponto->id}}</td>
                            <td>{{$ponto->cidade}}</td>
                            <td>{{$ponto->bairro}}</td>
                            <td>{{$ponto->numero}}</td>
                            <td>
                                <div>
                                    <a href="{{route('ponto.show',$ponto->id)}}">ver</a>
                                    <a href="{{route('ponto.edit',$ponto->id)}}">editar</a>
                                    <a href="{{route('ponto.destroy',$ponto->id)}}">excluir</a>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5">Nenhum ponto cadastrado</td>
                        </tr>
                        @endforelse
                    </tbody>
                    <div>
                        {{$pontos->links()}}
                    </div>
                </table>
                <a href="{{route('ponto.create')}}">Criar</a>
            </div>
        </div>
    </div>
</div>
@stop