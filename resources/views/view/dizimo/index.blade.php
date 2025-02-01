@extends('adminlte::page')

@section('title', 'Dizimo')

@section('content_header')
<h1 class="m-0 text-dark">Dizimos</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table class="table table-sm">
                    <thead>
                        <th>#</th>
                        <th>valor</th>
                        <th>Membro</th>
                        <th>mes_referencia</th>
                        <th>ações</th>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        @foreach ($dizimos as $dizimo )
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$dizimo->valor}}</td>
                            <td>{{ $dizimo->Membro->nome ?? '' }}</td>
                            <td>{{$dizimo->mes_referencia}}</td>
                            <td>
                                <div class="">

                                    <a class="btn text-danger" href="{{route('dizimos.destroy',['id'=>$dizimo->id])}}">
                                        <i class="fas fa-trash"></i>
                                    </a>

                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <div class="col-12 d-flex justify-content-around">
                    <div class="col">
                        <a href="{{route('dizimos.create')}}" class="btn btn-primary">Novo</a>
                    </div>
                    <div class="col">
                        {{$dizimos->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop