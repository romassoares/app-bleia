@extends('adminlte::page')

@section('title', 'Cargo')

@section('content_header')
<h1 class="m-0 text-dark">Cargo</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{route('cargos.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-12">
                        <div class="col">
                            <label for="nome">nome</label>
                            <input type="text" name="nome" id="nome">
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-around">
                        <div class="col">
                            <button type="submit" class="btn btn-success">Salvar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop