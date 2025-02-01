@extends('adminlte::page')

@section('title', 'Ponto')

@section('content_header')
<h1 class="m-0 text-dark">Pontos</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>descricao</th>
                            <th>bairro</th>
                            <th>rua</th>
                            <th>numero</th>
                            <th>contato</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        @forelse($pontos as $ponto)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$ponto->descricao}}</td>
                            <td>{{$ponto->bairro}}</td>
                            <td>{{$ponto->rua}}</td>
                            <td>{{$ponto->numero}}</td>
                            <td>{{formatContato($ponto->contato)}}</td>
                            <td>
                                <div class="col">
                                    <a class="btn text-primary" href="{{route('ponto.show', ['id'=>$ponto->id])}}"><i class="fas fa-eye"></i></a>
                                    @if(is_null($ponto->deleted_at))
                                    <a class="btn text-warning" href="{{route('ponto.edit', ['id'=>$ponto->id])}}"><i class="fas fa-edit"></i></a>
                                    @endif

                                    @if(is_null($ponto->deleted_at))
                                    <a class="btn text-danger" href="{{route('ponto.destroy', ['id'=>$ponto->id])}}"><i class="fas fa-trash"></i></a>
                                    @else
                                    <a class="btn text-success" href="{{route('ponto.restore',['id'=>$ponto->id])}}">
                                        <i class="fas fa-redo-alt"></i>
                                    </a>
                                    @endif
                                    <!-- </div> -->
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
                <a class="btn btn-primary" href="{{route('ponto.create')}}">Criar</a>
            </div>
        </div>
    </div>
</div>
@stop