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

<form class="form-filtro" action="{{url('locacao/listar')}}" method="post">
  @csrf
  <a href="relatorio" class="btn btn-warning btn-add-relatorio mb-3" title="Baixar relatório">
  <i class="fa-solid fa-file-pdf"></i>
    <span>Relatório</span>
  </a>
  <a href="novo" class="btn btn-add-relatorio mb-3 bg-orange text-white" title="Adicionar nova locação">
    <i class="fa-solid fa-plus"></i>
    <span>Adicionar</span>
  </a>
  <input type="search" name="pesquisa" value="{{$filters}}" placeholder="Filtrar por nome, CPF, placa ou modelo">
  <!-- <select name="status">
    <option value="3" {{ $status != 1 && $status != 2 ? "selected": ""}}>Mostrar todos</option>
    <option value="1" {{ $status != 2 && $status != 3 ? "selected": ""}}>Abertas</option>
    <option value="2" {{ $status != 1 && $status != 3 ? "selected": ""}}>Fechadas</option>
  </select> -->
  <button type="submit" class="btn-filtrar">Filtar</button>
</form>
<div class="container-list-veiculos">
  <h2 class="titulo-h2">Listagem de Locações</h2>
  @foreach($locacoes as $locacao)
  <div class="card-list-veiculo p-20 items-center @if($locacao->status==2) row-success @endif @if(floor(strtotime($locacao['data_entrega']) - strtotime(date('Y-m-d')))<0 && $locacao->status==1) row-danger @endif">
    <img src="/storage/imagens/{{$locacao->cliente->imagem}}" alt="" srcset="" class="img-circle">
    <div class="right-list-veiculo">
      <div class="text-list-veiculo">
        <span class="font-bold">
          <a class='w-full text-white' type='button' data-bs-toggle='modal' data-bs-target='#staticBackdropCli{{$locacao->cliente->id}}'>
            {{$locacao->cliente->nome}}
          </a>
          -
          <span class="text-orange font-bold">
            <a class='w-full text-orange' type='button' data-bs-toggle='modal' data-bs-target='#staticBackdropVeiculo{{$locacao->veiculo->id}}'>
              {{$locacao->veiculo->modelo}}
            </a>
          </span>
        </span>
        <span class="text-gray">{{$locacao->cliente->cpf}}</span>
        <span class="text-gray">
          {{$locacao->data_locacao}} à {{$locacao->data_entrega}} - {{$locacao->dias}} dia(s) -
          <span class="text-orange font-bold">R$ {{$locacao->dias * $locacao->veiculo->valor_dia}}</span>
        </span>
        <span class="text-orange font-bold">{{$locacao->status == 1 ? 'Aberta' : 'Fechada'}}{{floor(strtotime($locacao['data_entrega']) - strtotime(date('Y-m-d'))) < 0 && $locacao->status==1 ? ' / Atrasada' : ''}}</span>
      </div>
      <div class="linha-list-veiculo"></div>
      <div class="opcoes-list-veiculo">
        <a class="card-icon-list-veiculo" href='editar/{{$locacao->id}}' title='Alterar {{$locacao->id}}'>
          <i class='fa-sharp fa-solid fa-pen-to-square'></i>
          <span>Alterar</span>
        </a>
        <a class="card-icon-list-veiculo" data-bs-toggle='modal' data-bs-target='#staticBackdrop{{$locacao->id}}' title='Remover {{$locacao->id}}'>
          <i class='fa-sharp fa-solid fa-trash'></i>
          <span>Remover</span>
        </a>
      </div>
    </div>
  </div>

  <div class='modal fade' id='staticBackdropCli{{$locacao->cliente->id}}' data-bs-backdrop='static' data-bs-keyboard='false' tabindex='-1' aria-labelledby='staticBackdropLabel' aria-hidden='true'>
    <div class='modal-dialog modal-dialog-centered'>
      <div class='modal-content'>
        <div class='modal-header'>
          <h5 class='modal-title' id='staticBackdropLabel'>Dados do cliente</h5>
          <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
        </div>
        <div class='modal-body text-center'>
          <div class="w-full d-flex justify-content-center">
            @if ($locacao->cliente->imagem != "")
            <img src="/storage/imagens/{{$locacao->cliente->imagem}}" class="rounded-circle p-1" style="width: 200px;" alt="...">
            @endif
            <ul class="list-group list-group-flush">
              <li class="list-group-item">ID: {{$locacao->cliente->id}}</li>
              <li class="list-group-item">NOME: {{$locacao->cliente->nome}}</li>
              <li class="list-group-item">CPF: {{$locacao->cliente->cpf}}</li>
              <li class="list-group-item">CIDADE: {{$locacao->cliente->cidade}}</li>
              <li class="list-group-item">UF: {{$locacao->cliente->uf}}</li>
            </ul>
          </div>
        </div>
        <div class='modal-footer'>
          <button type='button' class='btn btn-primary' data-bs-dismiss='modal'>Fechar</button>
        </div>
      </div>
    </div>
  </div>

  <div class='modal fade' id='staticBackdropVeiculo{{$locacao->veiculo->id}}' data-bs-backdrop='static' data-bs-keyboard='false' tabindex='-1' aria-labelledby='staticBackdropLabel' aria-hidden='true'>
    <div class='modal-dialog modal-dialog-centered'>
      <div class='modal-content'>
        <div class='modal-header'>
          <h5 class='modal-title' id='staticBackdropLabel'>Dados do veiculo</h5>
          <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
        </div>
        <div class='modal-body text-center d-flex justify-content-center'>
          <div class="card w-full">
            @if ($locacao->veiculo->imagem != "")
            <img src="/storage/imagens/{{$locacao->veiculo->imagem}}" class="card-img-top" alt="...">
            @endif
            <ul class="list-group list-group-flush">
              <li class="list-group-item">ID: {{$locacao->veiculo->id}}</li>
              <li class="list-group-item">MODELO: {{$locacao->veiculo->modelo}}</li>
              <li class="list-group-item">PLACA: {{$locacao->veiculo->placa}}</li>
              <li class="list-group-item">VALOR DIA: {{$locacao->veiculo->valor_dia}}</li>
            </ul>
          </div>
        </div>
        <div class='modal-footer'>
          <button type='button' class='btn btn-primary' data-bs-dismiss='modal'>Fechar</button>
        </div>
      </div>
    </div>
  </div>

  <div class='modal fade' id='staticBackdrop{{$locacao->id}}' data-bs-backdrop='static' data-bs-keyboard='false' tabindex='-1' aria-labelledby='staticBackdropLabel' aria-hidden='true'>
    <div class='modal-dialog modal-dialog-centered'>
      <div class='modal-content'>
        <div class='modal-header'>
          <h5 class='modal-title' id='staticBackdropLabel'>Exclusão de Locação</h5>
          <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
        </div>
        <div class='modal-body text-center'>
          Desejea realmente excluir o locação <span style='font-weight: bold;'>{{$locacao->id}}</span>?
        </div>
        <div class='modal-footer'>
          <button type='button' class='btn btn-primary' data-bs-dismiss='modal'>Cancelar</button>
          <a class='btn btn-danger' href='excluir/{{$locacao->id}}'>Confirmar</a>
        </div>
      </div>
    </div>
  </div>
  @endforeach
</div>
{{ $locacoes->links() }}
@endsection