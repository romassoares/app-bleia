@extends('adminlte::page')

@section('title', 'Membro')

@section('content_header')
<h1 class="m-0 text-dark">Membros</h1>
@stop

@section('content')
<!-- <div class="col-12"> -->
<div class="card">
    <div class="card-body">
        <table class="table table-sm">
            <thead>
                <th>#</th>
                <th>nome</th>
                <th>bairro</th>
                <th>rua</th>
                <th>numero</th>
                <th>ações</th>
            </thead>
            <tbody>
                <?php $i = 0; ?>
                @foreach ($membros as $membro )
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$membro->nome}}</td>
                    <td>{{$membro->bairro}}</td>
                    <td>{{$membro->rua}}</td>
                    <td>{{$membro->numero}}</td>
                    <td>
                        <div class="col">
                            <a class="btn text-primary" href="{{route('membros.show',['id'=>$membro->id])}}">
                                <i class="fas fa-eye"></i>
                            </a>
                            @if(is_null($membro->deleted_at))
                            <a class="btn text-warning" href="{{route('membros.edit',['id'=>$membro->id])}}">
                                <i class="fas fa-edit"></i>
                            </a>
                            @endif
                            @if(is_null($membro->deleted_at))
                            <a class="btn text-danger" href="{{route('membros.destroy',['id'=>$membro->id])}}">
                                <i class="fas fa-trash"></i>
                            </a>
                            @else
                            <a class="btn text-success" href="{{route('membros.restore',['id'=>$membro->id])}}">
                                <i class="fas fa-redo-alt"></i>
                            </a>
                            @endif
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer d-flex justify-content-around">
        <div class="col">
            <a class="btn btn-primary" href="{{route('membros.create')}}">Novo</a>
        </div>
        <div class="col">
            {{ $membros->links() }}
        </div>
    </div>
</div>
<!-- </div> -->
@stop