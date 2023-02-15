@foreach ($conteudo as $chamado)
    <div class="modal-header text-center">
        <h4 class="modal-title " id="exampleModalLabel">
            <i class="bi bi-send-fill mr-3" style="color: rgb(10, 48, 92)"></i>Encaminhar chamado
        </h4>
        <button type="button" style="color: #fff" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-6">
                <div class="contact-form">

                <form class="mb-2" action="{{ route('acompadmin')}}" method="post" >
                    {{ csrf_field() }}

                        <div class="row ">

                            <div class="col-md-12 ">
                                <div class="form-group mb-3">
                                    <label for="msg" class="col-form-label sans">Complemento do chamado :</label>
                                    <textarea class="form-control" name="complemento" id="" cols="30" rows="4" wrap="hard" placeholder="Descreva aqui mais detalhes sobre o chamado..."></textarea>
                                </div>
                            </div>
                            <div class="col-md-6 ">
                                <div class="form-group mb-3">
                                    <label for="email" class="col-form-label sans">Destinatário: </label>
                                    <input class="form-control" type="email" name="email" placeholder="Enviar para" required>
                                </div>
                            </div>
                            <div class="col-md-6 ">
                                <div class="form-group mb-3">
                                    <label for="copia" class="col-form-label sans">Cc: </label>
                                    <input class="form-control" type="email" name="copia" value="" placeholder="Enviar em cópia ">
                                </div>
                            </div>
                            <div class="col-md-12 pt-5">
                                <div class="justify-content-center">
                                    <div class="form-group text-center">
                                        <input type="submit" style="background-color: rgb(10, 48, 92) !important; border:0;" value="Enviar"  class="btn btn-primary rounded-1 py-3 px-5">
                                        <span class="submitting"></span>
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" name="id" value="{{$chamado['id']}}">
                            <input type="hidden" name="tipo_acomp" value="encaminhar">
                        </div>
                    </form>
                </div>
                </div>
                <div class="col-6">
                    <div class="text-left p-3 my-3 text-white rounded shadow">
                        <h5 class="p-1 " >{!! html_entity_decode($chamado['content']) !!}</h5>
                    </div>
                </div>
        </div>
    </div>
@endforeach
