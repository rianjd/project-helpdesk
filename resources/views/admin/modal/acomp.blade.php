
@foreach ($conteudo as $chamado)

      {{-- MODAL Acompanhamento --}}

      <div class="modal-header" >
        <h4 class="modal-title" id="ModalAcompanha">
            <i class="bi bi-chat-square-text mr-3"></i> Adicionar acompanhamento
        </h4>
        <button type="button" style="color: #fff" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-6">
                <div class="contact-form">
                <form class="mb-2" action="{{ route('acompadmin')}}" method="post"  enctype="multipart/form-data">
                    {{ csrf_field() }}

                        <div class="row ">

                            <div class="col-md-12 ">
                                <div class="form-group mb-3">
                                    <label for="msg" class="col-form-label sans">Acompanhamento :</label>
                                    <textarea class="form-control" name="msg" id="" cols="30" rows="2" wrap="hard" placeholder="Acompanhamento..."></textarea>
                                </div>
                            </div>

                            <div class="col-md-6 ">
                                <div class="form-group mb-3">
                                    <label for="email" class="col-form-label sans">Destinatário: </label>
                                    <input class="form-control" type="email" name="email" value="{{$chamado['email']}}">
                                </div>
                            </div>
                            <div class="col-md-6 ">
                                <div class="form-group mb-3">
                                    <label for="copia" class="col-form-label sans">Cc: </label>
                                    <input class="form-control" type="email" name="copia" value="" placeholder="Enviar em cópia ">
                                </div>
                            </div>
                            <div class="col-md-5 ">
                                <div class="form-group mb-3">
                                    <label for="time_to_resolve" class="col-form-label sans"><i class="bi bi-calendar-event mr-3"></i>Planejar: </label>

                                    <div class='input-group date' id='datetimepicker1'>
                                        <input type='date' class="form-control"  name="time_to_resolve">

                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-7  ">
                                <label for="imagem" class="col-form-label sans"><i class="bi bi-paperclip mr-3" style="font-size:20px;"></i>Anexar </label>

                                <input type="file"  id="imagem" name="imagem" multiple>
                              </div>
                            <div class="col-md-12 pt-5">
                                <div class="justify-content-center">
                                    <div class="form-group text-center">
                                        <input type="submit" value="Enviar" class="btn btn-primary rounded-1 py-3 px-5">
                                        <span class="submitting"></span>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="id" value="{{$chamado['id']}}">
                            <input type="hidden" name="tipo_acomp" value="acompanhamento">
                        </div>
                    </form>
                </div>
                </div>
                <div class="col-6">
                    <div class="text-left p-3 my-3 rounded shadow">
                        <h5 class="p-1 " >{!! html_entity_decode($chamado['content']) !!}</h5>
                    </div>
                </div>
        </div>
    </div>

@endforeach


