@extends('adminlte::page')

@section('title', 'Perfil')

@section('content_header')
<h1 class="m-0 text-dark">Perfil</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{route('.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>
@stop