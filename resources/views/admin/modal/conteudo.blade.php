@foreach ($conteudo as $chamado)
<div class="modal-header">
    <h4 class="modal-title" id="exampleModalLabel">
        Chamados
    </h4>
    <button type="button" id="fechar_modal" style="color: #fff" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body" >


    <div class="card mb-5 " id="Tone">

        {{-- ACOMPANHAMENTO --}}

        <h5 class="col-12 card-title text-center my-2">Acompanhamento</h5>
        <div class="row m-2"  id='teste' name="teste">
        @foreach($acomp as $acompanha)
            @if ($acompanha['items_id'] == $chamado['id'])

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


            @endif
        @endforeach

        </div>
        {{-- CONTEUDO CHAMADO --}}
        <div class="card-body text-left " >
            <h5 class="mb-5" style=" color:#383838">{!! html_entity_decode($chamado['content']) !!}</h5>

            <h5 class="text-center">Data de abertura:  <strong>{{date('d/m/20y', strtotime($chamado['date_creation'])) }}</strong></h5>
        </div>
    </div>
    <div class="card-footer row">
        <div class="col-md-9">
            @if  ($chamado['status'] == '2' )
                <span class="" style="align-content:end; color:rgb(51, 214, 100);">Aberto</strong><i class="bi bi-record-fill ml-1"></i></span>
            @endif
            @if ($chamado['status'] == '3')
                <span class="text-muted " style="align-content:end;">Planejado</strong><i class="bi bi-calendar2-check ml-1" style="color:rgb(0, 204, 255);"></i><strong>
                    </strong></span>
            @endif
            @if ($chamado['status'] == '4')
                <span class="text-muted" style="align-content:end;">Em andamento</strong><i class="bi bi-record-fill ml-1" style="color:rgb(255, 203, 30);"></i></span>
            @endif
        </div>
        <div class="col-md-3">
            <div class="row justify-content-center fonte" style="align-self: center;">
                @if ($chamado['users_id_recipient'] == 56)
                    <a  type="button" class="botinho chamado_modal" data-value="{{$chamado['id']}}" title="solucao">
                        <h5  class="text-center" style="color: rgb(3, 187, 3);"><i class="bi bi-check-circle"></i></h4>
                    </a>
                    <a type="button" class="botinho chamado_modal" data-value="{{$chamado['id']}}" title="acomp">
                        <h5 class="text-center" style="color:rgb(247, 189, 0);"><i class="bi bi-chat-square-text"></i></h4>
                    </a>

                @endif

                <a type="button" class="botinho chamado_modal" data-value="{{$chamado['id']}}" title="encaminhar">
                    <h5 class="text-center" style="color: rgb(230, 230, 230);"><i class="bi bi-send-fill"></i></h4>
                </a>
                <a type="button" class="botinho chamado_modal"  data-value="{{$chamado['id']}}" title="agenda">
                    <h5 class="text-center" style="color: rgb(218, 218, 218);"><i class="bi bi-calendar-date"></i></h5>
                </a>
            </div>

        </div>
    </div>
</div>

@endforeach
