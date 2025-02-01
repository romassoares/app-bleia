@extends('adminlte::page')

@section('title', 'Cargo')

@section('content_header')
<h1 class="m-0 text-dark">Cargos</h1>
@stop

@section('content')
<div class="row">
    <div class="col-3">
        <div class="card">
            <div class="card-body">
                <form action="{{route('cargos.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <input class="form-control" type="hidden" name="id" id="id">
                        <div class="col">
                            <label for="nome">nome</label>
                            <input class="form-control" type="text" name="nome" id="nome">
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col">
                            <button type="submit" class="btn btn-success">Salvar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-9">
        <div class="card">
            <div class="card-body">
                <table class="table table-sm">
                    <thead>
                        <th>#</th>
                        <th>nome</th>
                        <th>ações</th>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        @foreach ($cargos as $cargo )
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$cargo->nome}}</td>
                            <td>
                                <div class="col">
                                    @if(is_null($cargo->deleted_at))
                                    <a class="btn text-primary" onclick="editCargo({{$cargo->id}},'{{$cargo->nome}}')"><i class="fas fa-edit"></i></a>
                                    @endif
                                    @if(is_null($cargo->deleted_at))
                                    <a class="btn text-danger" href="{{route('cargos.destroy',['id'=>$cargo->id])}}"><i class="fas fa-trash"></i></a>
                                    @else
                                    <a class="btn text-success" href="{{route('cargos.restore',['id'=>$cargo->id])}}">
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
            <div class="card-footer">
                <div class="col-12 d-flex justify-content-around">
                    <div class="col">
                        <a href="{{route('cargos.create')}}" class="btn btn-primary">Novo</a>
                    </div>
                    <div class="col">
                        {{$cargos->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('js')
<script>
    function editCargo(id, nome) {
        document.querySelector('#nome').value = nome
        document.querySelector('#id').value = id
    }
</script>
@endsection