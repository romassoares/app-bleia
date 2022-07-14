@extends('adminlte::page')

@section('title', 'ponto')

@section('content_header')
<h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{route('ponto.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="user_id" id="user_id" value="{{auth()->user()->id}}">
                    <input type="text" name="cidade" id="cidade" placeholder="cidade" value="{{isset($ponto)?$ponto->cidade:old('cidade')}}">

                    <input type="text" name="bairro" id="bairro" placeholder="bairro" value="{{isset($ponto)?$ponto->bairro:old('bairro')}}">

                    <input type="text" name="rua" id="rua" placeholder="rua" value="{{isset($ponto)?$ponto->rua:old('rua')}}">

                    <input type="text" name="numero" id="numero" placeholder="numero" value="{{isset($ponto)?$ponto->numero:old('numero')}}">

                    <input type="text" name="contato" id="contato" placeholder="contato" value="{{isset($ponto)?$ponto->contato:old('contato')}}">
                    <button type="submit">Salvar</button>
                    <a href="{{route('ponto.index')}}">voltar</a>
                </form>
            </div>
        </div>
    </div>
</div>
@stop