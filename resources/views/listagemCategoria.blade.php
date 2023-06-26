@extends('template')

@section('conteudo')
@if ($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif
<form class="form-filtro" action="{{url('categoria/listar')}}" method="post">
  @csrf
  <a href="novo" class="btn btn-add-relatorio mb-3 bg-orange text-white" title="Adicionar nova categoria">
    <i class="fa-solid fa-plus"></i>
    <span>Adicionar</span>
  </a>
  <input type="text" name="pesquisa" value="{{$filters}}" placeholder="Filtrar pela descrição">
  <button type="submit" class="btn-filtrar">Filtar</button>
</form>
<div class="container-list-veiculos">
  <h2 class="titulo-h2">Listagem de Categorias</h2>
  @foreach($categorias as $categoria)
  <div class="card-list-veiculo p-20 items-center">
    <img src="https://cdn-icons-png.flaticon.com/512/1646/1646740.png" alt="" srcset="" class="img-circle">
    <div class="right-list-veiculo">
      <div class="text-list-veiculo">
        <span class="text-orange font-bold">
          <span class="text-gray">{{$categoria->id}}</span> -
          {{$categoria->descricao}}</span>
      </div>
      <div class="linha-list-veiculo"></div>
      <div class="opcoes-list-veiculo">
        <a class="card-icon-list-veiculo" href='editar/{{$categoria->id}}' title='Alterar {{$categoria->id}}'>
          <i class='fa-sharp fa-solid fa-pen-to-square'></i>
          <span>Alterar</span>
        </a>
        <a class="card-icon-list-veiculo" data-bs-toggle='modal' data-bs-target='#staticBackdrop{{$categoria->id}}' title='Remover {{$categoria->id}}'>
          <i class='fa-sharp fa-solid fa-trash'></i>
          <span>Remover</span>
        </a>
      </div>
    </div>
  </div>

  <div class='modal fade' id='staticBackdrop{{$categoria->id}}' data-bs-backdrop='static' data-bs-keyboard='false' tabindex='-1' aria-labelledby='staticBackdropLabel' aria-hidden='true'>
    <div class='modal-dialog modal-dialog-centered'>
      <div class='modal-content'>
        <div class='modal-header'>
          <h5 class='modal-title' id='staticBackdropLabel'>Exclusão de Categoria</h5>
          <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
        </div>
        <div class='modal-body text-center'>
          Desejea realmente excluir a categoria <span style='font-weight: bold;'>{{$categoria->descricao}}</span>? Todos os veículos vinculados a essa categoria tambem serão removidos!
        </div>
        <div class='modal-footer'>
          <button type='button' class='btn btn-primary' data-bs-dismiss='modal'>Cancelar</button>
          <a class='btn btn-danger' href='excluir/{{$categoria->id}}'>Confirmar</a>
        </div>
      </div>
    </div>
  </div>
  @endforeach
</div>
{{$categorias->links()}}
@endsection