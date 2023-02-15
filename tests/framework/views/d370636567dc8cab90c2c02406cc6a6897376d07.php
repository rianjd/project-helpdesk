<link rel="stylesheet" href="css/contact.css">
<?php $__env->startSection('conteudo'); ?>
<div class="content">
<!--FORM CORE-->

<div class="container">
    <section class="contact-page-section">
        <div class="container">
                <div class="sec-title">
                    <div class="title"><img src="images/logo-mattermost.png" width="40" height="40" class="d-inline-block align-top m-1" alt=""></div>
                    <h2 style="color: rgb(43, 43, 43);">Novo Chat <i class="bi bi-person-plus-fill" style="margin-left:20px; color:rgb(19, 200, 224);"></i></h2>
                </div>
                <div class="inner-container">
                    <div class="row clearfix">

                    <!--Form Column-->
                        <div class="form-column col-md-8 col-sm-12 col-xs-12">
                            <div class="inner-column">

                            <!--Contact Form-->
                                <div class="contact-form">
                                    <form action="<?php echo e(route('chamados.store')); ?>" method="post" id="contact-form">
                                    <?php echo e(csrf_field()); ?>

                                        <div class="row clearfix">
                                            <div class="form-group col-md-6 col-sm-6 co-xs-12">

                                                <input  type="text" name="nome" id="nome" required placeholder="Nome do solicitante ">
                                            </div>
                                            <div class="form-group col-md-6 col-sm-6 co-xs-12">
                                                <input type="email" name="email" value="" placeholder="Email para contato " required>
                                            </div>
                                            <div class="divider-modern my-4"></div>
                                            <h3 class="col-12 text-center sec-title sans"> Informações do Usuário</h3>
                                            <div class="form-group col-md-12 col-sm-6 co-xs-12">
                                                <input  type="text" name="nome_user" id="nome_user" required placeholder="Nome completo">
                                            </div>

                                            <div class="form-group col-md-5 col-sm-6 co-xs-12 mt-4">
                                                <label for="filial" class="col-form-label sans text-muted">Filial </label>

                                                <select class="form-control" name="filial" required>
                                                    <option value="">... </option>
                                                    <option value="1">99 - Matriz</option>
                                                    <option value="2">01 - Joinville</option>
                                                    <option value="3">02 - Biguaçu</option>
                                                    <option value="4">03 - Palhoça</option>
                                                    <option value="5">04 - Itajaí</option>
                                                    <option value="6">06 - Balneario</option>
                                                    <option value="7">08 - Centro</option>
                                                    <option value="8">09 - Trindade</option>
                                                    <option value="9">11 - Joinville(America)</option>
                                                    <option value="10">12 - Blumenau</option>
                                                    <option value="11">21 - Estreito</option>
                                                    <option value="12">24 - Rio do Sul</option>
                                                    <option value="13">26 - Itapema</option>
                                                    <option value="14">27 - Jaraguá</option>
                                                    <option value="15">28 - Blumenau</option>
                                                    <option value="16">29 - Tijucas</option>
                                                    <option value="17">30 - Brusque</option>
                                                    <option value="18">32 - Vargem Grande</option>
                                                    <option value="19">34 - Porto Belo</option>
                                                    <option value="20">35 - Campeche</option>
                                                    <option value="21">36 - Itajaí</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-md-5 col-sm-6 co-xs-12 mt-4">
                                                <label for="setor" class="col-form-label sans text-muted">Setor</label>
                                                <select class="form-control" name="setor" required="">
                                                <option value="">...</option>
                                                <option>Crediário</option>
                                                <option>Pacote</option>
                                                <option>Caixa</option>
                                                <option>Vendas</option>
                                                <option>Logística</option>
                                                <option>Depósito</option>
                                                <option>Contabilidade</option>
                                                <option>Vendas Online</option>
                                                <option>RH</option>
                                                <option>Marketing</option>
                                                <option>Financeiro/Contas</option>
                                                <option>Compras</option>

                                                </select>
                                              </div>

                                            <div class="form-group col-md-12 col-sm-12 co-xs-12 mt-4">
                                                <textarea name="msg" id="msg" placeholder="Observações"></textarea>
                                            </div>
                                            <div class="form-group col-md-12 col-sm-12 co-xs-12 mt-4">
                                                <button type="submit" class="theme-btn btn-style-one">Enviar</button>
                                            </div>
                                        </div>
                                        <input type="hidden" id="tipo" name="tipo" value="Chat">

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
                                    <li><i class="bi bi-exclamation-diamond ml-1" style="color: rgb(211, 175, 14);"></i> <p class="mb-3">Esse formulário é designado APENAS para solicitações de login</p></li>
                                    <li><i class="bi bi-exclamation-diamond ml-1" style="color: rgb(211, 175, 14);"></i> <p class="mb-3">Caso deseje realizar um ajuste em um usuário já existente <a href="/chatajuste">clique aqui</a></p></li>

                                    <li><i class="bi bi-exclamation-diamond ml-1" style="color: rgb(211, 175, 14);"></i> <p class="mb-3">Todos os campos são obrigatórios</p>
                                    </li>
                                    <li><i class="bi bi-exclamation-diamond ml-1" style="color: rgb(211, 175, 14);"></i> <p class="mb-3">Ligar para o suporte em caso de erros ou dúvidas</p></li>

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
                <?php if($message = Session::get('success')): ?>
                <div class="col-3 offset-9 fixed-bottom">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Formulário enviado com sucesso!</strong> <br>Sua solicitação foi enviada, aguarde o retorno.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if($errors->any()): ?>
                <div class="col-3 offset-9 fixed-bottom">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Email para contato invalido!</strong> <br><br>Verifique se o email está dentro do padrão <br>Ex: "exemplo@<u>casasdaagua.com.br<u>".
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                <?php endif; ?>

            </div>

        </div>
        </div>
    </div>
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
        © 2022 Desenvolvido por : Casas da Água
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Bugs\resources\views/chat.blade.php ENDPATH**/ ?>