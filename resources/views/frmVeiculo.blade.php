@extends('template')

@section('conteudo')
<h2 class="text-left text-white">{{$veiculo->id==0 ? 'Cadastro' : 'Alteração'}} de Veiculo</h2>
<div class="linha-list-veiculo mt-3 mb-3 d-flex"></div>
@if ($veiculo->imagem != "")
<img class="mb-5 mt-5 rounded" style="width: 300px;object-fit:cover;" src="/storage/imagens/{{$veiculo->imagem}}">
@endif

<form action="{{url('veiculo/salvar')}}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="mb-3 @if($veiculo->id==0) d-none @endif">
    <label for="id" class="text-gray mb-1">ID</label>
    <input class="@error('id') value-invalid @enderror" readonly type="text" name="id" value="{{$veiculo->id}}"">
  </div>

  <div class="mb-3">
    <label for="modelo" class="text-gray mb-1">Modelo</label>
    <input class="@error('modelo') value-invalid @enderror" type="text" placeholder="Modelo do veículo" name="modelo" value="{{old('modelo', $veiculo->modelo)}}">
  </div>

  <div class="mb-3">
    <label for="marca" class="text-gray mb-1">Marca</label>
    <input class="@error('marca') value-invalid @enderror" type="text" name="marca" value="{{old('marca', $veiculo->marca)}}" placeholder="Marca do veículo">
  </div>

  <div class="mb-3">
    <label for="valor_dia" class="text-gray mb-1">Valor da diária</label>
    <input class="@error('valor_dia') value-invalid @enderror" type="number" name="valor_dia" value="{{old('marca', $veiculo->valor_dia)}}" placeholder="Valor da diária">
  </div>

  <div class="mb-3">
    <label for="placa" class="text-gray mb-1">Placa</label>
    <input class="@error('placa') value-invalid @enderror" type="text" name="placa" value="{{old('marca', $veiculo->placa)}}" placeholder="Placa">
  </div>

  <div class="mb-3">
    <label for="ano" class="text-gray mb-1">Ano</label>
    <input class="@error('ano') value-invalid @enderror" type="number" name="ano" value="{{old('marca', $veiculo->ano)}}" placeholder="Ano do veículo">
  </div>

  <div class="mb-3">
    <label for="categoria_id" class="text-gray mb-1">Categoria</label>
    <select class="@error('categoria_id') is-invalid @enderror" name="categoria_id">
      @foreach($categorias as $categoria)
      <option {{ $categoria->id == old('categoria_id', $veiculo->categoria_id) ?'selected': ''}} value="{{$categoria->id}} ">{{$categoria->descricao}}</option>
      @endforeach
    </select>
  </div>

  <div class="mb-3">
    <label for="arquivo" class="text-gray mb-1">Figura</label>
    <input class="@error('arquivo') value-invalid @enderror" type="file" name="arquivo" accept="image/*">
  </div>

  <button class="btn bg-orange btn-height-50" type="submit" name="button">Salvar</button>
</form>
@endsection