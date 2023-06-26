<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name=viewport content="width=device-width, initial-scale=1">
  <title></title>
  <style>
    * {
      font-family: arial, sans-serif;
    }

    h1 {
      text-align: center;
    }

    table {
      width: 100%;
      margin: 0 auto;
      border-collapse: collapse;
    }

    th,
    td {
      border: solid 1px gray;
      padding: 0.5rem;
      text-align: center;
    }
    .img-pdf{
      width: 60px;
      border-radius: 5px;
    }
  </style>
</head>

<body>
  <h1>Relatório de Locações</h1>
  <table>
    <thead>
      <tr>
        <th>Cliente</th>
        <th>CPF</th>
        <th>Veículo</th>
        <th>Locação</th>
        <th>Entrega</th>
        <th>Dias</th>
        <th>Total</th>
        <th>Status</th>
        <th>IMG</th>
      </tr>
    </thead>
    <tbody>
      @foreach($locacoes as $locacao)
      <tr>
        <td>{{$locacao->cliente->nome}}</td>
        <td>{{$locacao->cliente->cpf}}</td>
        <td>{{$locacao->veiculo->modelo}}</td>
        <td>{{$locacao->data_locacao}}</td>
        <td>{{$locacao->data_entrega}}</td>
        <td>{{$locacao->dias}}</td>
        <td>R$ {{$locacao->dias * $locacao->veiculo->valor_dia}}</td>
        <td>{{$locacao->status == 1 ? 'aberta' : 'fechada'}}</td>
        <td>
          <img class="img-pdf" src="{{public_path()}}/storage/imagens/{{$locacao->veiculo->imagem}}" alt="" srcset="">
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</body>

</html>