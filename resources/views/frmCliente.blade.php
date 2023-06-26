@extends('template')

@section('conteudo')
<h2 class="text-left text-white">{{$cliente->id==0 ? 'Cadastro' : 'Alteração'}} de Clientes</h2>
<div class="linha-list-veiculo mt-3 mb-3 d-flex"></div>
@if ($cliente->imagem != "")
<img style="width: 200px;object-fit:cover" class="mb-5 mt-5 rounded" src="/storage/imagens/{{$cliente->imagem}}">
@endif

<form action="{{url('cliente/salvar')}}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="mb-3  @if($cliente->id==0) d-none @endif">
    <label for="id" class="text-gray mb-1">ID</label>
    <input readonly type="text" name="id" value="{{$cliente->id}}">
  </div>

  <div class="mb-3">
    <label for="arquivo" class="text-gray mb-1">Figura</label>
    <input type="file" {{ $cliente->id == 0 ? 'required': ''}} name="arquivo" accept="image/*">
  </div>
  
  <div class="mb-3">
    <label for="nome" class="text-gray mb-1">Nome</label>
    <input class="@error('nome') is-invalid @enderror" type="text" name="nome" value="{{$cliente->nome}}">
  </div>
  
  <div class="mb-3">
    <label for="telefone" class="text-gray mb-1">Telefone</label>
    <input class="@error('telefone') is-invalid @enderror" type="tel" name="telefone" value="{{$cliente->telefone}}">
  </div>

  <div class="mb-3">
    <label for="cpf" class="text-gray mb-1">CPF</label>
    <input class="@error('cpf') is-invalid @enderror" type="number" name="cpf" value="{{$cliente->cpf}}">
  </div>

  <div class="mb-3">
    <label for="email" class="text-gray mb-1">Email</label>
    <input class="@error('email') is-invalid @enderror" type="email" name="email" value="{{$cliente->email}}">
  </div>

  <div class="mb-3">
    <label for="cep" class="text-gray mb-1">CEP</label>
    <input class="@error('cep') is-invalid @enderror" type="text" name="cep" id="cep" value="{{$cliente->cep}}">
  </div>

  <div class="mb-3">
    <label for="logradouro" class="text-gray mb-1">Logradouro</label>
    <input class="@error('logradouro') is-invalid @enderror" type="text" name="logradouro" id="logradouro" value="{{$cliente->logradouro}}">
  </div>

  <div class="mb-3">
    <label for="bairro" class="text-gray mb-1">Bairro</label>
    <input class="@error('bairro') is-invalid @enderror" type="text" name="bairro" id="bairro" value="{{$cliente->bairro}}">
  </div>

  <div class="mb-3">
    <label for="cidade" class="text-gray mb-1">Cidade</label>
    <input class="@error('cidade') is-invalid @enderror" type="text" name="cidade" id="cidade" value="{{$cliente->cidade}}">
  </div>

  <div class="mb-3">
    <label for="uf" class="text-gray mb-1">UF</label>
    <input class="@error('uf') is-invalid @enderror" type="text" name="uf" id="uf" value="{{$cliente->uf}}">
  </div>

  <div class="mb-3">
    <label for="numero" class="text-gray mb-1">Número</label>
    <input class="@error('numero') is-invalid @enderror" type="number" name="numero" id="numero" value="{{$cliente->numero}}">
  </div>
  <button class="btn bg-orange btn-height-50" type="submit" name="button">Salvar</button>
</form>
@endsection