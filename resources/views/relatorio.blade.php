@extends('adminlte::page')

@section('title', 'Relatório')

@section('content')
<div class="row pt-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="col justify-content-center">
                    <h3 class="text-center">Relatório</h3>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('relatorio.relatorio')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label for="">Data inicial</label>
                            <input class="form-control" type="date" name="data_ini" id="data_ini">
                        </div>
                        <div class="col">
                            <label for="">Data Final</label>
                            <input class="form-control" type="date" name="data_fim" id="data_fim">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <button class="btn btn-primary" type="submit">Gerar PDF</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection