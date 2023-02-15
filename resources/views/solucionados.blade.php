@extends('admin.base-admin')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
<script>

    $(document).on('click',".chamado_modal", function() {
                let id = $(this).attr("data-value")
                let tipo = $(this).attr('title')
                $.post('{{route("conteudo_Chamado")}}', {idchamado: id,  "_token": "{{ csrf_token() }}", 'tipo' : tipo}, (result) => {
                    $("#conteudomodal").html(result)
                })
    })

    $(document).on('keyup',".chamado_blur_id", function() {
                var valor = $(this).val().length
                if (valor === 4){
                    let filtro = $(this).val()

                    $.post('{{route("tabela_Solucionados")}}', {filtro: filtro,  "_token": "{{ csrf_token() }}"}, (result) => {
                        $("#tabelachamado").html(result)
                    })
                }
    })

    $(document).on('change',".chamado_table_blur", function() {
                let filtro = $(this).val()
                $.post('{{route("tabela_Solucionados")}}', {filtro: filtro,  "_token": "{{ csrf_token() }}"}, (result) => {
                    $("#tabelachamado").html(result)
                })
    })

    $(document).on('change',".chamado_table", function() {
                let filtro = $(this).val()
                if(filtro == 'data'){
                    $("#conteudo-date-id").html("<input type='date' class='form-control chamado_table_blur ml-3'  name='time_to_resolve' required pattern='\d{4}-\d{2}-\d{2}'>")
                }
                if (filtro == 'id'){
                    $("#conteudo-date-id").html("<input type='text' class='form-control chamado_blur_id ml-3' placeholder='#ID'>")
                }
                $.post('{{route("tabela_Solucionados")}}', {filtro: filtro,  "_token": "{{ csrf_token() }}"}, (result) => {
                    $("#tabelachamado").html(result)
                })
        })
</script>


