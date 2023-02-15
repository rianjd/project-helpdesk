@foreach ($conteudo as $chamado)
 {{-- MODAL SOLUÇÃO --}}

            <div class="modal-header text-center" >
                <h3 class="modal-title " id="exampleModalLabel">
                    <i class="bi bi-check-circle mr-3" style="color: #379d0e;"></i>Adicionar solução
                </h3>
                <button type="button" style="color: #fff" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-6">
                        <div class="contact-form">

                        <form class="mb-2" action="{{ route('acompadmin')}}" method="post"   enctype="multipart/form-data">
                            {{ csrf_field() }}

                                <div class="row ">

                                    <div class="col-md-12 ">
                                        <div class="form-group mb-3">
                                            <label for="msg" class="col-form-label sans">Solução :</label>
                                            <textarea class="form-control" name="msg" id="" cols="30" rows="4" wrap="hard" placeholder="Descreva aqui a solução..."></textarea>
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
                                    <div class="form-group col-md-7 mt-2  ">
                                        <label for="imagem" class="col-form-label sans"><i class="bi bi-paperclip mr-3" style="font-size:20px;"></i>Anexar </label>

                                        <input type="file"   id="imagem" name="imagem" multiple>
                                      </div>
                                    <div class="col-md-12 pt-5">
                                        <div class="justify-content-center">
                                            <div class="form-group text-center">
                                                <input type="submit" value="Enviar" class="btn btn-primary rounded-1 py-3 px-5"
                                                style="background:#379d0e !important; border:0;">
                                                <span class="submitting"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="id" value="{{$chamado['id']}}">
                                    <input type="hidden" name="tipo_acomp" value="solucao">

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
