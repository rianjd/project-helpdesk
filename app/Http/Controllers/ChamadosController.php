<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Mail;
use App\Mail\newChamados;
use App\Mail\newLupa;
use App\Mail\newEnc;
use App\Mail\newErrors;


use App\Mail\newGerentes;
use App\Mail\newGerentesChamados;
use App\Mail\newSolutions;
use App\Mail\newAcomp;
use App\Models\Chamado;
use App\Models\Acompanhamento;
use App\Models\Tkt_Users;
use App\Models\Tkt_Sup;


use App\Models\ChamadoInsert;
use App\Models\Dash;

use App\Models\Login;
use App\Models\Solution;
use App\Rules\EmailValidation;

use Illuminate\Support\Facades\Cookie;
use \Crypt;



class ChamadosController extends Controller

{
    protected $filiais;

    public function __construct(){
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
        $this->emails = array(

            "1"=>"suporte.ti@casasdaagua.com.br",
            "2"=>"gerente.01@casasdaagua.com.br",
            "3"=>"gerente.02@casasdaagua.com.br",
            "4"=>"gerente.03@casasdaagua.com.br",
            "5"=>"gerente.04@casasdaagua.com.br",
            "6"=>"gerente.06@casasdaagua.com.br",
            "7"=>"gerente.08@casasdaagua.com.br",
            "8"=>"gerente.09@casasdaagua.com.br",
            "9"=>"gerente.11@casasdaagua.com.br",
            "10"=>"gerente.12@casasdaagua.com.br",
            "11"=>"gerente.21@casasdaagua.com.br",
            "12"=>"gerente.24@casasdaagua.com.br",
            "13"=>"gerente.26@casasdaagua.com.br",
            "14"=>"gerente.27@casasdaagua.com.br",
            "15"=>"gerente.28@casasdaagua.com.br",
            "16"=>"gerente.29@casasdaagua.com.br",
            "17"=>"gerente.30@casasdaagua.com.br",
            "18"=>"gerente.32@casasdaagua.com.br",
            "19"=>"gerente.34@casasdaagua.com.br",
            "20"=>"gerente.35@casasdaagua.com.br",
            "21"=>"gerente.36@casasdaagua.com.br",
            "22"=>"suporte.ti@casasdaagua.com.br",
            "23"=>"suporte.ti@casasdaagua.com.br",
            "24"=>"suporte.ti@casasdaagua.com.br",
            "25"=>"suporte.ti@casasdaagua.com.br",
            "26"=>"suporte.ti@casasdaagua.com.br",
            "27"=>"suporte.ti@casasdaagua.com.br",
            "28"=>"suporte.ti@casasdaagua.com.br",
            "29"=>"suporte.ti@casasdaagua.com.br",
        );
        $this->nomes  = array(
            '54'=>'Rian','60'=>'Cassio','61'=>'Matheus','59'=>'Pedro','8'=>'Alan','2'=>'Marcio','56'=>'Admin','1'=>'Lupa', '65' => 'Paulo'
        );

    }
    public $data;

    public function index(Request $request){

        return view('home');
    }

