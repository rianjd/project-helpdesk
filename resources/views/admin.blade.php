<link rel="stylesheet" href="css/contact.css">

@extends('admin.base-admin')

@php
    $contador_tot=0;
    $contador = 0;
    $contador_ = 0;
@endphp
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>

<script>
    $(document).ready(function() {
        $(".chamado_table").change( function() {
                let filtro = $(this).val()
                $.post('{{route("tabela_Chamado")}}', {filtro: filtro,  "_token": "{{ csrf_token() }}"}, (result) => {
                    $("#tabelachamado").html(result)
                })
        })

        $(document).on('click',".chamado_modal", function() {
                let id = $(this).attr("data-value")
                let tipo = $(this).attr('title')
                $.post('{{route("conteudo_Chamado")}}', {idchamado: id,  "_token": "{{ csrf_token() }}", 'tipo' : tipo}, (result) => {
                    $("#conteudomodal").html(result)
                })
        })

        $(document).on('click',".filtro", function() {
                let id = $(this).attr("data-value")
                if($(this).attr('title') == 'desc'){
                    $(this).html('<i class=" bi bi-arrow-up ml-2"></i>')
                    $(this).attr('title', 'asc')
                }else{
                    $(this).html('<i class=" bi bi-arrow-down ml-2"></i>')
                    $(this).attr('title', 'desc')
                }
                let order = $(this).attr("title")


                $.post('{{route("filtro_Chamado")}}', {id: id,  "_token": "{{ csrf_token() }}", order:order}, (result) => {
                    $("#tabelachamado").html(result)
                })
        })

        $(document).on('click',".status_tec", function() {
            let user = $(this).html()
            let id = $(this).attr("data-value")

            $.post('{{route("alterar_Tec")}}', {'user': user,  "_token": "{{ csrf_token() }}", 'id':id}, (result) => {
                $('.a'+id).html(result)
            })
        })

        $(document).on('click',".status", function() {
            let id = $(this).attr("data-value")
            $('.status-post').attr("data-value", id);

        })

        $(document).on('click',".status-post", function() {
            let status = $(this).attr('id')
            let id = $(this).attr("data-value")
            let user = $(this).attr("name");
            $.post('{{route("alterar_Status")}}', {user:user ,status: status,  "_token": "{{ csrf_token() }}", 'id':id}, (result) => {
                window.location.reload()
            })
        })


    })


