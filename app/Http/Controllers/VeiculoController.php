<?php

namespace App\Http\Controllers;

use App\Http\Requests\VeiculoRequest;
use App\Models\Categoria;
use App\Models\Veiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VeiculoController extends Controller
{
    function listar(Request $request)
    {
        $filters = $request->pesquisa;
        $status = $request->status;
        $veiculos = Veiculo::join('categoria', 'veiculo.categoria_id', '=', 'categoria.id')
            ->where('veiculo.status', '=', $status)
            ->whereRaw('LOWER(categoria.descricao) LIKE LOWER(?)', ["%{$request->pesquisa}%"])
            ->orWhereRaw('LOWER(modelo) LIKE LOWER(?)', ["%{$request->pesquisa}%"])
            ->orWhereRaw('LOWER(placa) LIKE LOWER(?)', ["%{$request->pesquisa}%"])
            ->select('veiculo.*')
            ->orderByRaw('veiculo.id')
            ->simplePaginate(5);
        return view(
            'listagemVeiculos',
            compact('veiculos', 'filters', 'status')
        );
    }

    function novo()
    {
        $veiculo = new Veiculo();
        $veiculo->id = 0;
        $veiculo->data = now();
        $categorias = Categoria::orderBy('descricao')->get();
        return view('frmVeiculo', compact('veiculo', 'categorias'));
    }

    function salvar(VeiculoRequest $request)
    {

        if ($request->input('id') == 0) {
            $veiculo = new Veiculo();
        } else {
            $veiculo = Veiculo::find($request->input('id'));
        }
        if ($request->hasFile('arquivo')) {
            $file = $request->file('arquivo');
            $upload = $file->store('public/imagens');
            $upload = explode("/", $upload);
            $tamanho = sizeof($upload);
            if ($veiculo->imagem != "") {
                Storage::delete("public/imagens/" . $veiculo->imagem);
            }
            $veiculo->imagem = $upload[$tamanho - 1];
        }

        $veiculo->modelo = $request->input('modelo');
        $veiculo->marca = $request->input('marca');
        $veiculo->valor_dia = $request->input('valor_dia');
        $veiculo->placa = $request->input('placa');
        $veiculo->ano = $request->input('ano');
        $veiculo->categoria_id = $request->input('categoria_id');
        $veiculo->save();
        return redirect('veiculo/listar')
            ->with(['msg' => "Veículo $veiculo->modelo foi salvo"]);
    }

    function editar($id)
    {
        $veiculo = Veiculo::find($id);
        $categorias = Categoria::orderBy('descricao')->get();
        return view('frmVeiculo', compact('veiculo', 'categorias'));
    }

    function excluir($id)
    {
        $veiculo = Veiculo::find($id);
        $modelo = $veiculo->modelo;
        if ($veiculo->imagem != "") {
            Storage::delete("public/imagens/" . $veiculo->imagem);
        }

        $veiculo->delete();

        return redirect('veiculo/listar')
            ->with(['msg' => "Veículo $modelo foi excluído"]);
    }
}