    public function store(Request $request){
        /* Função POST para os formularios
        * Coleta dados via Request e coloca em um array = $data
        * Envia os dados por email e grava no banco de dados do GLPI
        * Envia os dados por email e grava no banco de dados do GLPI.
        */

        $emails = $this->emails;
        $filiais = $this->filiais;

        try {
        /** Validar email */
            $validated = $request->validate([
                    'email' => [new EmailValidation()],
            ]);

        /* DADOS REQUEST */
            $data = array();

            foreach ($request->input() as $key => $req){
                $data[$key]= $req;
            }
            if (!isset($data['tipo'])){
                $data['tipo'] = $data['tipo_chamado'];
            }
            if (!isset($data['prioridade'])){
                $data['prioridade'] = 3;
            }
            if (!isset($data['nome_user'])){
                $data['nome_user'] = $data['nome'];
            }

            /** SETOR */
            $data['filiais'] = $filiais[$data['filial']];
            if ($data['filial'] == 1){
                if ($request->input('setor') != ""){
                    if ($data['setor'] == 'RH' or $data['setor'] == 'Crediário' or $data['setor'] == 'Logística' or $data['setor'] == 'Depósito' or $data['setor'] == 'Marketing' or $data['setor'] == 'Financeiro/Contas' or $data['setor'] == 'Contabilidade')
                    $data['filial'] = $filiais[$data['setor']];}
            }

            /** ANEXO */
            $file = $request->file('imagem');
            if ($file != null){
                $extension = $request->file('imagem')->getClientOriginalExtension();
                $filename = $data['filial'].'_'.date('Y-m-d_H_i_s');
                $data['filename'] = $filename.'.'.$extension;
                $upload = $file->storeAs('public/chamado', $data['filename']);
            }


        /* Insere dados no Banco */
            $insert = [
            'name' => 'Filial '.$data['filiais'].' - '.$data['tipo_chamado'].'/'.$data['categoria'],
            'date' => date("Y-m-d H:i:s", strtotime('-3 hour')),
            'date_mod' => date("Y-m-d H:i:s", strtotime('-3 hour')),
            'status'=> 2,
            'content' => explode('crossorigin="anonymous">',view('sender.mail')->with('data',$data))[1],
            'locations_id' => $data['filial'],
            'date_creation'=> date("Y-m-d H:i:s", strtotime('-3 hour')),
            'users_id_recipient' => 56,
            'priority' => $data['prioridade'],
            'impact'=> $data['prioridade'],
            'urgency'=> $data['prioridade'],
            'email'=>$data['email'],
            'name_req'=>$data['nome_user'],
            'setor_req'=>$data['setor'],


            ];


            ChamadoInsert::create($insert);

            $id = Chamado::orderBy('id', 'desc')->first();
            $data['id'] = $id['id'];


        /* Envia Os emails */
            if ($data['tipo_chamado'] != $data['tipo']){
                // Mail::to('rian.ti@casasdaagua.com.br')
                //         ->cc('rian.ti@casasdaagua.com.br')
                //         ->send(new newGerentes($data));
                Mail::to($emails[$data['filial']])
                        ->bcc('suporte.ti@casasdaagua.com.br')
                        ->send(new newGerentes($data));
            }
            else{
                // Mail::to('rian.ti@casasdaagua.com.br')
                //         ->cc('rian.ti@casasdaagua.com.br')
                //         ->send(new newGerentesChamados($data));
                Mail::to($emails[$data['filial']])
                        ->bcc('suporte.ti@casasdaagua.com.br')
                        ->send(new newGerentesChamados($data));
            }


        /* Retorna com sucesso ao finalizar tudo */
            return back()
                ->with('success', 'Solicitação enviada com sucesso!');
        }
        catch(\Exception $e){
            $data['e'] = $e->getMessage();
            $data['caminho'] = 'App/Http/Controllers/ChamadosController\store()';
            $data['sub'] = 'LOG - Erro na abertura de chamado';
            Mail::to('suporte.ti@casasdaagua.com.br')
                ->bcc('rian.ti@casasdaagua.com.br')
                ->send(new newErrors($data));

            return back()->with('error', 'Erro!');

        }


    }

    public function login(Request $request ,$filtro = null, $id = 'date_creation', $order = 'desc'){

        $tec = $this->nomes;
        $tkt = Tkt_Users::all();
        $sup = Tkt_Sup::all();
        $daily_chamado = Chamado::where('users_id_recipient', 56)->get();
        $acomp=  Acompanhamento::orderBy('date_mod', 'desc')->get();

        /** Checa se esta logado como admin*/
        if (Auth::check()) {
                if (Auth::user()->locations_id == 0){
                    $chamados = Chamado::orderBy('date_creation', 'desc')->where('status','<=',4)->where('users_id_recipient', 56)->get();
                    return view('admin', compact('chamados','acomp','tkt','tec','sup', 'daily_chamado'));
                }

                $chamados = Chamado::orderBy('date_creation', 'desc')->where('locations_id', Auth::user()->locations_id)->get();
                return view('acompanhamento', compact('chamados','acomp','tec','sup'));
        }
        else    {
            return view('login');
        }
    }

    public function restore(Request $request){
        $solution =  Chamado::find($request['id']);
        $solution -> status = 4;
        $solution -> save();

        return back()->with('success',$request['id']);

    }

    public function dashboard(){
        //** SOLUCIONADOS */

        $tec = $this->nomes;

        $solution =  Solution::where('date_creation', '>', date('Y-m-d H:i:s', strtotime('-3 days')))->get();

        $chamados =  Chamado::orderBy('date_mod', 'desc')->where('date_mod', '>=', date('Y-m-d H:i:s', strtotime('-3 days')))->where('status', 5)->get();
        if (Auth::check() and Auth::user()->comment != null){
            return view('solucionados', compact('chamados', 'solution' ,'tec'));
        }
        else{
            return back();
        }

    }

