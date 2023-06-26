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
<form class="form-filtro" action="{{url('veiculo/listar')}}" method="post">
  @csrf
  <a href="novo" class="btn btn-add-relatorio mb-3 bg-orange text-white" title="Adicionar novo veículo">
    <i class="fa-solid fa-plus"></i>
    <span>Adicionar</span>
  </a>
  <input type="search" name="pesquisa" value="{{$filters}}" placeholder="Filtrar por modelo, placa ou categoria">
  <!-- <select name="status">
    <option value="2" {{ $status != 1 && $status != 0 ? "selected": ""}}>Mostrar todos</option>
    <option value="0" {{ $status != 1 && $status != 2 ? "selected": ""}}>Disponivel</option>
    <option value="1" {{ $status != 0 && $status != 2 ? "selected": ""}}>Não disponivel</option>
  </select> -->
  <button type="submit" class="btn-filtrar">Filtar</button>
</form>
<div class="container-list-veiculos">
  <h2 class="titulo-h2">Listagem de Veículos</h2>
  @foreach($veiculos as $veiculo)
  <div class="card-list-veiculo @if($veiculo->status==1) row-danger @endif">
    <img src="/storage/imagens/{{$veiculo->imagem}}" alt="" srcset="" width="200">
    <div class="right-list-veiculo">
      <div class="text-list-veiculo">
        <span class="font-bold">{{$veiculo->modelo}} -
          <span class="text-orange font-bold">R$ {{$veiculo->valor_dia}} / dia</span>
        </span>
        <span class="text-gray">{{$veiculo->ano}} - {{$veiculo->categoria->descricao}} - {{$veiculo->placa}}</span>
        <span class="@if($veiculo->status==0) text-gray @endif @if($veiculo->status==1) text-orange @endif">{{$veiculo->status == 1 ? 'Não disponivel' : 'Disponivel'}}</span>
      </div>
      <div class="linha-list-veiculo"></div>
      <div class="opcoes-list-veiculo">
        <a class="card-icon-list-veiculo" href='editar/{{$veiculo->id}}' title='Alterar {{$veiculo->id}}'>
          <i class='fa-sharp fa-solid fa-pen-to-square'></i>
          <span>Alterar</span>
        </a>
        <a class="card-icon-list-veiculo" data-bs-toggle='modal' data-bs-target='#staticBackdrop{{$veiculo->id}}' title='Remover {{$veiculo->id}}'>
          <i class='fa-sharp fa-solid fa-trash'></i>
          <span>Remover</span>
        </a>
      </div>
    </div>
  </div>

  <div class='modal fade' id='staticBackdrop{{$veiculo->id}}' data-bs-backdrop='static' data-bs-keyboard='false' tabindex='-1' aria-labelledby='staticBackdropLabel' aria-hidden='true'>
    <div class='modal-dialog modal-dialog-centered'>
      <div class='modal-content'>
        <div class='modal-header'>
          <h5 class='modal-title' id='staticBackdropLabel'>Exclusão de Veículo</h5>
          <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
        </div>
        <div class='modal-body text-center'>
          Desejea realmente excluir o veículo <span style='font-weight: bold;'>{{$veiculo->modelo}}</span>? Todas as locações vinculadas a esse veículo tambem serão removidas!
        </div>
        <div class='modal-footer'>
          <button type='button' class='btn btn-primary' data-bs-dismiss='modal'>Cancelar</button>
          <a class='btn btn-danger' href='excluir/{{$veiculo->id}}'>Confirmar</a>
        </div>
      </div>
    </div>
  </div>
  @endforeach
</div>
{{ $veiculos->links() }}
@endsection