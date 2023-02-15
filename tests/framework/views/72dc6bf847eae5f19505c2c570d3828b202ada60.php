<div style="background-image: url(images/fundo-neutro.png); max-height:200px;">

    <section id="stats-subtitle">
        <div class="row justify-content-center">
                <div class="col-12 mt-3 mb-3 text-center">
                    <h3 class="text-uppercase sans" style="color: aliceblue;">Portal de Chamados<i style="font-size:40px; color:rgb(255, 217, 4)" class="bi bi-wrench ml-3"></i></h3>
                    <p class="mr-5" style="color:rgb(225, 233, 241)">Abertura de chamados</p>
                </div>
        </div>
    </section>
</div>

<link rel="stylesheet" href="css/home.css">

<?php $__env->startSection('conteudo'); ?>

    <div class="container-fluid" style="padding-top: 50px;">
        <div class="row justify-content-center">

            <!-- INFO -->

            

            <div class="col-md-4 mb-2">


                    <!-- CARD CORE-->
                    <div class="card mb-4 shadow-sm fadeInRight" id="card">
                        <div class="color-header" style="background-image:linear-gradient(to right, rgb(9, 48, 85),rgb(11, 75, 134));"></div>
                        <div class="logo" style="background-image: url(images/corebusiness_1200x300.png);"></div>
                        <div class="card_title mb-3 sans"><h4>Solicitações CoreBusiness<i class="bi bi-tools ml-2 "></i></h4></div>
                        <div class="card-description" >
                            <p>Criar um novo login ou ajustar um usuário ja existente no sistema</p>
                            <a class="btn btn-primary mb-4 sans" style="background-color: rgb(9, 59, 105) !important;" data-toggle="modal" data-target="#modalCore"><i class="bi bi-arrow-return-right mr-1 yellow" ></i>Abrir</a>
                        </div>
                    </div>

            </div>
            <div class="col-md-4 mb-2">

                    <!-- CARD CHAMADOS-->
                    <div class="card mb-4 shadow-sm fadeInRight" id="card">
                        <div class="color-header" style="background-image:linear-gradient(to left, rgb(9, 48, 85),rgb(13, 76, 134));"></div>
                        <div class="logo" style="background-image: url(images/logo-preto.png);"></div>
                        <div class="card_title mb-3 sans"><h4>Abertura de chamados - Suporte TI<i class="bi bi-ticket-perforated ml-2"></i></h4></div>
                        <div class="card-description" >
                            <p>Abrir chamados para assistencia ou solicitações diretamente com o TI.</p>
                            <a href="/chamado" class="btn btn-primary mb-4 sans" style="background-color: rgb(9, 59, 105) !important;"><i class="bi bi-arrow-return-right mr-1 yellow"></i>Abrir</a>
                        </div>
                    </div>

            </div>
        </div>
        <div class="row justify-content-center">
            
            <div class="col-md-4 mb-2">

                <!-- CARD EMAIL-->
                    <div class="card mb-4 shadow-sm fadeInRight2" id="card">
                        <div class="color-header" style="background-image:linear-gradient(to right, rgb(11, 52, 90),rgb(13, 81, 145));"></div>
                        <div class="logo" style="background-image: url(images/zimbra-black.png);"></div>
                        <div class="card_title mb-3">Solicitação de email<i class="bi bi-envelope-fill ml-2"></i></div>
                        <div class="card-description" >
                            <a class="btn btn-primary mb-4" style="background-color: rgb(9, 59, 105) !important;" data-toggle="modal" data-target="#modalEmail"><i class="bi bi-arrow-return-right mr-1 yellow"></i>Abrir</a>
                        </div>
                    </div>

            </div>
            <div class="col-md-4 mb-2">

                <!-- CARD CHAT-->
                    <div class="card mb-4 shadow-sm fadeInRight2" id="card">
                        <div class="color-header" style="background-image:linear-gradient(to left, rgb(11, 52, 90),rgb(13, 81, 145));"></div>
                        <div class="logo" style="background-image: url(images/logo-mattermost_.png);"></div>
                        <div class="card_title mb-3">Solicitação de Chat<i class="bi bi-chat-square-dots-fill ml-2"></i></div>
                        <div class="card-description" >
                            <a class="btn btn-primary mb-4" style="background-color: rgb(9, 59, 105) !important;" data-toggle="modal" data-target="#modalChat"><i class="bi bi-arrow-return-right mr-1 yellow"></i>Abrir</a>
                        </div>
                    </div>
            </div>
        </div>

        <!-- Modal Core -->
        <div class="modal fade" id="modalCore" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel"><img src="images/corebusiness_1200x300.png" width="120" height="30" class="align-top mt-1 mr-2" alt="">
                        Solicitações</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body" style="background-color: rgb(251, 254, 255)">
                        <div class="card mb-5 shadow-sm" id="Tone">
                            <div class="card-body text-center">
                                <h5 class="card-title"><i class="bi bi-person-plus-fill mr-1"></i>Criação de login</h5>
                                <p class="card-text mb-3">Enviar informações do colaborador para a criação de um login novo.</p>
                                <a href="/core" class="btn btn-primary"  >Solicitar login</a>
                            </div>
                        </div>
                        <div class="card mb-5 shadow-sm">
                            <div class="card-body text-center " >
                                <h5 class="card-title"><i class="bi bi-gear mr-1"></i>Ajustes de usuário</h5>
                                <p class="card-text mb-3">Alterar permissões, login, senha, entre outras solicitações referentes a usuários já existentes</p>
                                <a href="/coreajuste" class="btn btn-primary">Abrir </a>
                            </div>
                        </div>
                            <div class="card-body text-center alert alert-warning">
                                <h5 class="card-title"><i class="bi bi-exclamation-diamond mr-1 mr-1" style="color: rgb(211, 175, 14);"></i>IMPORTANTE</h5>
                                <p class="mb-3">Esse formulário não é destinado para SUPORTE operacional do sistema, caso seja isso que esteja procurando, favor enviar no grupo de Whatsapp de Duvidas.</p>
                            </div>
                    </div>
                </div>
            </div>
        </div>


        

        <!-- Modal EMAIL -->
        <div class="modal fade" id="modalEmail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel"><img src="images/zimbra-black.png" width="120" height="30" class="align-top mt-1 mr-2" alt="">
                        Email</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body" style="background-color: rgb(251, 254, 255)">
                        <div class="card mb-5 shadow-sm" id="Tone">
                            <div class="card-body text-center">
                                <h5 class="card-title"><i class="bi bi-person-plus-fill mr-1"></i>Criação de Email</h5>
                                <p class="card-text mb-3">Enviar informações do colaborador para a criação de um email novo.</p>
                                <a href="/email" class="btn btn-primary"  >Solicitar email</a>
                            </div>
                        </div>
                        <div class="card mb-5 shadow-sm">
                            <div class="card-body text-center " >
                                <h5 class="card-title"><i class="bi bi-gear mr-1"></i>Ajustes de usuário</h5>
                                <p class="card-text mb-3">Alterar senha de um email já existente</p>
                                <a href="/emailajuste" class="btn btn-primary">Abrir </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal CHAT -->
        <div class="modal fade" id="modalChat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel"><img src="images/logo-mattermost.png" width="30" height="30" class="align-top mr-2" alt="">
                        Chat CDA - Messenger</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body" style="background-color: rgb(251, 254, 255)">
                        <div class="card mb-5 shadow-sm" id="Tone">
                            <div class="card-body text-center">
                                <h5 class="card-title"><i class="bi bi-person-plus-fill mr-1"></i>Criação de Chat</h5>
                                <p class="card-text mb-3">Enviar informações do colaborador para a criação de chat novo.</p>
                                <a href="/chat" class="btn btn-primary"  >Solicitar chat</a>
                            </div>
                        </div>
                        <div class="card mb-5 shadow-sm">
                            <div class="card-body text-center " >
                                <h5 class="card-title"><i class="bi bi-gear mr-1"></i>Ajustes de usuário</h5>
                                <p class="card-text mb-3">Alterar login, senha, email de um login já existente</p>
                                <a href="/chatajuste" class="btn btn-primary ">Abrir </a>
                            </div>
                        </div>
                        <div class="card shadow-sm">
                            <div class="card-body text-center ">
                                <h5 class="card-title"><i class="bi bi-trash mr-1"></i>Desativar chat</h5>
                                <p class="card-text mb-3">Enviar informações do chat que será desativado.</p>
                                <a href="/chatajuste" class="btn btn-primary">Ir ao formulario</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Modal CHAT -->
        <div class="modal fade" id="modalAcomp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header ">
                        <h4 class="modal-title " id="exampleModalLabel">
                            <i class="bi bi-ticket-perforated ml-5 mr-4" style="color: rgb(255, 196, 0); "></i>Acompanhamento de chamados - Suporte TI</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="container ml-3">
                        <div class="modal-body row">
                            <div class="col-11 my-5 text-center"  id="si"><h3><i class="bi bi-house-door-fill mr-3"></i>Selecione sua filial </h3></a>
                            </div>
                            <div class=" mb-5 col-4" id="si"><a class="btn  btn-block text-left border-bottom" style="width: 80%;" style="width: 80%;" href="getChamados2" ><h5>Filial 01 - Joinville</h5></a>
                            </div>
                            <div class=" mb-5 col-4" id="si"><a class="btn  btn-block text-left border-bottom" style="width: 80%;" href="getChamados3" ><h5>Filial 02 - Biguaçu</h5></a>
                            </div>
                            <div class=" mb-5 col-4" id="si"><a class="btn  btn-block text-left border-bottom" style="width: 80%;"  style="width: 80%;" href="getChamados4" ><h5>Filial 03 - Palhoça</h5></a>
                            </div>
                            <div class=" mb-5 col-4" id="si"><a class="btn  btn-block text-left border-bottom" style="width: 80%;"  style="width: 80%;" href="getChamados5" ><h5>Filial 04 - Itajaí</h5></a>
                            </div>
                            <div class=" mb-5 col-4" id="si"><a class="btn  btn-block text-left border-bottom" style="width: 80%;"   href="getChamados6" ><h5>Filial 06 - Balneario</h5></a>
                            </div>
                            <div class=" mb-5 col-4" id="si"><a class="btn  btn-block text-left border-bottom" style="width: 80%;"   href="getChamados7" ><h5>Filial 08 - Centro</h5></a>
                            </div>
                            <div class=" mb-5 col-4" id="si"><a class="btn  btn-block text-left border-bottom" style="width: 80%;"   href="getChamados8" ><h5>Filial 09 - Trindade</h5></a>
                            </div>
                            <div class=" mb-5 col-4" id="si"><a class="btn  btn-block text-left border-bottom" style="width: 80%;"   href="getChamados9" ><h5>Filial 11 - Joinville</h5></a>
                            </div>
                            <div class=" mb-5 col-4" id="si"><a class="btn  btn-block text-left border-bottom" style="width: 80%;"   href="getChamados10" ><h5>Filial 12 - Blumenau</h5></a>
                            </div>
                            <div class=" mb-5 col-4" id="si"><a class="btn  btn-block text-left border-bottom" style="width: 80%;"   href="getChamados11" ><h5>Filial 21 - Estreito</h5></a>
                            </div>
                            <div class=" mb-5 col-4" id="si"><a class="btn  btn-block text-left border-bottom" style="width: 80%;"   href="getChamados12" ><h5>Filial 24 - Rio do Sul</h5></a>
                            </div>
                            <div class=" mb-5 col-4" id="si"><a class="btn  btn-block text-left border-bottom" style="width: 80%;"   href="getChamados13" ><h5>Filial 26 - Itapema</h5></a>
                            </div>
                            <div class=" mb-5 col-4" id="si"><a class="btn  btn-block text-left border-bottom" style="width: 80%;"   href="getChamados14" ><h5>Filial 27 - Jaraguá</h5></a>
                            </div>
                            <div class=" mb-5 col-4" id="si"><a class="btn  btn-block text-left border-bottom" style="width: 80%;"   href="getChamados15" ><h5>Filial 28 - Blumenau</h5></a>
                            </div>
                            <div class=" mb-5 col-4" id="si"><a class="btn  btn-block text-left border-bottom" style="width: 80%;"   href="getChamados16" ><h5>Filial 29 - Tijucas</h5></a>
                            </div>
                            <div class=" mb-5 col-4" id="si"><a class="btn  btn-block text-left border-bottom" style="width: 80%;"   href="getChamados17" ><h5>Filial 30 - Brusque</h5></a>
                            </div>
                            <div class=" mb-5 col-4" id="si"><a class="btn  btn-block text-left border-bottom" style="width: 80%;"   href="getChamados18" ><h5>Filial 32 - Vargem</h5></a>
                            </div>
                            <div class=" mb-5 col-4" id="si"><a class="btn  btn-block text-left border-bottom" style="width: 80%;"   href="getChamados19" ><h5>Filial 34 - Porto Belo</h5></a>
                            </div>
                            <div class=" mb-5 col-4" id="si"><a class="btn  btn-block text-left border-bottom" style="width: 80%;"   href="getChamados20" ><h5>Filial 35 - Campeche</h5></a>
                            </div>
                            <div class=" mb-5 col-4" id="si"><a class="btn  btn-block text-left border-bottom" style="width: 80%;"   href="getChamados21" ><h5>Filial 36 - Itajaí CD</h5></a>
                            </div>
                            <div class=" mb-5 col-4" id="si"><a class="btn  btn-block text-left border-bottom" style="width: 80%;"   href="getChamados1" ><h5>Filial 99 - Matriz</h5></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Bugs\resources\views/home.blade.php ENDPATH**/ ?>