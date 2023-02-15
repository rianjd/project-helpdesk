<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Login;
use Illuminate\Support\Facades\Cookie;
use \Crypt;

use Illuminate\Http\Request;

class AuthController extends Controller
{


    /* Função de Login
    * Coleta dados via Request e checa no banco de dados
    * Salva um cookie com base na localização do login
    */
    public function entrar(Request $request, $local=null){

        /* Retorna erros nos campos */
        if ($request['email'] == "") return back()->with('erroemail','erro');
        if ($request['password'] == "") return back()->with('errosenha','erro');


        /** Salva as credenciais em um array */
        $credentials = [
            'email' => $request['email'] ,
            'password' => $request['password'],

        ];

        /** Login com ADMIN */


        /** Login padrão */
        if (Auth::attempt(['email' => $request['email'],'password' =>$request['password']])) {
            $request->session()->regenerate();
            return redirect()->route('login.page');

        }else{
            return back()->with('error','erro');
        }

    }


    /** Função para logout */
    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();


        return redirect('/');
}
}