</script>
@section('content')


    <div class="container-fluid mt-2" tabindex="-3">

        {{-- <div class="p-5 mb-5" style="background-image: url({{URL::asset('images/back5.jpg')}}); border-radius:5px;">
            <h1 class="text-center" style="color: aliceblue">Administrador de chamados<i class="fa fa-rocket ml-3" aria-hidden="true" style="color: #fbca0a;"></i></h1>
            <p class="lead text-center" style="color: rgb(224, 224, 224)">Admin chamados - Suporte TI</p>

        </div> --}}

        <div class="row " style="margin: auto ;">

            <div class="col-md-4 text-center mb-4">
                @foreach($daily_chamado as $daily)
                    @php
                        if (date("20y-m-d", strtotime($daily['date_creation'])) == date("2023-m-d", strtotime('-3 hour')) and $daily['status'] != 6) $contador += 1;
                        if (date("20y-m-d", strtotime($daily['date_mod'])) == date("2023-m-d", strtotime('-3 hour')) and $daily['status'] == 5) $contador_ += 1;
                    @endphp
                @endforeach
                <div class="card">
                    <div class="topline"></div>
                    <h3 class="my-2"><strong>Atividade</strong></h3>
                    <h4>
                        {{$contador}}<i class="bi bi-caret-up-fill ml-2 fadeTop4" style="color:#379d0e;" title="Abertos"></i>
                        <i class="bi bi-caret-down-fill mr-2 fadeDown" style="color:rgb(158, 8, 8)" title="Fechados"></i>{{$contador_}}
                    </h4>
                </div>



            </div>
            <div class="col-md-4 text-center mb-4">
                <div class="card">
                    <div class="topline" style="background: #04a3ff"></div>
                    <h3 class="my-2"><strong>Total abertos</strong></h3>
                    <h4 style="color: #04a3ff">
                        @php
                            echo count($chamados);
                        @endphp
                    </h4>
                </div>
            </div>
            <div class="col-md-4 text-center mb-4">
                <div class="card" >
                    <div class="topline" style="background: #ffbc04"></div>
                    <div class="row">
                        <div class="col">
                            <h3 class="my-2"><strong>Sem interação</strong><i class="bi bi-exclamation-circle ml-2" style="color:#ffb007"></i></h3>
                            <h4 style="color: #ffbc04">
                                @php
                                    echo count($chamados->where('status','!=', '3')->where('date_mod', '<', date("Y-m-d",strtotime("-3 days"))));
                                @endphp
                            </h4>
                        </div>

                    </div>


                </div>
            </div>
            <div class="col-md-4">
                <form action="">
                    <div class="row">
                        <i class="bi bi-filter mr-2 mt-2" ></i>

                        <select class="form-control col-md-8 chamado_table" name="filtro" id="filtro">
                            <option value="" class="text-muted chamado_table">Filtro</option>
                            <option class="chamado_table" value="status-<=-4">Todos</option>
                            <option class="chamado_table" value="users_id-=-{{Auth::user()->comment}}">Seus Chamados</option>
                            <option class="chamado_table" value="status-=-4">Andamento</option>
                            <option class="chamado_table" value="status-=-3">Planejados</option>
                            <option class="chamado_table" value="status-=-2">Em aberto</option>
                            <option class="chamado_table" id="chamado_table" value="interno-">Interno</option>

                        </select>
                    </div>
                </form>
            </div>

            {{-- TITULOS TABELA --}}
            <div class="col-md-12 ">
                <div class="card-header chamado mb-3 row" style="font-family: 'Inter', sans-serif;">
                    <div class="col-md-1 " style="color: white !important;">
                        <h4 class="text-center mt-4" >ID
                            <a class="filtro" data-value="id" title="null" style="font-size: 18;">
                                <i class="bi bi-arrow-down-up ml-2"></i>
                            </a>
                        </h4>
                    </div>
                    <div class="col-md-5">
                        <h4 class="text-left mt-4" style="color: white !important;" ><i class="fa fa-list-ul mr-2" aria-hidden="true"></i>
                            CHAMADO</h4>
                    </div>
                    <div class="col-md-2" style="color: white !important;">
                        <h4 class="text-center mt-4 ">Status
                            <a class="filtro " data-value="status" title="null" style="font-size: 18;">
                                <i class="bi bi-arrow-down-up mr-2"></i>
                            </a>
                        </h4>
                    </div>
                    <div class="col-md-1" style="color: white !important;">
                        <h4 class="text-center mt-4 " >Abertura

                        </h4>
                    </div>

                    <div class="col-md-2" style="color: white !important;">
                        <h4 class="text-center mt-4"  >Modific.

                            <a class="filtro" data-value="date_mod" title="null" style="font-size: 18; color: white !important;">
                                <i class="bi bi-arrow-down-up "></i>
                            </a>
                        </h4>
                    </div>




                </div>
            </div>


            <div id="tabelachamado" style="width: 100%;">
                 {{-- CONTEUDO TABELA --}}
                @if (count($chamados) != 0)
                    @foreach($chamados as $chamado)
                            <div class="col-md-12" id="chamado{{$chamado['id']}}">
                                @if (date("Y-m-d H:i:s", strtotime('-3 days')) < $chamado['date_mod'] or $chamado['status'] == 3)
                                    <div class="card-header  row" >
                                @else
                                    <div class="card-header row" style="background: rgba(235, 14, 14, 0.199);">
                                @endif
                                        <div class="col-md-1" style="align-self: center;" >
                                            <h5 class="text-center mt-3 fonte id" ><i class="fa fa-hashtag mr-1" aria-hidden="true"></i>{{$chamado['id']}}</h5>
                                        </div>
                                        <div class="col-md-5 popover__wrapper " style="align-self: center;">
                                            <a class="  mt-2  popover__title btn  chamado_modal" style="text-transform: none" data-value="{{$chamado['id']}}" title="conteudo" data-toggle="modal" data-target="#modalGeral">
                                                <h5 class="text-left fonte" style="font-family: 'Inter', sans-serif;" >
                                                    {{$chamado['name'] }}</h5>


                                            </a>

                                            <div class="popover__content">
                                                <p class="popover__message">
                                                    <?php

                                                    $content = explode('Observações', $chamado['content'])[1] ?? null;
                                                    if (strpos($content,'&lt;')){
                                                        echo '<div><div><div><div><strong>Chamado '.html_entity_decode($content) ;
                                                    }
                                                    else{
                                                        echo '<div><div><div><div><p><strong>Chamado '.$content;
                                                    }
                                                    ?>


                                                </p>
                                            </div>
                                        </div>







                                        {{-- STATUS (ABERTO/EM ANDAMENTO) --}}
                                        @if  ($chamado['status'] == '2' )
                                            <div class="col-md-2 text-center" style="align-self: center;">
                                                <span class=" status" data-toggle="modal" data-target="#modalStatus" data-value="{{$chamado['id']}}" style="align-items: center; color:#01b86b;">
                                                    <p class="mb-0">Aberto</strong></p>
                                                    <svg class="w-44 " height="6" viewBox="0 0 40 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect width="40" height="6" rx="3" fill="#2D2D2D"></rect>
                                                        <rect width="40" height="6" rx="3" fill="url(#paint0_linear)"></rect>

                                                        <defs><linearGradient id="paint0_linear" x1="0" y1="0" x2="1" y2="0">
                                                            <stop class="verde" stop-color="#58f7b4"></stop><stop offset="1" stop-color="#0e9d61"></stop>
                                                        </linearGradient></defs>
                                                    </svg>
                                                </span>


                                            </div>

                                        @endif
                                        @if  ($chamado['status'] == '3' )

                                            <div class="col-md-2  text-center pt-2 popover__wrapper  status" data-toggle="modal" data-target="#modalStatus" data-value="{{$chamado['id']}}" style="align-self: center;"><span class=" popover__title" style="align-items: center;color: #04a3ff;"><p class="text-center">Planejado</strong></p></span>
                                                <div class="row justify-content-center">
                                                    @if ($chamado['time_to_resolve'] != null)
                                                        <svg class="w-44 " height="6" viewBox="0 0 40 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <rect width="40" height="6" rx="3" fill="#2D2D2D"></rect>
                                                            <rect width="40" height="6" rx="3" fill="url(#paint1_linear)"></rect>

                                                            <defs><linearGradient id="paint1_linear" x1="0" y1="0" x2="1" y2="0">
                                                                <stop  stop-color="#61c5ff"></stop><stop offset="1" stop-color="#04a3ff"></stop>
                                                            </linearGradient></defs>
                                                        </svg>
                                                        <div class="popover__content" style="left: 90px;">
                                                            <p class="popover__message">
                                                                {{date('d/m/20y', strtotime($chamado['time_to_resolve']))}}
                                                            </p>
                                                        </div>
                                                    @endif

                                                </div>
                                            </div>
                                        @endif
                                        @if ($chamado['status'] == '4')
                                            <div class="col-md-2  text-center pt-2 " style="align-self: center;" ><span class="status" style="align-items: center; color:rgb(228, 182, 32)" data-toggle="modal" data-target="#modalStatus" data-value="{{$chamado['id']}}">Andamento</strong></span>
                                                <div class="row justify-content-center">

                                                    {{-- Atribuido para : --}}
                                                    @foreach ($tkt as $item)
                                                        @if ($chamado['id'] == $item['tickets_id'])
                                                            <span class="category-tags mt-2 atribuido dropdown">
                                                                <div class="category a{{$chamado['id']}}"  role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    {{$tec[$item['users_id']]}}
                                                                </div>
                                                                <div class="dropdown-menu " aria-labelledby="dropdownMenuButton" >

                                                                    <a class="dropdown-item status_tec" data-value="{{$chamado['id']}}">Rian</a>
                                                                    <a class="dropdown-item status_tec" data-value="{{$chamado['id']}}">Matheus</a>
                                                                    <a class="dropdown-item status_tec" data-value="{{$chamado['id']}}">Cassio</a>
                                                                    <a class="dropdown-item status_tec" data-value="{{$chamado['id']}}">Alan</a>
                                                                    <a class="dropdown-item status_tec" data-value="{{$chamado['id']}}">Paulo</a>


                                                                </div>
                                                            </span>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>


                                        @endif
                                        <div class="col-1 text-center" style="align-self: center;">
                                            <h5 class="mt-2">{{date('d/m/20y', strtotime($chamado['date_creation'])) }}</h5>
                                        </div>

                                        <div class="col-2 text-center" style="align-self: center;">

                                                @if (date("Y-m-d H:i:s", strtotime('-3 days')) < $chamado['date_mod'] or $chamado['status'] == 3)
                                                    <h5 class=" mt-2">{{date('d/m/20y', strtotime($chamado['date_mod'])) }}</h5>
                                                @else
                                                    <h5 class="mt-2 alarme" style="color:rgb(216, 6, 6)">{{date('d/m/20y', strtotime($chamado['date_mod'])) }}</h5>

                                                        @if(date("m") == date('m', strtotime($chamado['date_mod'])))
                                                            <span class="text-muted alarme"><h6>{{date("d") - date('d', strtotime($chamado['date_mod'])) }} dias s/ interação</h6></span>
                                                        @else
                                                            <span class="text-muted ">(Há muito tempo)</span>
                                                        @endif
                                                @endif


                                        </div>
                                        <div class="row justify-content-center fonte" style="align-self: center;">
                                            <a  type="button" class="botinho chamado_modal" data-value="{{$chamado['id']}}"   data-toggle="modal" data-target="#modalGeral" title="solucao">
                                                <h5  class="text-center botao_verde" ><i class="bi bi-check-circle"></i></h4>
                                            </a>
                                            <a type="button" class="botinho chamado_modal" data-value="{{$chamado['id']}}"   data-toggle="modal" data-target="#modalGeral" title="acomp">
                                                <h5 class="text-center" style="color: rgb(255, 174, 0);"><i class="bi bi-chat-right-dots-fill"></i></h4>
                                            </a>

                                            <a type="button" class="botinho chamado_modal" data-value="{{$chamado['id']}}"   data-toggle="modal" data-target="#modalGeral" title="encaminhar">
                                                <h5 class="text-center" style="color: rgb(177, 177, 177);"><i class="bi bi-send-fill"></i></h4>
                                            </a>
                                        </div>

                                    </div>
                            </div>
                            <input type="hidden" {{$contador = 1}}>

                    @endforeach

                @else
                <div class="col-md-12" id='NONE' name='NONE' style="margin-top: 12rem;">
                    <h1 class="text-center" style="color: #777;"><i class="bi bi-bell-slash mr-3"></i>Não existem chamados com o filtro selecionado!</h1>
                </div>
                <div class="col-md-12" style="padding: 140px"></div>
                @endif
            </div>

        </div>
        {{-- MODAL CHAMADOS --}}
        <div class= "modal fade " id="modalGeral" tabindex="-1"  aria-hidden="true">
            <div class="modal-dialog modal-xl" style="">
                <div class="modal-content " >
                    <div id="conteudomodal">

                    </div>
                </div>
            </div>
        </div>

        {{-- MODAL STATUS --}}

        <div class= "modal fade " id="modalStatus" tabindex="1"  aria-hidden="true">
            <div class="modal-dialog modal-xl" style="max-width: 550px;">
                <div class="modal-content">
                    <div id="status-conteudo">
                        <div class="modal-header">
                            <h4 class="modal-title" id="exampleModalLabel">
                                Selecionar status
                            </h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row justify-content-center dropdown">
                                        <a type="button" class="btn btn-success btn-sm mx-2 status-post" style="color: rgb(15, 15, 15) !important" name="" id="2">Aberto<i class="bi bi-circle ml-2"></i></a>
                                        <a class="btn btn-warning btn-sm mx-2" style="color: rgb(15, 15, 15) !important" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Em andamento<i class="bi bi-chevron-compact-down ml-2"></i></a>
                                        <div class="dropdown-menu " aria-labelledby="dropdownMenuButton">

                                            <a class="dropdown-item status-post" id="4" name="Rian" data-value="{{$chamado['id']}}">Rian</a>
                                            <a class="dropdown-item  status-post" id="4" name="Matheus" data-value="{{$chamado['id']}}">Matheus</a>
                                            <a class="dropdown-item status-post" id="4" name="Cassio" data-value="{{$chamado['id']}}">Cassio</a>
                                            <a class="dropdown-item status-post" id="4" name="Alan" data-value="{{$chamado['id']}}">Alan</a>
                                            <a class="dropdown-item status-post" id="4" name="Paulo" data-value="{{$chamado['id']}}">Paulo</a>

                                        </div>
                                        <a class="btn btn-danger btn-sm  mx-2 status-post" style="color: rgb(15, 15, 15) !important" name="" id="6">Fechado <i class="bi bi-x-circle ml-2"></i></a>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
    <!--FORM VALIDATE-->
    <div class="col-3 offset-9 fixed-bottom" id='success'>
    @if ($message = Session::get('success'))

        <div class="alert alert-success alert-dismissible fade show p-4" role="alert">
            <strong>Chamado ID: {{$message}}</strong><br>Enviado com sucesso!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>

    @endif
    </div>
    @if ($message = Session::get('error'))
        <div class="col-3 offset-9 fixed-bottom">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Chamado com algum problema!</strong> <br> - Verificar se foi enviado pelo email<br> - Favor entrar em contato com o desenvolvedor
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
    @endif

    {{-- FOOTER --}}
    <div class="text-center p-4" >
        © 2022 Desenvolvido por : Rian
    </div>


@endsection
