<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\bRelatorio;
use App\Models\EstoqueLog;
use App\Models\Estoque;
use Illuminate\Support\Facades\Auth;


class EstoqueController extends Controller
{
    public function __construct(){
        $this->nomes = array('54'=>'Rian','60'=>'Cassio','61'=>'Matheus','8'=>'Alan','2'=>'Admin','56'=>'Suporte TI','1'=>'Lupa', '65' => 'Paulo');
        $this->nomes_ = array_flip($this->nomes);
        $this->filiais = array(

            "1"=>"99 - Matriz",
            "2"=>"01 - Joinville",
            "3"=>"02 - Biguaçu",
            "4"=>"03 - Palhoça",
            "5"=>"04 - Itajaí",
            "6"=>"06 - Balneario",
            "7"=>"08 - Centro",
            "8"=>"09 - Trindade",
            "9"=>"11 - Joinville(America)",
            "10"=>"12 - Blumenau",
            "11"=>"21 - Estreito",
            "12"=>"24 - Rio do Sul",
            "13"=>"26 - Itapema",
            "14"=>"27 - Jaraguá",
            "15"=>"28 - Blumenau",
            "16"=>"29 - Tijucas",
            "17"=>"30 - Brusque",
            "18"=>"32 - Vargem Grande",
            "19"=>"34 - Porto Belo",
            "20"=>"35 - Campeche",
            "21"=>"36 - Itajaí",
            "RH" => "22",
            "Crediário" => "23",
            "Depósito" => "24",
            "Logística" => "24",
            "Marketing" => "25",
            "Contabilidade" => "26",
            "Vendas Online" => "27",
            "Financeiro/Contas" => "28",
            "Compras" => "29",
        );
    }

    public function adminEstoque(Request $request){
        /* Nomeia os models */
        $nomes = $this->nomes;
        $estoque =  Estoque::all();
        $estoqueLog =  EstoqueLog::all();

        return view('admin.estoque', compact('estoque','estoqueLog', 'nomes'));

    }
    public function inclui(Request $request){
        //dd($request['nome']);
        $estoque_insert = [
            'item_material' => $request['nome'].' - '.$request['marca'],
            'quantidade'=> $request['quant'],
            'ultima_att'=> date("Y-m-d H:i:s", strtotime('-3 hour')),
        ];
        EstoqueLog::create([
            'item_material' => $request['nome'].' - '.$request['marca'],
            'complemento'  => 'NOVO ITEM ADICIONADO',
            'data'  => date("Y-m-d", strtotime('-3 hour')),
            'quantidade'  => $request['quant'],
            'tipo'  => 'NEW',
            'user_mod'  => Auth::user()->comment
        ]);

        Estoque::create($estoque_insert);

        return back()->with('success','success');
    }

    public function edita(Request $request){
        $item = Estoque::find($request['id']);

        if ($request['nome'] != $item -> item_material) $item -> item_material = $request['nome'];
        if ($request['quant'] != $item -> quantidade) {
            if ($request['quant'] < $item->quantidade){
                $tipo = 'OUT';
            }else{ $tipo = 'IN';}
            EstoqueLog::create([
                'item_material' => $request['nome'],
                'filial' => $request['filial'],
                'setor' => $request['setor'],
                'complemento'  => $request['complemento'],
                'data'  => date("Y-m-d H:i:s", strtotime('-3 hour')),
                'quantidade'  => $request['quant'] - $item->quantidade,
                'tipo'  => $tipo,
                'user_mod'  => $request['user']
            ]);
            $item -> quantidade = $request['quant'];
        }
        $item -> ultima_att = date("Y-m-d H:i:s", strtotime('-3 hour'));
        $item -> save();

        return back()->with('success','success');
    }

    public function baixar_relatorio(Request $request){
        $nomes = $this->nomes;
        $filiais = $this->filiais;

        $estoque =  Estoque::all();
        $estoqueLog =  EstoqueLog::whereMonth('data', date('m'))->get();

        return view('admin.modal.relatorios.'.$request['tipo'], compact('nomes','estoque', 'estoqueLog','filiais'));
    }

    public function enviar_relatorio(Request $request)
    {
        $data = array();
        foreach ($request->input() as $key => $d){
            if ($key != '_token'){
                array_push($data, $d);
            }
        }

        // return view('sender.relatorio_estoque',compact('data'));
        Mail::to("suporte.ti@casasdaagua.com.br")
                        ->send(new bRelatorio($data));

        return back()->with('success','success');

    }

}
