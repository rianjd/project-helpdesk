<div class="p-4 " style="background-image: url('images/back.jpg');">
    <h1 class="text-center" style="color: aliceblue">Administrador de chamados<i class="bi bi-ticket-perforated ml-3" style="color: #fbca0a;"></i></h1>
    <p class="lead text-center" style="color: rgb(224, 224, 224)">Admin chamados - Suporte TI</p>

</div>
@extends('welcome')
@section('conteudo')

<div class="container-fluid mt-5">
    <div class="row" style="margin: auto ;">


        {{-- TITULOS TABELA --}}
        <div class="col-md-12 ">
            <div class="card-header row" style="background: rgb(42, 57, 66);">
                <div class="col-md-1 ">
                    <a href="/getChamadoid"><h4 class="text-center mt-4" style="color: white !important;" >ID</h4></a>
                </div>
                <div class="col-md-5">
                    <h4 class="text-left mt-4" style="color: white !important;" ><i class="fa fa-list-ul mr-2" aria-hidden="true"></i>
                        Titulo do chamado</h4>
                </div>
                <div class="col-md-2">
                    <h4 class="text-center mt-4 " style="color: white !important;" >Abertura</h4>
                </div>
                <div class="col-md-2">
                    <h4 class="text-center mt-4" style="color: white !important;" >Última att.</h4>
                </div>
                <div class="col-md-2">
                    <h4 class="text-center mt-4 " style="color: white !important;" >Status</h4>
                </div>
                <div class="col-4">
                    <h4 class="text-center mb-4"></h4>
                </div>
            </div>
        </div>

        {{-- CONTEUDO TABELA --}}
        @if (count($chamados) != 0)
            @foreach($chamados as $chamado)
                @if ($chamado['status'] == '2' xor $chamado['status'] == '3' xor $chamado['status'] == '4' )
                    @if ($chamado['users_id_recipient'] == 56)
                        <div class="col-md-12 ">
                            <div class="card-header row" style="background: rgb(234, 233, 233);">
                                <div class="col-md-1" >
                                    <h5 class="text-center mt-3 fonte" style="color:#e8ab1b;"><i class="fa fa-hashtag mr-1" aria-hidden="true"></i>{{$chamado['id']}}</h5>
                                </div>
                                <div class="col-md-5">
                                    <a class=" btn btn-block mt-2" data-toggle="modal" data-target="#modalChamado{{$chamado['id']}}">
                                        <h5 class="text-left fonte" >
                                            {{$chamado['name'] }}</h5>
                                    </a>
                                </div>
                                <div class="col-2 text-center" style="align-self: center;">
                                    <h5 class="mt-2">{{date('d/m/20y', strtotime($chamado['date_creation'])) }}</h5>
                                </div>

                                <div class="col-2 text-center" style="align-self: center;">
                                    <h5 class=" mt-2">{{date('d/m/20y', strtotime($chamado['date_mod'])) }}</h4>
                                </div>

                                {{-- STATUS (ABERTO/EM ANDAMENTO) --}}
                                @if  ($chamado['status'] == '2' )
                                    <div class="col-2 text-center p-3"><span class="text-muted " style="align-items: center;">Aberto</strong><i class="bi bi-record-fill ml-1" style="color:rgb(82, 194, 7);"></i></span>
                                    </div>
                                @endif
                                @if ($chamado['status'] == '3')
                                    <div class="col-2 text-center p-3"><span class="text-muted" style="align-items: center;">Planejado</strong><i class="bi bi-record-fill ml-1" style="color:rgb(32, 150, 228);"></i></span>
                                    </div>
                                @endif
                                @if ($chamado['status'] == '4')
                                    <div class="col-2 text-center p-3"><span class="text-muted" style="align-items: center;">Em andamento</strong><i class="bi bi-record-fill ml-1" style="color:rgb(228, 182, 32);"></i></span>
                                    </div>
                                @endif

                            </div>

                            {{-- MODAL CHAMADOS --}}
                            <div class= "modal fade" id="modalChamado{{$chamado['id']}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl" style="max-width: 1200px;">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="exampleModalLabel">
                                                Chamados
                                            </h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="card mb-5" id="Tone">

                                                {{-- ACOMPANHAMENTO --}}
                                                <h5 class="col-12 card-title text-center my-2">Acompanhamento</h5>
                                                @foreach($acomp as $acompanha)
                                                    @if ($acompanha['items_id'] == $chamado['id'])
                                                    <div class="row m-2"  id='teste' name="teste">
                                                        <div class="col-2 media  "  style="align-items: center;">
                                                            <div class="media-body">
                                                                <img src="storage/profile/{{$acompanha['users_id']}}.jpg" class="mr-3" width="50" height="50" style="border-radius: 50%;" alt="...">
                                                                <h5 class="mt-0">{{$tec[$acompanha['users_id']]}}<i class="bi bi-chat-left-dots ml-2" style="color: rgb(95, 95, 95);"></i></h5>
                                                                <span class="text-muted">{{date('d/m/20y', strtotime($acompanha['date_creation'])) }}<span>
                                                            </div>
                                                        </div>
                                                        <div class="col-9 text-left alert alert-info ">
                                                            <p class="mb-3 ">{!! html_entity_decode($acompanha['content'])!!}</p>
                                                            @if ($acompanha['status']==2)
                                                                <div class="p-2 text-right">
                                                                    <span>Enviado para: <strong>LUPA</strong><span>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    @endif
                                                @endforeach

                                                {{-- CONTEUDO CHAMADO --}}
                                                <div class="card-body text-left ">
                                                    <h5 class="mb-5">{!! html_entity_decode($chamado['content']) !!}</h5>
                                                    <h5 class="text-center">Data de abertura:  <strong>{{date('d/m/20y', strtotime($chamado['date_creation'])) }}</strong></h5>
                                                </div>
                                            </div>
                                            <div class="card-footer row">
                                                <div class="col-md-6">
                                                    @if  ($chamado['status'] == '2' )
                                                        <span class="text-muted" style="align-content:end;">Aberto</strong><i class="bi bi-record-fill ml-1" style="color:rgb(82, 194, 7);"></i></span>
                                                    @endif
                                                    @if ($chamado['status'] == '3')
                                                        <span class="text-muted" style="align-content:end;">Planejado</strong><i class="bi bi-record-fill ml-1" style="color:rgb(32, 156, 228);"></i></span>
                                                    @endif
                                                    @if ($chamado['status'] == '4')
                                                        <span class="text-muted" style="align-content:end;">Em andamento</strong><i class="bi bi-record-fill ml-1" style="color:rgb(228, 182, 32);"></i></span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" {{$contador = 1}}>
                    @endif
                @endif


            @endforeach

            {{-- IF SEM CHAMADO --}}
            @if(!isset($contador))
                <div class="col-md-12" id='NONE' name='NONE' style="margin-top: 12rem;">
                    <h1 class="text-center" style="color: #777;"><i class="bi bi-bell-slash mr-3"></i>Não existem chamados para sua filial!</h1>
                </div>
                <div class="col-md-12" style="padding: 140px"></div>
            @else
                <div class="col-md-12" style="padding: 210px"></div>

            @endif
        @endif
    </div>
</div>

{{-- FOOTER --}}
<div class="text-center p-4" >
    © 2022 Desenvolvido por : Rian
</div>

@endsection
