<?php

namespace App\Http\Controllers;

use App\Http\Requests\LocacaoRequest;
use App\Mail\AutorMensagem;
use App\Mail\LocacaoMail;
use App\Models\Cliente;
use App\Models\Locacao;
use App\Models\Veiculo;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LocacaoController extends Controller
{
    function listar(Request $request)
    {
        $filters = $request->pesquisa;
        $status = $request->status;
        $locacoes = Locacao::join('veiculo', 'locacao.veiculo_id', '=', 'veiculo.id')
            ->join('cliente', 'locacao.cliente_id', '=', 'cliente.id')
            ->orWhere('locacao.status', $status)
            ->orWhereRaw('LOWER(veiculo.modelo) LIKE LOWER(?)', ["%{$request->pesquisa}%"])
            ->orWhereRaw('LOWER(veiculo.placa) LIKE LOWER(?)', ["%{$request->pesquisa}%"])
            ->orWhereRaw('LOWER(cliente.nome) LIKE LOWER(?)', ["%{$request->pesquisa}%"])
            ->orWhere('cliente.cpf', 'LIKE', "%{$request->pesquisa}%")
            ->select('locacao.*')
            ->orderByRaw('locacao.id')
            ->simplePaginate(5);
        return view(
            'listagemLocacao',
            compact('locacoes', 'filters', 'status')
        );
    }

    function novo()
    {
        $locacao = new Locacao();
        $locacao->id = 0;
        $locacao->data = now();
        $clientes = Cliente::orderBy('id')->get();
        $veiculos = Veiculo::where('status', '<>', 1)->orderBy('id')->get();
        return view('frmLocacao', compact('locacao', 'clientes', 'veiculos'));
    }

    function salvar(LocacaoRequest $request)
    {
        $veiculo = Veiculo::find($request->input('veiculo_id'));
        $cliente = Cliente::find($request->input('cliente_id'));
        if ($request->input('id') == 0) {
            $locacao = new Locacao();
        } else {
            $locacao = Locacao::find($request->input('id'));
            if ($request->input('veiculo_id') != $locacao->veiculo_id) {
                $veiculoAlt = Veiculo::find($locacao->veiculo_id);
                $veiculoAlt->status = 0;
                $veiculoAlt->save();
            }
        }


        if ($request->input('status') == 1) {
            $veiculo->status = 1;
        } else {
            $veiculo->status = 0;
        }

        $diferencaData = strtotime($request->input('data_entrega')) - strtotime($request->input('data_locacao'));
        $locacaoDias = floor($diferencaData / (60 * 60 * 24));

        $locacao->data_locacao = $request->input('data_locacao');
        $locacao->data_entrega = $request->input('data_entrega');
        $locacao->status = $request->input('status');
        $locacao->veiculo_id = $request->input('veiculo_id');
        $locacao->cliente_id = $request->input('cliente_id');
        $locacao->dias = $locacaoDias;
        $locacao->save();
        $veiculo->save();

        $status = $request->input('status') == '1' ? 'Aberta' : 'Fechada';
        $message = 'VEÍCULO: ' . $veiculo->modelo
            . ' - PLACA: ' . $veiculo->placa
            . ' - DATA DE SAÍDA: ' . $request->input('data_locacao')
            . ' - DATA DE ENTREGA: ' . $request->input('data_entrega')
            . ' - DIAS LOCADOS: ' . $locacaoDias
            . ' - VALOR DA DIÁRIA: ' . $veiculo->valor_dia
            . ' - VALOR TOTAL: R$' . $locacaoDias * $veiculo->valor_dia
            . ' - STATUS: ' . $status;
        $user = auth()->user();
        $send = Mail::to(users: $cliente->email, name: $user->name)->send(new LocacaoMail(
            [
                'fromName' => $cliente->nome,
                'fromEmail' => $cliente->email,
                'subject' => 'Locação',
                'fromUser' => $user->name,
                'message' => $message
            ]
        ));

        return redirect('locacao/listar')
            ->with(['msg' => "A locação foi salva, verifique os dados no email " . $cliente->email]);
    }

    function editar($id)
    {
        $locacao = Locacao::find($id);
        $clientes = Cliente::orderBy('id')->get();
        $veiculos = Veiculo::orderBy('id')->get();

        return view('frmLocacao', compact('locacao', 'clientes', 'veiculos'));
    }

    function excluir($id)
    {
        $locacao = Locacao::find($id);
        $veiculo = Veiculo::find($locacao->veiculo_id);

        if ($locacao->status != 2) {
            $veiculo->status = 0;
            $veiculo->save();
        }

        $locacao->delete();

        return redirect('locacao/listar')
            ->with(['msg' => "Locação $id foi excluída"]);
    }

    function relatorio()
    {
        $locacoes = Locacao::orderBy('status')->get();
        $pdf = Pdf::loadView('relatorioLocacao', compact('locacoes'));
        return $pdf->download('locacao.pdf');
    }
}
