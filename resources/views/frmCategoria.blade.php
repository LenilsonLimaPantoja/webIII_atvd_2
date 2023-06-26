@extends('template')

@section('conteudo')
<h2 class="text-left text-white">{{$categoria->id==0 ? 'Cadastro' : 'Alteração'}} de Categoria</h2>
<div class="linha-list-veiculo mt-3 mb-3"></div>
<form action="{{url('categoria/salvar')}}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="mb-3 @if($categoria->id==0) d-none @endif">
    <label for="id" class="text-gray mb-1">ID</label>
    <input readonly readonly type="text" name="id" value="{{$categoria->id}}">
  </div>
  <div class="mb-3">
    <label for="id" class="text-gray mb-1">Descrição</label>
    <input class="@error('descricao') value-invalid @enderror" type="text" placeholder="Informe a descrição" name="descricao" value="{{$categoria->descricao}}">
  </div>
  <button class="btn bg-orange btn-height-50" type="submit" name="button">Salvar</button>
</form>
@endsection