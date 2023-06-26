@extends('template')

@section('conteudo')
<h2 class="text-left text-white">{{$locacao->id==0 ? 'Cadastrado' : 'Alteração'}} de Locação</h2>
<div class="linha-list-veiculo mt-3 mb-3 d-flex"></div>
<form action="{{url('locacao/salvar')}}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="mb-3 @if($locacao->id==0) d-none @endif">
    <label for="id" class="text-gray mb-1">ID</label>
    <input readonly type="text" name="id" value="{{$locacao->id}}">
  </div>


  <div class="mb-3">
    <label for="data_locacao" class="text-gray mb-1">Data Locacao</label>
    <input class="@error('data_locacao') is-invalid @enderror" type="date" name="data_locacao" value="{{old('data_locacao', $locacao->data_locacao)}}">
  </div>

  <div class="mb-3">
    <label for="data_entrega" class="text-gray mb-1">Data Entrega</label>
    <input class="@error('data_entrega') is-invalid @enderror" type="date" name="data_entrega" value="{{old('data_entrega', $locacao->data_entrega)}}">
  </div>

  <div class="mb-3 @if($locacao->id==0) d-none @endif">
    <label for="status" class="text-gray mb-1">status</label>
    <select class="@error('status') is-invalid @enderror" name="status">
      <option {{ $locacao->status != 2 ?'selected': ''}} value="1">Aberta</option>
      <option {{ $locacao->status == 2 ?'selected': ''}} value="2">Fechada</option>
    </select>
  </div>

  <div class="mb-3">
    <label for="cliente_id" class="text-gray mb-1">cliente</label>
    <select class="@error('cliente_id') is-invalid @enderror" name="cliente_id">
      @foreach($clientes as $cliente)
      <option {{ $cliente->id == old('cliente_id', $locacao->cliente_id) ?'selected': ''}} value="{{$cliente->id}} ">{{$cliente->nome}}</option>
      @endforeach
    </select>
  </div>

  <div class="mb-3">
    <label for="veiculo_id" class="text-gray mb-1">veiculo</label>
    <select class="@error('veiculo_id') is-invalid @enderror" name="veiculo_id">
      @foreach($veiculos as $veiculo)
      <option {{ $veiculo->id == old('veiculo_id', $locacao->veiculo_id) ?'selected': ''}} {{ $veiculo->status == 1 && $locacao->veiculo_id != $veiculo->id ? 'disabled': ''}} value="{{$veiculo->id}}">{{$veiculo->modelo}}</option>
      @endforeach
    </select>
  </div>

  <button class="btn bg-orange btn-height-50" type="submit" name="button">Salvar</button>
</form>
@endsection