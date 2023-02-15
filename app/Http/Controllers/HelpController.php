<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\newLaravelTips;
use App\Mail\newGerentes;
use App\Mail\newHelp;


class HelpController extends Controller
{
    public $data;

    public function store(Request $request)
    {


        $data = array();

        if ($request->input('nome') != "") $data['nome']=$request->input('nome');
        if ($request->input('email') != "") $data['email']=$request->input('email');
        if ($request->input('msg') != "") $data['msg']=$request->input('msg');

        try {
            Mail::to('rian.ti@casasdaagua.com.br')
                    ->send(new newHelp($data));

            return back()
                    ->with('success', 'Solicitação enviada com sucesso!');

        }catch (Exception $e) {
            return back()
                    ->with('error', 'Algo deu errado! Favor entrar em contato com a TI');
        }
    }
}
