@extends('welcome')

@section('conteudo')

<div class="container-sm">
    <div class="row mt-5 pt-5">

        <!-- INFO -->
        <div class="col-md-6 mb-5">
            <div class="card pl-5 pr-5" style="box-shadow: 2px 3px 9px #b9b8b8;" >
                <div class="form p-5">
                    <h2 class="text-center">Envie aqui</h2>
                    <p class="card-text text-center mb-5 ">Suas duvidas, reclamações ou sugestões</p>
                    <form class="mb-5" action="{{ route('help.store')}}" method="post" id="tipo" name="tipo" selected="chatForm">
                    {{ csrf_field() }}

                        <div class="row ">
                            <div class="col-md-12 ">
                                <div class="form-group mb-5">
                                    <input type="text" class="form-control" name="nome" id="nome" required="" placeholder="Nome">
                                </div>
                                <div class="form-group mb-5">
                                    <div class="input-group">
                                        <input type="text" name="email" placeholder="Email" class="form-control " required>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <textarea class="form-control" name="msg" id="msg" cols="30" rows="2"  placeholder="Escreva aqui sua observação, reclamação ou ajuda..."></textarea>
                                </div>

                                <div class="justify-content-center">
                                    <div class="form-group text-center">
                                        <input type="submit" value="Enviar" class="btn btn-primary rounded-0 py-2 px-4">
                                        <span class="submitting"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="col-md-5 offset-md-1 mt-5">
            <div class="card-body mb-4" style="line-height: 2; font-size:20px;">

                <h4 class="sans">CONTATO</h4>
                <div class="divider-modern mb-2"></div>
                <p class="mb-5"><i class="bi bi-telephone mr-1"></i> (48) 3271-3090 | 3271-3093</p>

                <h4 class="sans">EMAIL</h4>
                <div class="divider-modern mb-2"></div>
                <p class="mb-5"><i class="bi bi-envelope mr-1"></i> suporte.ti@casasdaagua.com.br</p>

                <h4 class="sans">CHAT</h4>
                <div class="divider-modern mb-2"></div>
                <p class="mb-5" style="font-size: 19px;"><i class="bi bi-chat-dots mr-1"></i> @ti00.matheus | @ti00.pedro | @ti00.cassio</p>

                <h4 class="sans">GRUPOS</h4>
                <div class="divider-modern mb-2"></div>
                <p class="mb-5"><i class="bi bi-whatsapp mr-1"></i> Informações CDA - TI</p>
            </div>
        </div>


        <div class="max-width mt-5">
            <!--FORM VALIDATE-->
            @if ($message = Session::get('success'))
            <div class="col-3 offset-9 fixed-bottom">
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <strong>Formulário enviado com sucesso!</strong> <br>Sua solicitação foi enviada, aguarde o retorno.
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
              </div>
            @endif
            @if ($errors->any())
            <div class="col-3 offset-9 fixed-bottom">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Email para contato invalido!</strong> <br><br>Verifique se o email está dentro do padrão <br>Ex: "exemplo@<u>casasdaagua.com.br<u>".
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
          @endif
        </div>


    </div>
    <div class="col-md-12" style="padding: 100px"></div>
    <div class="text-center p-4" >
        © 2022 Desenvolvido por : Rian
    </div>


</div>

@endsection
