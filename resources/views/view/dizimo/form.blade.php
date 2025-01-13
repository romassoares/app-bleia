@extends('adminlte::page')

@section('title', 'Dizimo')

@section('content_header')
<h1 class="m-0 text-dark">Dizimo</h1>
@stop

@section('content')
<div class="row">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{route('dizimos.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="users_id" id="users_id" value="{{Auth::id()}}">
                    <div class="row">
                        <div class="col">
                            <label for="membros_id">Membro</label>
                            <select class="form-control" name="membros_id" id="membros_id">
                                @foreach ($membros as $membro)
                                <option data-ponto-id="{{$membro->ponto_id}}" value="{{$membro->id}}">{{$membro->nome}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="ponto_id">Ponto</label>
                            <select class="form-control" name="ponto_id" id="ponto_id">
                                @foreach ($pontos as $ponto)
                                <option value="{{$ponto->id}}">{{$ponto->descricao}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="valor">valor</label>
                            <input class="form-control" type="text" name="valor" id="valor">
                        </div>
                        <div class="col">
                            <label for="mes_referencia">mes_referencia</label>
                            <input class="form-control" type="date" name="mes_referencia" id="mes_referencia">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="d-flex justify-content-around">
                            <div class="col">
                                <button type="submit" class="btn btn-success">Salvar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
@section('js')
<script>
    window.onload = function() {
        selecionaPonto(document.querySelector('#membros_id'))
    }

    document.querySelector('#membros_id').addEventListener('change', function(event) {
        event.preventDefault()
        selecionaPonto(this)
    })

    function selecionaPonto(input) {
        let selectedOption = input.options[input.selectedIndex];
        let pontoId = selectedOption.dataset.pontoId;
        document.querySelector('#ponto_id').value = pontoId
    }
</script>
@endsection