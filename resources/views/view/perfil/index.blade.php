@extends('adminlte::page')

@section('title', 'Perfil')

@section('content_header')
<h1 class="m-0 text-dark">Perfis</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{route('perfil.store')}}" method="post">
                    @csrf
                    <div class="row">

                        <div class="col-4">
                            <span>CNPJ</span>
                            <input type="hidden" name="id_perfil" id="id_perfil" value="{{$perfils->id??''}}">
                            <input type="text" name="cnpj" id="cnpj" class="form-control @error('cnpj') is-invalid @enderror" value="{{$perfils->cnpj ?? old('cnpj')}}" maxlength="14">
                            @error('cnpj')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-4">
                            <span>Nome fantasia/Razão social</span>
                            <input type="text" name="razao_social" id="razao_social" class="form-control  @error('razao_social') is-invalid @enderror" value="{{$perfils->razao_social ?? old('razao_social')}}">
                            @error('razao_social')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-4">
                            <span>Cidade</span>
                            <input class="form-control @error('cidade') is-invalid @enderror" type="text" name="cidade" id="cidade" placeholder="cidade" value="{{isset($perfils) ? $perfils->cidade : old('cidade')}}">
                        </div>
                    </div>
                    <div class="col my-2">
                        <button type="submit" class="btn btn-success">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
@section('js')
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    document.querySelector('#cnpj').addEventListener('change', async function(event) {
        event.preventDefault()
        var value = this.value.replace(/[^\d]/g, '');
        const result = await axios({
            method: 'get',
            url: 'https://brasilapi.com.br/api/cnpj/v1/{' + this.value + '}',
        });

        document.querySelector('#cidade').value = result.data.municipio
        document.querySelector('#razao_social').value = result.data.nome_fantasia
        console.log(result)
    })
    // 31519380000107
    // https://brasilapi.com.br/api/cnpj/v1/{cnpj}
</script>
@endsection