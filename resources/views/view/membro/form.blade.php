@extends('adminlte::page')

@section('title', 'Membro')

@section('content_header')
<h1 class="m-0 text-dark">Membro</h1>
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
                @if (isset($membro))
                <form action="{{route('membros.update',['id'=>$membro->id])}}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @else
                    <form action="{{route('membros.store')}}" method="post" enctype="multipart/form-data">
                        @endif
                        @csrf
                        <input type="hidden" name="users_id" id="users_id" value="{{Auth::id()}}">
                        <div class="row">
                            <div class="col">
                                <label for="nome">Nome</label>
                                <input type="text" name="nome" id="nome" class="form-control  @error('nome') is-invalid @enderror" value="{{$membro->nome ?? old('nome')}}">
                                @error('nome')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="sexo">Sexo</label>
                                <select name="sexo" id="sexo" class="form-control  @error('sexo') is-invalid @enderror">
                                    <option value="m">Masculino</option>
                                    <option value="f">Feminino</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="cpf">CPF</label>
                                <input type="text" name="cpf" id="cpf" class="form-control  @error('cpf') is-invalid @enderror" value="{{$membro->cpf ?? old('cpf')}}" maxlength="11">
                                @error('cpf')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="estado_civil">Estado civil</label>
                                <select name="estado_civil" id="estado_civil" class="form-control">
                                    @foreach (App\Models\Membro::estadosCivis() as $key => $label)
                                    <option @if(isset($membro)&&$membro->estado_civil == $key) selected @endif value="{{ $key }}">{{ $label }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <label for="naturalidade">Naturalidade</label>
                                <input type="text" name="naturalidade" id="naturalidade" class="form-control  @error('naturalidade') is-invalid @enderror" value="{{$membro->naturalidade ?? old('naturalidade')}}">
                                @error('naturalidade')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="cep">CEP</label>
                                <input type="text" name="cep" id="cep" class="form-control  @error('cep') is-invalid @enderror" value="{{$membro->cep ?? old('cep')}}" maxlength="9">
                                @error('cep')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="cidade">Cidade</label>
                                <input type="text" name="cidade" id="cidade" class="form-control  @error('cidade') is-invalid @enderror" value="{{$membro->cidade ?? old('cidade')}}">
                                @error('cidade')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="bairro">Bairro</label>
                                <input type="text" name="bairro" id="bairro" class="form-control  @error('bairro') is-invalid @enderror" value="{{$membro->bairro ?? old('bairro')}}">
                                @error('bairro')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="rua">Rua</label>
                                <input type="text" name="rua" id="rua" class="form-control  @error('rua') is-invalid @enderror" value="{{$membro->rua ?? old('rua')}}">
                                @error('rua')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col">
                                <label for="numero">Número</label>
                                <input type="text" name="numero" id="numero" class="form-control  @error('numero') is-invalid @enderror" value="{{$membro->numero ?? old('numero')}}">
                                @error('numero')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="nome_mae">Nome mãe</label>
                                <input type="text" name="nome_mae" id="nome_mae" class="form-control  @error('nome_mae') is-invalid @enderror" value="{{$membro->nome_mae ?? old('nome_mae')}}">
                                @error('nome_mae')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="nome_pai">Nome pai</label>
                                <input type="text" name="nome_pai" id="nome_pai" class="form-control  @error('nome_pai') is-invalid @enderror" value="{{$membro->nome_pai ?? old('nome_pai')}}">
                                @error('nome_pai')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="data_batismo">Data batismo</label>
                                <input type="date" name="data_batismo" id="data_batismo" class="form-control  @error('data_batismo') is-invalid @enderror" value="{{$membro->data_batismo ?? old('data_batismo')}}">
                                @error('data_batismo')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="data_nascimento">Data nascimento</label>
                                <input type="date" name="data_nascimento" id="data_nascimento" class="form-control  @error('data_nascimento') is-invalid @enderror" value="{{$membro->data_nascimento ?? old('data_nascimento')}}">
                                @error('data_nascimento')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="cargo_id">Cargo</label>
                                <select class="form-control  @error('title') is-invalid @enderror" name="cargo_id" id="cargo_id">
                                    @foreach ($cargos as $cargo )
                                    <option @if(isset($membro) && $membro->cargo_id == $cargo->id ) selected @endif value="{{$cargo->id}}">{{$cargo->nome}} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <label for="ponto_id">Ponto</label>
                                <select class="form-control  @error('title') is-invalid @enderror" name="ponto_id" id="ponto_id">
                                    @foreach ($pontos as $ponto )
                                    <option @if(isset($membro) && $membro->cargo_id == $ponto->id ) selected @endif value="{{$ponto->id}}">{{$ponto->descricao}} - {{$ponto->bairro}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <a class="btn btn-secondary" href="{{route('membros.index')}}">Voltar</a>
                            </div>
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