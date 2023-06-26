<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteRequest;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClienteController extends Controller
{
  function listar(Request $request)
  {
    $filters = $request->pesquisa;
    $clientes = Cliente::whereRaw('LOWER(nome) LIKE LOWER(?)', ["%{$request->pesquisa}%"])
      ->orWhere('cpf', 'LIKE', "%{$request->pesquisa}%")
      ->whereRaw('LOWER(email) LIKE LOWER(?)', ["%{$request->pesquisa}%"])
      ->orderByRaw('nome')
      ->simplePaginate(5);
    return view(
      'listagemCliente',
      compact('clientes', 'filters')
    );
  }

  function novo()
  {
    $cliente = new Cliente();
    $cliente->id = 0;
    return view('frmCliente', compact('cliente'));
  }

  function editar($id)
  {
    $cliente = Cliente::find($id);
    return view('frmCliente', compact('cliente'));
  }

  function salvar(ClienteRequest $request)
  {
    if ($request->input('id') == 0) {
      $cliente = new Cliente();
    } else {
      $cliente = Cliente::find($request->input('id'));
    }
    if ($request->hasFile('arquivo')) {
      $file = $request->file('arquivo');
      $upload = $file->store('public/imagens');
      $upload = explode("/", $upload);
      $tamanho = sizeof($upload);
      if ($cliente->imagem != "") {
        Storage::delete("public/imagens/" . $cliente->imagem);
      }
      $cliente->imagem = $upload[$tamanho - 1];
    }

    $cliente->nome = $request->input('nome');
    $cliente->telefone = $request->input('telefone');
    $cliente->cpf = $request->input('cpf');
    $cliente->cep = $request->input('cep');
    $cliente->logradouro = $request->input('logradouro');
    $cliente->bairro = $request->input('bairro');
    $cliente->numero = $request->input('numero');
    $cliente->cidade = $request->input('cidade');
    $cliente->uf = $request->input('uf');
    $cliente->email = $request->input('email');

    $clienteExiste = Cliente::where('cpf', $request->input('cpf'))->orWhere('email', $request->input('email'))->orWhere('telefone', $request->input('telefone'))->first();
    if ($request->input('id') == 0 && $clienteExiste) {
      return redirect('cliente/listar')->with(['msg' => "Os dados informados já pertence a outro cliente"]);
    }

    $cliente->save();
    return redirect('cliente/listar')->with(['msg' => "O cliente " . $cliente->nome . " foi salvo"]);
  }




  function excluir($id)
  {
    $cliente = Cliente::find($id);
    if ($cliente->imagem != "") {
      Storage::delete("public/imagens/" . $cliente->imagem);
    }
    $cliente->delete();
    return redirect('cliente/listar')->with(['msg' => 'Cliente removido com sucesso']);
  }
}