<div class="container-fluid mt-2">
    <div class="p-5 mb-5" style="background-image: url('images/back.jpg');border-radius:5px;">
        <h1 class="text-center" style="color: aliceblue">Administrador de chamados<i class="bi bi-check ml-3" style="color: rgb(7, 97, 30);"></i></h1>
        <p class="lead text-center" style="color: rgb(224, 224, 224)">Chamados Solucionados</p>

    </div>
    <div class="col-md-4 mb-3">
            <form action="">
                <div class="row ">
                    <i class="bi bi-filter mr-2" ></i>
                    <select class="form-control col-md-6 chamado_table" name="filtro" id="filtro">
                        <option value="-3 days" class="text-muted ">Ultimos 3 dias</option>
                        <option value="-5 days">Ultimos 5 dias</option>
                        <option value="-10 days">Ultimos 10 dias</option>
                        <option value="data" >Escolher data</option>
                        <option value="id">Buscar ID</option>

                    </select>
                    <div id="conteudo-date-id"></div>
                </div>
            </form>
    </div>

    <div class="row fonte" style="margin: auto ;">


        {{-- TITULOS TABELA --}}
        <div class="col-md-12 ">
            <div class="card-header row" style="background: rgb(7, 97, 30);">
                <div class="col-md-1 ">
                    <h4 class="text-center mt-4" style="color: white !important;" >ID</h4>
                </div>
                <div class="col-md-5">
                    <h4 class="text-left mt-4" style="color: white !important;" >Titulo</h4>
                </div>
                <div class="col-md-2">
                    <h4 class="text-center mt-4 " style="color: white !important;" >Abertura</h4>
                </div>
                <div class="col-md-1">
                    <h4 class="text-left mt-4" style="color: white !important;" >Solução</h4>
                </div>
                <div class="col-md-2">
                    <h4 class="text-center mt-4 " style="color: white !important;" >Status</h4>
                </div>
                <div class="col-md-1">
                    <h4 class="text-center mt-4 " style="color: white !important;" > Restaurar</h4>
                </div>
                <div class="col-1">
                    <h4 class="text-right mb-4"> </h4>
                </div>
            </div>
        </div>

        {{-- CONTEUDO TABELA --}}
        <div id="tabelachamado" style="width: 100%;">
            @if (count($chamados) != 0)
                @foreach($chamados as $chamado)
                        @if ($chamado['users_id_recipient'] == 56)
                            <div class="col-md-12 ">
                                    <div class="card-header row" >
                                        <div class="col-md-1" style="align-self: center;">
                                            <h5 class="text-center fonte mt-2" ># {{$chamado['id']}}</h5>
                                        </div>
                                        <div class="col-md-5 popover__wrapper" style="align-self: center;">
                                            <a class=" btn btn-block   popover__title chamado_modal" data-value="{{$chamado['id']}}"  data-toggle="modal" data-target="#modalGeral" title="solucionado">
                                                <h5 class="text-left fonte mt-2" >{{$chamado['name'] }}</h5>
                                            </a>
                                            <div class="popover__content" style="width: 500px;">
                                                @foreach ($solution as $solu )
                                                    @if ($solu['items_id'] == $chamado['id'])
                                                        <p class="popover__message">
                                                            {!! $solu['content'] !!}
                                                        </p>
                                                    @endif
                                                @endforeach

                                            </div>

                                        </div>

                                        <div class="col-2 text-center" style="align-self: center;">
                                            <h5 class="mt-2">{{date('d/m/20y', strtotime($chamado['date_creation'])) }}</h5>
                                        </div>

                                        <div class="col-1 text-center" style="align-self: center;">
                                                <h5 class="mt-2" style="color:rgb(61, 143, 6);">{{date('d/m/20y', strtotime($chamado['date_mod'])) }}</h5>
                                        </div>



                                        {{-- STATUS (ABERTO/EM ANDAMENTO) --}}
                                        @if  ($chamado['status'] == '5' )
                                            <div class="col-md-2 text-center" style="align-self: center;"><span class="text-muted " style="align-items: center;">Solucionado<i class="bi bi-check-lg ml-1" style="color:rgb(83, 182, 17);"></i></span>
                                            </div>

                                        @endif


                                        <div class=" text-right col-xl-1" style="align-self: center;">

                                                <form action="{{route ('restore.chamado')}}"  method="post">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" value="{{$chamado['id']}}" name="id">
                                                    <button  type="submit" class="btn text-center" >
                                                        <h4  class="botinho" style="color: rgb(16, 119, 216);"><i class="bi bi-arrow-repeat"></i></h4>
                                                    </button>
                                                </form>
                                        </div>
                                    </div>



                            </div>
                            <input type="hidden" {{$contador = 1}}>
                        @endif

                @endforeach


                {{-- MODAL CHAMADOS --}}
                <div class= "modal fade " id="modalGeral" tabindex="1"  aria-hidden="true">
                    <div class="modal-dialog modal-xl" style="max-width: 1200px;">
                        <div class="modal-content">
                            <div id="conteudomodal">

                            </div>
                        </div>
                    </div>
                </div>

                {{-- IF SEM CHAMADO --}}
                @if(!isset($contador))
                    <div class="col-md-12" id='NONE' name='NONE' style="margin-top: 12rem;">
                        <h1 class="text-center" style="color: #777;"><i class="bi bi-bell-slash mr-3"></i>Nenhum chamado solucionado</h1>
                    </div>
                    <div class="col-md-12" style="padding: 140px"></div>
                @else
                    <div class="col-md-12" style="padding: 0px 0px 0px 100px">
                    </div>

                @endif
            @endif
        </div>
    </div>
</div>
 <!--FORM VALIDATE-->
 @if ($message = Session::get('success'))
 <div class="col-3 offset-9 fixed-bottom">
       <div class="alert alert-success alert-dismissible fade show p-4" role="alert">
           <strong>Chamado ID: {{$message}}</strong><br>Restaurado com sucesso!
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
