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
                <a href="{{route('ponto.create')}}">Criar</a>
            </div>
        </div>
    </div>
</div>
@stop