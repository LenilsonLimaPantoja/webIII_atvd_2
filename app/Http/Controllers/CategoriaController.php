<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoriaRequest;
use App\Models\Categoria;
use App\Models\Veiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoriaController extends Controller
{
  //
  function listar(Request $request)
  {
    $filters = $request->pesquisa;
    $categorias = Categoria::whereRaw('LOWER(descricao) LIKE LOWER(?)', ["%{$request->pesquisa}%"])
      ->orderByRaw('descricao')
      ->simplePaginate(5);
    return view(
      'listagemCategoria',
      compact('categorias', 'filters')
    );
  }

  function novo()
  {
    $categoria = new Categoria();
    $categoria->id = 0;
    $categoria->descricao = "";
    return view('frmCategoria', compact('categoria'));
  }

  function salvar(CategoriaRequest $request)
  {
    if ($request->input('id') == 0) {
      $categoria = new Categoria();
    } else {
      $categoria = Categoria::find($request->input('id'));
    }

    $categoria->descricao = $request->input('descricao');
    $categoria->save();
    return redirect('categoria/listar')->with(['msg' => 'Categoria salva com sucesso']);
  }

  function editar($id)
  {
    $categoria = Categoria::find($id);
    return view('frmCategoria', compact('categoria'));
  }

  function excluir($id)
  {
    $categoria = Categoria::find($id);
    $veiculos = Veiculo::where('categoria_id', '=', $id)->get();

    try {
      foreach ($veiculos as $veiculo) {
        if ($veiculo->imagem != "") {
          Storage::delete("public/imagens/" . $veiculo->imagem);
        }
      }
      $categoria->delete();
      $veiculo->delete();
    } catch (\Exception $e) {
      return redirect('categoria/listar')->with(['msg' => 'Categoria não pode ser excluída']);
    }
    return redirect('categoria/listar')->with(['msg' => 'Categoria excluída']);
  }
}
