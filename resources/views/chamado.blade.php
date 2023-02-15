@extends('welcome')
<link rel="stylesheet" href="css/contact.css">

@section('conteudo')
    <div class="content">
        <!--FORM CORE-->

        <div class="container">
            <section class="contact-page-section">
                <div class="container">
                    <div class="sec-title">
                        <div class="title">Formulário</div>
                        <h2>Novo Chamado<i class="bi bi-ticket-perforated" style="margin-left:20px;"></i></h2>
                    </div>
                    <div class="inner-container">
                        <div class="row clearfix">

                            <!--Form Column-->
                            <div class="form-column col-md-8 col-sm-12 col-xs-12">
                                <div class="inner-column">

                                    <!--Contact Form-->
                                    <div class="contact-form">
                                        <form enctype="multipart/form-data" action="{{ route('chamados.store') }}"
                                            method="post" id="contact-form" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <div class="row clearfix">
                                                <div class="form-group col-md-6 col-sm-6 co-xs-12">

                                                    <input type="text" name="nome" id="nome" required
                                                        placeholder="Nome solicitante ">
                                                </div>
                                                <div class="form-group col-md-6 col-sm-6 co-xs-12">
                                                    <input type="email" name="email" value=""
                                                        placeholder="Email para contato " required>
                                                </div>
                                                <div class="form-group col-md-4 col-sm-6 co-xs-12 mt-4">
                                                    <label for="filial" class="col-form-label sans text-muted">Filial
                                                    </label>

                                                    <select class="form-control" name="filial" required>
                                                        <option value="">... </option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4 col-sm-6 co-xs-12 mt-4">
                                                    <label for="categoria" class="col-form-label sans text-muted">Categoria
                                                    </label>
                                                    <select class="form-control" name="categoria" required="">
                                                        <option value="">...</option>
                                                        <option title="Computador">Computador</option>
                                                        <option>Internet</option>
                                                        <option>Infra Estrutura</option>
                                                        <option>Telefonia</option>
                                                        <option>Impressora</option>
                                                        <option>Scanner</option>
                                                        <option>Aplicativos</option>
                                                        <option>Sistema lento</option>
                                                        <option>Equipamento</option>
                                                        <option>Acesso</option>
                                                        <option>Email</option>
                                                        <option>Assinatura</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4 col-sm-6 co-xs-12 mt-4">
                                                    <label for="tipo" class="col-form-label sans text-muted">Tipo
                                                    </label>
                                                    <select class="form-control" name="tipo_chamado" required="">
                                                        <option value="">...</option>
                                                        <option>Incidente</option>
                                                        <option>Assistencia</option>
                                                        <option>Solicitação</option>
                                                        <option>Outro</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-5 col-sm-6 co-xs-12 mt-4">
                                                    <label for="setor"
                                                        class="col-form-label sans text-muted">Setor</label>
                                                    <select class="form-control" name="setor" required="">
                                                        <option value="">...</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-5 offset-2 col-sm-6 co-xs-12 mt-4">
                                                    <label for="prioridade"
                                                        class="col-form-label sans text-muted">Prioridade</label>
                                                    <select class="form-control" name="prioridade" required="">
                                                        <option value="">...</option>
                                                        <option value="2" style="background-color:rgb(86, 218, 97);">
                                                            Baixa</option>
                                                        <option value="3" style="background-color:rgb(235, 221, 34);">
                                                            Media</option>
                                                        <option value="4" style="background-color:rgb(253, 70, 70);">
                                                            Alta</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-12 col-sm-12 co-xs-12 mt-4">
                                                    <textarea name="msg" id="msg" placeholder="Descreva sua solicitação..."></textarea>
                                                </div>
                                                <div class="form-group col-md-12 col-sm-12 co-xs-12 mt-4">

                                                    <i class="bi bi-paperclip" style="font-size:20px;"></i><input
                                                        type="file" id="imagem" name="imagem" multiple>
                                                </div>
                                                <div class="form-group ">
                                                    <button type="submit" class="theme-btn btn-style-one">Enviar</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!--End Contact Form-->

                                </div>
                            </div>

                            <!--Info Column-->
                            <div class="info-column col-md-4 col-sm-12 col-xs-12">
                                <div class="inner-column">
                                    <h2>Info</h2>
                                    <ul class="list-info">
                                        <li><i class="bi bi-exclamation-diamond ml-1" style="color: rgb(211, 175, 14);"></i>
                                            <p class="mb-3 ">Esse formulário <strong>NÃO</strong> é designado para
                                                solicitações relacionadas ao Core</p>
                                        </li>
                                        <li><i class="bi bi-exclamation-diamond ml-1" style="color: rgb(211, 175, 14);"></i>
                                            <p class="mb-3 ">Todos os campos são obrigatórios</p>
                                        </li>
                                        <li><i class="bi bi-exclamation-diamond ml-1" style="color: rgb(211, 175, 14);"></i>
                                            <p class="mb-3 ">Descrever o maximo de detalhes sobre a sua solicitação</p>
                                        </li>
                                        <li><i class="bi bi-exclamation-diamond ml-1" style="color: rgb(211, 175, 14);"></i>
                                            <p class="mb-3 ">Ligar para o suporte em caso de erros ou dúvidas</p>
                                        </li>

                                    </ul>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>

            <div class="row align-items-stretch justify-content-center no-gutters">
                <div class="col-md-9">

                    <div class="max-width mt-5">
                        <!--FORM VALIDATE-->
                        @if ($message = Session::get('success'))
                            <div class="col-3 offset-9 fixed-bottom">
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Formulário enviado com sucesso!</strong> <br>Sua solicitação foi enviada,
                                    aguarde o retorno.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        @endif
                        @if ($message = Session::get('error'))
                            <div class="col-3 offset-9 fixed-bottom">
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Email para contato invalido!</strong> <br><br>Verifique se o email está dentro
                                    do padrão <br>".
                                            <button type="button" class="close" data-dismiss="alert"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                </div>
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="col-3 offset-9 fixed-bottom">
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Chamado não foi enviado!</strong> <br> Favor entrar em contato com o suporte.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        @endif

                    </div>

                </div>
            </div>
        </div>
        <div class="text-center p-4">
            © 2022 Desenvolvido por : Rian
        </div>
    </div>
@endsection
