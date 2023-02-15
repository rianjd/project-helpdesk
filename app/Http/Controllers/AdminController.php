<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Mail;
use App\Mail\bRelatorio;
use App\Mail\newSolutions;
use App\Mail\newErrors;


use App\Models\Chamado;
use App\Models\ChamadoInsert;

use App\Models\Acompanhamento;
use App\Models\Estoque;
use App\Models\Task;
use App\Models\Doc;


use App\Models\Tkt_Users;
use App\Models\Tkt_Sup;
use App\Models\Dash;
use App\Models\Login;
use App\Models\Solution;
use App\Models\Sabados;
use App\Models\PC;
use App\Models\PcTv;
use App\Models\PcFi;
use Log;



use Illuminate\Support\Facades\Cookie;
use \Crypt;

class AdminController extends Controller
{
    public function __construct(){
        $this->nomes = array('54'=>'Rian','60'=>'Cassio','61'=>'Matheus','8'=>'Alan','2'=>'Admin','56'=>'Suporte TI','1'=>'Lupa', '65' => 'Paulo');
        $this->nomes_ = array_flip($this->nomes);
        $this->total = array(
            'Total'=>0,
            'Total_portal'=>0,
            'Total_glpi'=>0,
            'Total_tec'=>0);
        $this->tipo_chamado = [
                'Core'=>0,
                'Computador'=>0,
                'Internet'=>0,
                'Infra'=>0,
                'Telefonia'=>0,
                'Impressora'=>0,
                'Scanner' =>0,
                'Aplicativos' =>0,
                'Sistema' =>0,
                'Equipamento' =>0,
                'Acesso' =>0,
                'Material' =>0,
                'Email' =>0,
                'Assinatura' =>0,
                'Chat' =>0 ];
        $this->filiais = array(

            "1"=>"00",
            "2"=>"01",
            "3"=>"02",
            "4"=>"03",
            "5"=>"04",
            "6"=>"06",
            "7"=>"08",
            "8"=>"09",
            "9"=>"11",
            "10"=>"12",
            "11"=>"21",
            "12"=>"24",
            "13"=>"26",
            "14"=>"27",
            "15"=>"28",
            "16"=>"29",
            "17"=>"30",
            "18"=>"32",
            "19"=>"34",
            "20"=>"35",
            "21"=>"36",
            "22" => "",
            "23" => "23",
            "24" => "24",
            "24" => "24",
            "25" => "",
            "26" => "",
            "27" => "",
            "28" => "",
            "29" => "",
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
    }


    public function painel(Request $request){
        $tec = $this->nomes;
        $total = $this->total;
        $tipo_chamado = $this->tipo_chamado;

        $filial = array();
        $filial_tot = array();
        foreach (range(0,28) as $numero){
            $filial[$numero] = 0;
            $filial_tot[$numero] = 0;
        }

        ksort($filial);

        $dash_db = Dash::all();
        $dash = Chamado::whereYear('date_creation', date("Y"))->where('status' ,'!=', 6);
        $dash_y = $dash->get();
        $dash_m = $dash->whereMonth('date_creation', date("m"))->get();
        $solution = Chamado::join('glpi_itilsolutions','glpi_tickets.id','=','glpi_itilsolutions.items_id')
                            ->whereMonth('glpi_tickets.date_creation', date("m"))
                            ->whereYear('glpi_tickets.date_creation', date("Y"))
                            ->where('glpi_tickets.status' ,'!=', 6)
                            ->get();


        foreach ($dash_m as $dashborad){

            /** GRAFICO MENSAL */
            $total['Total'] += 1;
            $filial[$dashborad['locations_id']] +=1;
            /** WEB  */
            if($dashborad['users_id_recipient'] == 56){
                $total['Total_portal'] += 1;
            }
                /** GLPI  */
            else{
                $total['Total_glpi'] +=1;
            }
        }
        /** GRAFICO SOLUTION */
        foreach ($solution as $solu){
            $total['Total_tec'] += 1;
        }
        krsort($tipo_chamado);



        $tkt = Tkt_Users::all();
        $sup = Tkt_Sup::all();
        $daily_chamado = Chamado::all();
        $chamados = Chamado::orderBy('date_creation', 'desc')->where('status', '<=', 4)->get();

        if (!isset($request['filtro'])){
            return view('admin.painel', ['chamados' => $chamados])->with(['tkt' => $tkt])->with('tec',$tec)->with('sup',$sup)->with('daily_chamado', $daily_chamado)->with('filial',$filial)
                ->with('total',$total)
                ->with('tipo_chamado',$tipo_chamado);
        }
        return view('admin.painel-page', ['chamados' => $chamados])->with(['tkt' => $tkt])->with('tec',$tec)->with('sup',$sup)->with('daily_chamado', $daily_chamado)->with('filial',$filial)
                ->with('total',$total)
                ->with('tipo_chamado',$tipo_chamado);

    }

    public function adminDashboard($chave = null, Request $request){
            $total = $this->total;
            $tipo_chamado = $this->tipo_chamado;

            $filial = array();
            $filial_tot = array();

            $tec = array('Total'=>0,'54'=>'Rian','60'=>'Cassio','61'=>'Matheus','8'=>'Alan','2'=>'Admin','56'=>'Suporte TI','65' => 'Paulo');
            $tec_count = array('54'=>0,'60'=>0,'61'=>0,'8'=>0,'2'=>0,'56'=>0, '65' => 0);
            $tec_count_tot = array('54'=>0,'60'=>0,'61'=>0,'8'=>0,'2'=>0,'56'=>0, '65' => 0);

            foreach (range(0,28) as $numero){
                $filial[$numero] = 0;
                $filial_tot[$numero] = 0;
            }

            ksort($filial);


            $total_mes = array();
            foreach (range(1,12) as $numer0){
                $total_mes[$numer0] = 0;
            }

            $dash_db = Dash::all();
            $dash = Chamado::whereYear('date_creation', date("Y"))->where('status' ,'!=', 6);
            $dash_y = $dash->get();
            $dash_m = $dash->whereMonth('date_creation', date("m"))->get();
            $solution = Chamado::join('glpi_itilsolutions','glpi_tickets.id','=','glpi_itilsolutions.items_id')
                                ->whereMonth('glpi_tickets.date_creation', date("m"))
                                ->whereYear('glpi_tickets.date_creation', date("Y"))
                                ->where('glpi_tickets.status' ,'!=', 6)
                                ->get();

            // foreach ($dash as $dashborad){
            //     if (date("20y-m", strtotime($dashborad['date_creation'])) == date("2022-09") and $dashborad['status'] == 5 and $dashborad['users_id_recipient'] == 56 ){
            //         if (strpos($dashborad['content'],'teste') or strpos($dashborad['content'],'rian.ti') or strpos($dashborad['content'],'aaa@a') or strpos($dashborad['content'],'rianjunckes') or strpos($dashborad['content'],'Junckes')){
            //             $test[$dashborad['id']] = 'sim';
            //             // $muda = Chamado::find($dashborad['id']);
            //             // $muda -> status = 6;
            //             // $muda -> save();
            //         }

            //     }

            // }
            // dd($test);



            foreach ($dash_m as $dashborad){

                /** GRAFICO MENSAL */
                $total['Total'] += 1;
                $filial[$dashborad['locations_id']] +=1;

                /** glpi ou web  */

                /** WEB  */
                if($dashborad['users_id_recipient'] == 56){

                        /** categoria */
                        foreach ($tipo_chamado as $key => $tipo) {
                            if (strpos($dashborad['name'],$key)){
                                $tipo_chamado[$key] += 1;
                            }

                        }
                        $total['Total_portal'] += 1;

                }
                    /** GLPI  */
                else{
                        $total['Total_glpi'] +=1;
                }
            }
            foreach ($dash_y as $dashborad){
                /** GRAFICO ANUAL */
                foreach (range(1,12) as $numero){
                    if(date("m", strtotime($dashborad['date_creation'])) == $numero and $dashborad['status'] != 6){
                        $total_mes[$numero] += 1;
                    }
                }

                foreach ($total_mes as $key => $tot){
                    if ($tot == 0){
                        $total_mes[$key] = null;
                    }
                }

            }

            /** GRAFICO SOLUTION */
            foreach ($solution as $solu){
                foreach($tec_count as $key => $tec_counts){
                    if($key == $solu['users_id'] ){
                        $tec_count_tot[$solu['users_id']] += 1;
                    }
                }

                $total['Total_tec'] += 1;
                $tec_count[$solu['users_id']] += 1;

            }
            krsort($tipo_chamado);
            if (request()->cookie('feedback') == 1){
                //
            }else{
                Cookie::queue('feedback', 1);
            }
            return view('admin.dashboard')
                ->with('filial',$filial)
                ->with('total',$total)
                ->with('tec_count',$tec_count)
                ->with('tec',$tec)
                ->with('tec_count_tot',$tec_count_tot)
                ->with('total_mes',$total_mes)
                ->with('tipo_chamado',$tipo_chamado)
                ->with('feedback', request()->cookie('feedback'));

    }

    public function adminEscala(Request $request){

        $escala = Sabados::where('data','>',date('Y-m-d', strtotime('-1 day')))->limit(3)->get();
        $escala_geral = Sabados::where('data','>',date('Y-m-d', strtotime('-1 day')))->get();

        return view('admin.escala')
            ->with('escala', $escala)
            ->with('escala_geral', $escala_geral);


    }

    public function adminPc($filtro = null, Request $request){

        $filtro = $request['filtro'];

            $pc = PC::all();
            $pc_tv = PcTv::all();
            $pc_fi = PcFi::all();

            $array_teste = [];
            foreach($pc_fi as $pcfi){
                if($pcfi['computers_id'])
                    $array_teste[$pcfi['computers_id']] = $pcfi['remote_addr'];
            }

            return view('admin.computadores')
                ->with('filtro',$filtro)
                ->with('pc',$pc)
                ->with('pc_tv',$pc_tv)
                ->with('array_teste',$array_teste);
    }

    public function teste(Request $request){

        $host=$request['ip'];

        $id = $request['id'];


        exec("ping " .$host." -n 1", $output, $result);

        //dd($output);

        if ($result == 0)
            return back()
                ->with('id', $id);

        else

        echo '<span class="text-muted float-right" style="align-content:end;">Offline</strong><i class="bi bi-record-fill ml-1" style="color:rgb(194, 19, 7);"></i></span>';


    }

    public function conteudoChamado(Request $request){
       $tec = $this->nomes;

       $tipo = $request->input('tipo');

       $idchamado = $request->input("idchamado");


       $conteudo = Chamado::where("id", $idchamado)->get();
       $acomp = Acompanhamento::where('items_id', $idchamado)->get();
       $solution = Solution::where('items_id', $idchamado)->get();

       $data = ['conteudo' => $conteudo, 'acomp'=> $acomp, 'tec' => $tec,'solution'=> $solution];

       return view("admin.modal.".$tipo, $data);
    }


    public function tabelaChamado(Request $request){
        if ($request['filtro'] == null){
            $fil = ['status','<=',4];
        }
        else{
            $fil = explode('-', $request['filtro']);
        }

        $tec = $this->nomes;
        $tkt = Tkt_Users::all();
        $sup = Tkt_Sup::all();
        $daily_chamado = Chamado::all();
        $acomp=  Acompanhamento::orderBy('date_mod', 'desc')->get();


        if ($fil[0] != 'users_id' and $fil[0] != 'interno'){
            $chamados = Chamado::orderBy('date_creation', 'desc')->where($fil[0], $fil[1], $fil[2])->where('users_id_recipient', 56)->get();
        }
        elseif ($fil[0] == 'interno'){
            $chamados = Chamado::orderBy('date_creation', 'desc')->where('users_id_recipient', '!=', 56)->where('status', '<', 5)->get();
            return view('admin.internos', ['chamados' => $chamados])->with(['acomp' => $acomp])->with(['tkt' => $tkt])->with('tec',$tec)->with('sup',$sup)->with('daily_chamado', $daily_chamado);

        }
        else{
            $chamados = Tkt_Users::join('glpi_tickets','glpi_tickets_users.tickets_id', '=','glpi_tickets.id')
                                    ->where($fil[0], $fil[1], $fil[2])
                                    ->where('status','<=',4)
                                    ->where('users_id_recipient', 56)->get();
        }

        return view('admin.chamados', ['chamados' => $chamados])->with(['acomp' => $acomp])->with(['tkt' => $tkt])->with('tec',$tec)->with('sup',$sup)->with('daily_chamado', $daily_chamado);
    }

    public function tabelaSolucionados(Request $request){

        $tec = $this->nomes;

        if (strpos($request['filtro'] , '-')){
            $solution =  Solution::whereDate('date_creation',date('Y-m-d', strtotime($request['filtro'])))->get();
            $chamados =  Chamado::orderBy('date_mod', 'desc')->whereDate('date_mod',date('Y-m-d', strtotime($request['filtro'])))->where('status',5)->get();
        }
        elseif(strlen($request['filtro']) == 4){
            $solution =  Solution::where('items_id',$request['filtro'])->get();
            $chamados =  Chamado::orderBy('date_mod', 'desc')->where('id',$request['filtro'])->where('status',5)->get();
        }
        else{
            $solution =  Solution::where('date_creation', '>', date('Y-m-d H:i:s', strtotime($request['filtro'])))->get();
            $chamados =  Chamado::orderBy('date_mod', 'desc')->where('date_mod', '>=', date('Y-m-d H:i:s', strtotime($request['filtro'])))->where('status',5)->get();
        }

        return view('admin.solucionados_table', ['chamados' => $chamados])->with('solution',$solution)->with('tec',$tec);
    }

    public function filtroChamado(Request $request){
        $tec = $this->nomes;
        $tkt = Tkt_Users::all();
        $sup = Tkt_Sup::all();
        $daily_chamado = Chamado::all();


        $acomp=  Acompanhamento::orderBy('date_mod', 'desc')->get();

        $chamados = Chamado::orderBy($request['id'], $request['order'])->where('users_id_recipient', 56)->where('status', '<=', '4')->get();


        return view('admin.chamados', ['chamados' => $chamados])->with(['acomp' => $acomp])->with(['tkt' => $tkt])->with('tec',$tec)->with('sup',$sup)->with('daily_chamado', $daily_chamado);
    }

    public function alterarStatus(Request $request){
        $atribuido = Tkt_Users::where('tickets_id',$request['id']);
        if ($request['user'] != null){
            $atribuido->update(['users_id' => $this->nomes_[$request['user']]]);
            if (count($atribuido->get()) < 1 ){
                Tkt_Users::create(array(
                        'tickets_id'=>$request['id'],
                        'users_id'=>$this->nomes_[$request['user']],
                        'type'=>2,
                        'use_notification'=>0,

                ));
            }

        }
        Chamado::where('id',$request['id'])->update(['status' => $request['status']]);

        return back();
    }

    public function alterarTec(Request $request){
        if (isset($request['user'])){
            Tkt_Users::where('tickets_id',$request['id'])->update(['users_id' => $this->nomes_[$request['user']]]);
            Chamado::where('id',$request['id'])->update(['status' => 4]);
            return ($request['user']);
        }
    }



    public function adminDoc(Request $request){
        $doc = Doc::all();
        return view('admin.doc')->with('doc',$doc);
    }

    public function addDoc(Request $request){
        if ($request->file('imagem') != null){
            foreach (Doc::all() as $d){
                if($request['titulo'] == $d['name']){
                    $file = $request->file('imagem');
                    $filename= $file->getClientOriginalName();
                    $upload = $file->storeAs('public/docs', $filename);
                    $d['local'] = 'docs/'.$filename;
                    $d->save();
                    return back();
                }
            }

            $extension = $request->file('imagem')->getClientOriginalExtension();
            $file = $request->file('imagem');
            $filename= $file->getClientOriginalName();
            $upload = $file->storeAs('public/docs', $filename);
            Doc::create([
                'path' => $extension,
                'name' => $request['titulo'],
                'date_creation'=>date('Y-m-d H:i:s'),
                'date_mod'=>date('Y-m-d H:i:s'),
                'users_id'=>Auth::user()->comment,
                'local' => 'docs/'.$filename,
            ]);
        }

        return back();
    }
    public function criar_chat(Request $request)
    {
        try{
            $data = array();
            $chamado = Chamado::find($request['id']);
            $nome = str_replace(" ", "_", $request['user_req']);
            $teste = shell_exec('python teste.py '.$nome.' '.$request['setor_req'].$this->filiais[$chamado['locations_id']].' cdAgua/30');
            $result_json = json_decode($teste);

            if ($result_json->status == 'success' ){

                    $content = explode('Observações', $chamadso['content'])[1] ?? null;
                    if (strpos($content,'&lt;')){
                        $conteudo = '<div><div><div><div><strong>Chamado '.html_entity_decode($content) ;
                    }
                    else{
                        $conteudo=  '<div><div><div><div><p><strong>Chamado '.$content;
                    }

                    $data = [
                        'nome' => $chamado['nome'],
                        'time' => $chamado['date_mod'],
                        'date_creation' => $chamado['date_creation'],
                    'date_creation' => $chamado['date_creation'],
                        'title' => $chamado['name'],
                        'imagem' => $request->file('imagem'),
                        'name_req' => $result_json->user,
                        'pass_req' => $result_json->senha,
                        'id' => $request['id'],
                        'content' => $conteudo,
                        'msg' => 'Segue abaixo credenciais de acesso ao chat: <br><br>
                        Login: '.$result_json->user.'<br>
                        Senha: '.$result_json->senha.'<br>'
                    ];

                    Mail::to($data['email'])->cc($emails[$chamado['locations_id']])->cc($chamado['email'])->bcc('suporte.ti@casasdaagua.com.br')->send(new newSolutions($data));
                    //Mail::to($chamado['email'])->send(new newSolutions($data));




                Solution::create([
                    'itemtype'=>'Ticket',
                    'content' => $data['msg'],
                    'items_id'=>$request['id'],
                    'date'=>date("Y-m-d H:i:s", strtotime('-3 hour')),
                    'date_creation'=> date("Y-m-d H:i:s", strtotime('-3 hour')),
                    'date_mod'=> date("Y-m-d H:i:s", strtotime('-3 hour')),
                    'users_id'=>Auth::user()->comment,
                    'status'=>1
                ]);


                $chamado->date_mod = date("Y-m-d H:i:s", strtotime('-3 hours'));
                $chamado->status = 5;
                $chamado->save();

                return 'Sucesso!';

            }
            else{
                $data['e'] = 'Erro ao criar usuário';
                $data['caminho'] = 'App/public/teste.py';
                $data['sub'] = 'LOG - Erro na IA - Chat';
                Mail::to('rian.ti@casasdaagua.com.br')
                    ->send(new newErrors($data));
                return 'Erro!';
            }
        }
        catch(\Exception $e){
            $data['e'] = $e->getMessage();
            $data['caminho'] = 'App/Http/Controllers/AdminController\criar_chat()';
            $data['sub'] = 'LOG - Erro de criar Chat';
            Mail::to('rian.ti@casasdaagua.com.br')
                ->send(new newErrors($data));

            return 'Erro!';
        }
    }


    public function adminTasks(Request $request){
        $task = Task::where('users_id','=',Auth::user()->comment)
                ->where('status','1')
                ->orWhere(function($query) {
                    $query->where('date_mod', '>',date('Y-m-d H:i:s', strtotime('-1 day')))
                          ->where('users_id','=',Auth::user()->comment);
                    })
                    ->get();
        $task_grupo = Chamado::where('users_id_recipient','!=', '56')->where('status','!=', '5')->where('status','!=', '6')->get();
        $task_pen = Tkt_Users::join('glpi_tickets','glpi_tickets.id', '=','glpi_tickets_users.tickets_id')
                    ->where('users_id',Auth::user()->comment)
                    ->where('status','<=', 4)
                    ->where('glpi_tickets_users.type', 2)
                    ->get();


        $data = ['task' => $task, 'task_grupo' => $task_grupo,'task_pen' => $task_pen];
        return view('admin.tasks', $data);
    }

    public function addtask(Request $request){
        Task::create([
            'titulo'=>$request->input('titulo'),
            'content'=>$request->input('msg'),
            'date_creation'=>date('Y-m-d H:i:s'),
            'date_mod'=>date('Y-m-d H:i:s'),
            'users_id'=>Auth::user()->comment,
            'user_name'=> Auth::user()->name,
            'status'=> 1,
        ]);
        return back();
    }

    public function verTask(Request $request){
        $task = Task::where('id', $request->input('id'))->get();

        return view('admin.modal.task_modal')->with('task',$task);
    }

    public function checkTask(Request $request){

        $alterar_status = Task::find($request->input('id'));
        if ($request->input('status') == 1){
            $alterar_status->status = 2;
        }
        else{
            $alterar_status->status = 1;
        }
        $alterar_status->date_mod = date('Y-m-d H:i:s');
        $alterar_status->save();

        $task = Task::where('users_id','=',Auth::user()->comment)
        ->where('status','1')
        ->orWhere(function($query) {
            $query->where('date_mod', '>',date('Y-m-d H:i:s', strtotime('-1 day')))
            ->where('users_id','=',Auth::user()->comment);
            })
            ->get();
        return view('admin.modal.task_check')->with('task', $task);
    }

    public function editTask(Request $request){

        $alterar = Task::find($request['id']);
        $alterar->titulo = $request['titulo'];
        $alterar->content = $request['msg'];
        $alterar->status = 1;
        $alterar->date_mod = date('Y-m-d H:i:s');
        $alterar->save();

        return redirect('admin/tasks');
    }

    public function testeip(Request $request){
       return 'OK!';
    }



}
