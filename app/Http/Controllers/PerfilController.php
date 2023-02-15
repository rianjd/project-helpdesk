<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Solution;
use App\Models\Login;
use Illuminate\Support\Facades\Auth;

use App\Models\Sabados;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Cookie;
use \Crypt;


class PerfilController extends Controller
{
    public function dashborad(Request $request)
    {   $tec = array('Total'=>0,'54'=>'Rian','60'=>'Cassio','61'=>'Matheus','59'=>'Pedro','8'=>'Alan','2'=>'Admin','56'=>'Suporte TI', '65' => 'Paulo');
        $tec_count = array('54'=>0,'60'=>0,'61'=>0,'59'=>0,'8'=>0,'2'=>0,'56'=>0);
        $tec_count_tot = array('54'=>0,'60'=>0,'61'=>0,'59'=>0,'8'=>0,'2'=>0,'56'=>0);

        $solution = Solution::all();
        $escala = Sabados::where('obs', Auth::user()->comment )->get();

        /** GRAFICO SOLUTION */
        if($request->cookie('cookie_user') !== null){
            foreach ($solution as $solu){
                    if( Auth::user()->comment == $solu['users_id'] ){
                        $tec_count_tot[$solu['users_id']] += 1;
                    }
                if (date("20y-m", strtotime($solu['date_creation'])) == date("2022-m")){
                    if( Auth::user()->comment == $solu['users_id'] ){
                        $tec_count[$solu['users_id']] += 1;
                    }
                }
            }

        }
        return view('profile.perfil')
            ->with('tec_count',$tec_count)
            ->with('tec',$tec)
            ->with('escala', $escala)
            ->with('tec_count_tot',$tec_count_tot);
    }
    public function trocafoto(Request $request)
    {


        $file = $request->file('imagem');


        if ($file != null){
            $upload = $file->storeAs('public/profile', $request['user_user'].'.jpg');
        }

        if (!empty($request['passold'])){

            $loginho = Login::all()->where('comment' ,Auth::user()->comment);

            foreach ($loginho as $login){

                if(password_verify($request['passold'], $login->password)){

                    if (isset($request->password)){
                        if($request->password == $request->password2){
                            $login->password = Hash::make($request->password2);
                            $login->save();
                            return back()->with('success','Sucesso');
                        }
                        else{
                            return back()->with('erro2','Erro');
                        }
                    }
                }



            }
            return back()->with('erro','Erro');
        }
        return back()->with('success','success');




    }
}