    public function acompadmin(Request $request){
        try{

            $request['msg'] = preg_replace("/\r\n|\r|\n/", '<br/>', $request['msg']);

            $emails = $this->emails;

            $chamados = Chamado::all();

            $data = [
                'id' => $request['id'],
                'nome'=> Auth::user()->name,
                'msg' => $request['msg'],
                'email'=> $request['email'],
                'cc' => $request['copia'],
                'time' => date("d/m/Y", strtotime('-3 hour')),
            ];

            $insert = [
                'itemtype'=>'Ticket',
                'content' => $request['msg'],
                'items_id'=>$request['id'],
                'date'=>date("Y-m-d H:i:s", strtotime('-3 hour')),
                'date_creation'=> date("Y-m-d H:i:s", strtotime('-3 hour')),
                'date_mod'=> date("Y-m-d H:i:s", strtotime('-3 hour')),
                'users_id'=>Auth::user()->comment,
                'status'=>1
            ];


            ////////////////////////SOLUÇÃO///////////////////////////

                if ($request['tipo_acomp']== 'solucao'){


                    foreach ($chamados as $chamado){
                        if ($chamado['id']== $request['id']){
                            $content = explode('Observações', $chamado['content'])[1] ?? null;
                            if (strpos($content,'&lt;')){
                                $data['content'] = '<div><div><div><div><strong>Chamado '.html_entity_decode($content) ;
                            }
                            else{
                                $data['content'] =  '<div><div><div><div><p><strong>Chamado '.$content;
                            }
                            $data['date_creation'] = $chamado['date_creation'];
                            $data['title']=$chamado['name'];
                            $data['imagem'] = $request->file('imagem');
                            Mail::to($data['email'])->cc($emails[$chamado['locations_id']])->cc($data['cc'])->bcc('suporte.ti@casasdaagua.com.br')->send(new newSolutions($data));
                            //Mail::to($data['email'])->cc($data['cc'])->send(new newSolutions($data));

                        }
                    }

                    Solution::create($insert);

                    $add_status = ChamadoInsert::find($request['id']);
                    $add_status->date_mod = date("Y-m-d H:i:s", strtotime('-3 hours'));
                    $add_status->status = 5;
                    $add_status->save();

                    return back()->with('success', $data['id']);

                }



            /////////////////////ACOMPANHAMENTO///////////////////////
                elseif ($request['tipo_acomp']== 'acompanhamento'){

                    /** Foreach (Olha todos os rolls da tabela vinculada a variavel $chamados) */
                    foreach ($chamados as $chamado){
                        if ($chamado['id'] == $request['id']){
                            $content = explode('Observações', $chamado['content'])[1] ?? null;
                            if (strpos($content,'&lt;')){
                                $data['content'] = '<div><div><div><div><strong>Chamado '.html_entity_decode($content) ;
                            }
                            else{
                                $data['content'] =  '<div><div><div><div><p><strong>Chamado '.$content;
                            }
                            $data['date_creation'] = $chamado['date_creation'];
                            $data['title']=$chamado['name'];
                            $data['imagem'] = $request->file('imagem');
                            //Mail::to($chamado['email'])->cc('rian.ti@casasdaagua.com.br')->send(new newAcomp($data));
                            Mail::to($data['email'])->cc($emails[$chamado['locations_id']])->cc($data['cc'])->bcc('suporte.ti@casasdaagua.com.br')->send(new newAcomp($data));

                            /** Retorna com sucesso */
                        }
                    }

                    Acompanhamento::create($insert);

                    $find = Tkt_Users::all()->where('tickets_id', $request['id']);
                    if(count($find) == 0){
                            Tkt_Users::create(array(
                                    'tickets_id'=>$request['id'],
                                    'users_id'=>$insert['users_id'],
                                    'type'=>2,
                                    'use_notification'=>0,

                            ));
                    }
                    else{
                        Tkt_Users::where('tickets_id', $request['id'])->update(['users_id'=> $insert['users_id']]);
                    }

                    $flight = ChamadoInsert::find($request['id']);
                    $flight->date_mod = date("Y-m-d H:i:s", strtotime('-3 hours'));
                    if ($request['time_to_resolve'] != null){
                        if ($flight->status != 3){
                            $flight->status = 3;
                            $flight->time_to_resolve = date('Y-m-d 12:00:00',strtotime($request['time_to_resolve']));
                        }
                    }else{
                        if ($flight->status != 4){
                            $flight->status = 4;
                        }
                    }

                    $flight->save();

                    return back()
                        ->with('success', $data['id']);

                }

            /////////////////////////LUPA/////////////////////////////
                elseif ($request['tipo_acomp']== 'lupa'){

                    $insert['content'] = $request['complemento'];
                    $insert['status'] = 2;

                    $data = [
                        'complemento' => $request['complemento'],
                        'id' => $request['id'] ,
                        'nome'=> Auth::user()->name,
                    ];

                    $data['imagem'] = $request->file('imagem');

                    foreach ($chamados as $chamado){
                        if ($data['id']== $chamado['id']){
                            $data['content'] = $chamado['content'];
                            $data['name'] = $chamado['name'];
                            Mail::to('atendimento@lupainformatica.com.br')->cc('suporte.ti@casasdaagua.com.br')->send(new newLupa($data));
                            //Mail::to('rian.ti@casasdaagua.com.br')->cc('rian.ti@casasdaagua.com.br')->send(new newLupa($data));

                        }
                    }

                    Acompanhamento::create($insert);

                    $find0 = Tkt_Sup::all()->where('tickets_id', $request['id']);
                    if(count($find0) == 0){
                            Tkt_Sup::create(array(
                                    'tickets_id'=>$request['id'],
                                    'suppliers_id'=>1,
                                    'type'=>2,
                                    'use_notification'=>0,

                            ));
                    }


                    $flight = ChamadoInsert::find($request['id']);
                    $flight->date_mod = date("Y-m-d H:i:s", strtotime('-3 hours'));
                    if ($flight->status != 3){
                        $flight->status = 3;

                    }
                    $flight->save();

                    /** Retorna com sucesso */
                    return back()->with('success', $data['id']);

                }


            //////////////////////ENCAMINHAR//////////////////////////

                elseif ($request['tipo_acomp']== 'encaminhar'){

                    $request['complemento'] = preg_replace("/\r\n|\r|\n/", '<br/>', $request['complemento']);

                    $data = [
                        'complemento' => $request['complemento'],
                        'id' => $request['id'] ,
                        'nome'=> Auth::user()->name
                    ];

                    foreach ($chamados as $chamado){
                        if ($data['id']== $chamado['id']){
                            $data['content'] = $chamado['content'];
                            $data['name'] = $chamado['name'];
                            Mail::to($request['email'])->cc($request['copia'])->bcc('suporte.ti@casasdaagua.com.br')->send(new newEnc($data));

                        }
                    }


                    /** Retorna com sucesso */
                    return back()->with('success', $data['id']);


                }
            ////////////////////////AGENDA////////////////////////////


            elseif ($request['tipo_acomp']== 'agenda'){


                $flight = ChamadoInsert::find($request['id']);
                $flight->date_mod = date("Y-m-d H:i:s", strtotime('-3 hours'));
                if ($request['time_to_resolve'] != null){
                        $flight->status = 3;
                        $flight->time_to_resolve = date('Y-m-d 12:00:00',strtotime($request['time_to_resolve']));

                }

                $flight->save();


                /** Retorna com sucesso */
                return back()
                    ->with('success', $data['id']);



            }

        }
        catch(\Exception $e){
            $data['e'] = $e->getMessage();
            $data['caminho'] = 'App/Http/Controllers/ChamadosController\acompadmin()';
            $data['sub'] = 'LOG - Erro admin chamados [2]';
            Mail::to('suporte.ti@casasdaagua.com.br')
                ->bcc('rian.ti@casasdaagua.com.br')
                ->send(new newErrors($data));
            return back()
                ->with('error', "Erro!");

        }

    }

    public function interno(Request $request){
        $filiais = $this->filiais;
        $insert = [
            'name' => 'Filial '.$filiais[$request['filial']].' - TI / Chamado Interno',
            'date' => date("Y-m-d H:i:s", strtotime('-3 hour')),
            'date_mod' => date("Y-m-d H:i:s", strtotime('-3 hour')),
            'status'=> 2,
            'content' => $request['categoria'].' - '.$request['setor'].'<br><br>'.$request['msg'],
            'locations_id' => $request['filial'],
            'date_creation'=> date("Y-m-d H:i:s", strtotime('-3 hour')),
            'users_id_recipient' => Auth::user()->comment,
            'time_to_resolve' => $request['time_to_resolve'],
            'priority' => $request['prioridade'],
            'impact'=> $request['prioridade'],
            'urgency'=> $request['prioridade'],
         ];

         ChamadoInsert::create($insert);
         return back()->with('success','success');
    }

    public function lupa(Request $request){
        $user = 'teste';
        dd($request->input());
        return back();
    }


}
