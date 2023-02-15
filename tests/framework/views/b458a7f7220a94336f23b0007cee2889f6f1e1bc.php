<link rel="stylesheet" href="css/contact.css">

<?php
    $contador_tot=0;
    $contador = 0;
    $contador_ = 0;
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>

<script>
    $(document).ready(function() {
        $(".chamado_table").change( function() {
                let filtro = $(this).val()
                $.post('<?php echo e(route("tabela_Chamado")); ?>', {filtro: filtro,  "_token": "<?php echo e(csrf_token()); ?>"}, (result) => {
                    $("#tabelachamado").html(result)
                })
        })

        $(document).on('click',".chamado_modal", function() {
                let id = $(this).attr("data-value")
                let tipo = $(this).attr('title')
                $.post('<?php echo e(route("conteudo_Chamado")); ?>', {idchamado: id,  "_token": "<?php echo e(csrf_token()); ?>", 'tipo' : tipo}, (result) => {
                    $("#conteudomodal").html(result)
                })
        })

        $(document).on('click',".filtro", function() {
                let id = $(this).attr("data-value")
                if($(this).attr('title') == 'desc'){
                    $(this).html('<i class=" bi bi-arrow-up ml-2"></i>')
                    $(this).attr('title', 'asc')
                }else{
                    $(this).html('<i class=" bi bi-arrow-down ml-2"></i>')
                    $(this).attr('title', 'desc')
                }
                let order = $(this).attr("title")


                $.post('<?php echo e(route("filtro_Chamado")); ?>', {id: id,  "_token": "<?php echo e(csrf_token()); ?>", order:order}, (result) => {
                    $("#tabelachamado").html(result)
                })
        })

        $(document).on('click',".status_tec", function() {
            let user = $(this).html()
            let id = $(this).attr("data-value")

            $.post('<?php echo e(route("alterar_Tec")); ?>', {'user': user,  "_token": "<?php echo e(csrf_token()); ?>", 'id':id}, (result) => {
                $('.a'+id).html(result)
            })
        })

        $(document).on('click',".status", function() {
            let id = $(this).attr("data-value")
            $('.status-post').attr("data-value", id);

        })

        $(document).on('click',".status-post", function() {
            let status = $(this).attr('id')
            let id = $(this).attr("data-value")
            let user = $(this).attr("name");
            $.post('<?php echo e(route("alterar_Status")); ?>', {user:user ,status: status,  "_token": "<?php echo e(csrf_token()); ?>", 'id':id}, (result) => {
                window.location.reload()
            })
        })
    })
</script>
<?php $__env->startSection('content'); ?>



    <div class="container-fluid mt-2" tabindex="-3">
        <div class="p-5 mb-5" style="background-image: url(<?php echo e(URL::asset('images/back5.jpg')); ?>); border-radius:5px;">
            <h1 class="text-center" style="color: aliceblue">Administrador de chamados<i class="fa fa-rocket ml-3" aria-hidden="true" style="color: #fbca0a;"></i></h1>
            <p class="lead text-center" style="color: rgb(224, 224, 224)">Admin chamados - Suporte TI</p>

        </div>

        <div class="row " style="margin: auto ;">
            <div class="col-12 text-center mb-4">
                <?php $__currentLoopData = $daily_chamado; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $daily): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        if (date("20y-m-d", strtotime($daily['date_creation'])) == date("2022-m-d", strtotime('-3 hour')) and $daily['status'] != 6) $contador += 1;
                        if (date("20y-m-d", strtotime($daily['date_mod'])) == date("2022-m-d", strtotime('-3 hour')) and $daily['status'] == 5) $contador_ += 1;
                    ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <h3 class="mb-2"><strong>Atividade</strong></h3>
                <h4>
                    <?php echo e($contador); ?><i class="bi bi-caret-up-fill ml-2 fadeTop4" style="color:#379d0e;" title="Abertos"></i>
                    <i class="bi bi-caret-down-fill mr-2 fadeDown" style="color:rgb(158, 8, 8)" title="Fechados"></i><?php echo e($contador_); ?>

                </h4>

            </div>
            <div class="col-md-4">
                <form action="">
                    <div class="row">
                        <i class="bi bi-filter mr-2" ></i>

                        <select class="form-control col-md-8 chamado_table" name="filtro" id="filtro">
                            <option value="" class="text-muted chamado_table">Filtro</option>
                            <option class="chamado_table" value="status-<=-4">Todos</option>
                            <option class="chamado_table" value="users_id-=-<?php echo e(Auth::user()->comment); ?>">Seus Chamados</option>
                            <option class="chamado_table" value="status-=-4">Andamento</option>
                            <option class="chamado_table" value="status-=-3">Planejados</option>
                            <option class="chamado_table" value="status-=-2">Em aberto</option>
                            <option class="chamado_table" id="chamado_table" value="interno-">Interno</option>

                        </select>
                    </div>
                </form>
            </div>

            
            <div class="col-md-12 ">
                <div class="card-header row" style="background: rgb(42, 57, 66);">
                    <div class="col-md-1 " style="color: white !important;">
                        <h4 class="text-center mt-4" >ID
                            <a class="filtro" data-value="id" title="null" style="font-size: 18;">
                                <i class="bi bi-arrow-down-up ml-2"></i>
                            </a>
                        </h4>
                    </div>
                    <div class="col-md-5">
                        <h4 class="text-left mt-4" style="color: white !important;" ><i class="fa fa-list-ul mr-2" aria-hidden="true"></i>
                            Titulo do chamado</h4>
                    </div>
                    <div class="col-md-2" style="color: white !important;">
                        <h4 class="text-center mt-4 " >Abertura
                            <a class="filtro" data-value="date_creation" title="null" style="font-size: 18;">
                                <i class="bi bi-arrow-down-up ml-2"></i>
                            </a>
                        </h4>
                    </div>

                    <div class="col-md-1" style="color: white !important;">
                        <h4 class="text-center mt-4"  >Modific.</h4>
                    </div>
                    <a class="filtro mt-4 align-self-center ml-n2" data-value="date_mod" title="null" style="font-size: 18; color: white !important;">
                        <i class="bi bi-arrow-down-up "></i>
                    </a>

                    <div class="col-md-2" style="color: white !important;">
                        <h4 class="text-center mt-4 ">Status
                            <a class="filtro " data-value="status" title="null" style="font-size: 18;">
                                <i class="bi bi-arrow-down-up ml-2"></i>
                            </a>
                        </h4>
                    </div>

                </div>
            </div>


            <div id="tabelachamado" style="width: 100%;">
                 
                <?php if(count($chamados) != 0): ?>
                    <?php $__currentLoopData = $chamados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chamado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-12" id="chamado<?php echo e($chamado['id']); ?>">
                                <?php if(date("Y-m-d H:i:s", strtotime('-3 days')) < $chamado['date_mod'] or $chamado['status'] == 3): ?>
                                    <div class="card-header row" style="background: rgb(234, 233, 233);">
                                <?php else: ?>
                                    <div class="card-header row" style="background: rgba(235, 14, 14, 0.199);">
                                <?php endif; ?>
                                        <div class="col-md-1" style="align-self: center;" >
                                            <h5 class="text-center mt-3 fonte" style="color:#e8ab1b;"><i class="fa fa-hashtag mr-1" aria-hidden="true"></i><?php echo e($chamado['id']); ?></h5>
                                        </div>
                                        <div class="col-md-5 popover__wrapper" style="align-self: center;">
                                            <a class="  mt-2  popover__title btn  chamado_modal" data-value="<?php echo e($chamado['id']); ?>" title="conteudo" data-toggle="modal" data-target="#modalGeral">
                                                <h5 class="text-left fonte" >
                                                    <?php echo e($chamado['name']); ?></h5>


                                            </a>

                                            <div class="popover__content">
                                                <p class="popover__message">
                                                    <?php

                                                    $content = explode('Observações', $chamado['content'])[1] ?? null;
                                                    if (strpos($content,'&lt;')){
                                                        echo '<div><div><div><div><strong>Chamado '.html_entity_decode($content) ;
                                                    }
                                                    else{
                                                        echo '<div><div><div><div><p><strong>Chamado '.$content;
                                                    }
                                                    ?>


                                                </p>
                                            </div>
                                        </div>



                                        <div class="col-2 text-center" style="align-self: center;">
                                            <h5 class="mt-2"><?php echo e(date('d/m/20y', strtotime($chamado['date_creation']))); ?></h5>
                                        </div>

                                        <div class="col-1 text-center" style="align-self: center;">

                                                <?php if(date("Y-m-d H:i:s", strtotime('-3 days')) < $chamado['date_mod'] or $chamado['status'] == 3): ?>
                                                    <h5 class=" mt-2"><?php echo e(date('d/m/20y', strtotime($chamado['date_mod']))); ?></h5>
                                                <?php else: ?>
                                                    <h5 class="mt-2 alarme" style="color:rgb(158, 8, 8)"><?php echo e(date('d/m/20y', strtotime($chamado['date_mod']))); ?></h5>

                                                        <?php if(date("m") == date('m', strtotime($chamado['date_mod']))): ?>
                                                            <span class="text-muted alarme"><h6><?php echo e(date("d") - date('d', strtotime($chamado['date_mod']))); ?> dias s/ interação</h6></span>
                                                        <?php else: ?>
                                                            <span class="text-muted ">(Há muito tempo)</span>
                                                        <?php endif; ?>
                                                <?php endif; ?>


                                        </div>



                                        
                                        <?php if($chamado['status'] == '2' ): ?>
                                            <div class="col-md-2 text-center" style="align-self: center;">
                                                <span class="text-muted status" data-toggle="modal" data-target="#modalStatus" data-value="<?php echo e($chamado['id']); ?>" style="align-items: center;">
                                                    Aberto</strong>
                                                    <i class="bi bi-record ml-1" style="color:rgb(83, 182, 17);"></i>
                                                </span>


                                            </div>

                                        <?php endif; ?>
                                        <?php if($chamado['status'] == '3' ): ?>

                                            <div class="col-md-2  text-center pt-2 popover__wrapper  status" data-toggle="modal" data-target="#modalStatus" data-value="<?php echo e($chamado['id']); ?>" style="align-self: center;"><span class="text-muted popover__title" style="align-items: center;">Planejado</strong><i class="bi bi-clock-fill ml-2" style="color:rgb(38, 139, 197);"></i></span>
                                                <div class="row justify-content-center">
                                                    <?php if($chamado['time_to_resolve'] != null): ?>
                                                        <div class="popover__content" style="left: 90px;">
                                                            <p class="popover__message">
                                                                <?php echo e(date('d/m/20y', strtotime($chamado['time_to_resolve']))); ?>

                                                            </p>
                                                        </div>
                                                    <?php endif; ?>
                                                    <?php $__currentLoopData = $sup; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $supp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($chamado['id'] == $supp['tickets_id']): ?>
                                                            <span class="category-tags mt-2 ">
                                                                <div class="category " style="background: #2cb2ffa1;">
                                                                    <?php echo e($tec[$supp['suppliers_id']]); ?>

                                                                </div>
                                                            </span>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <?php if($chamado['status'] == '4'): ?>
                                            <div class="col-md-2  text-center pt-2 " style="align-self: center;" ><span class="text-muted status" style="align-items: center;" data-toggle="modal" data-target="#modalStatus" data-value="<?php echo e($chamado['id']); ?>">Andamento</strong><i class="bi bi-record-fill ml-1" style="color:rgb(228, 182, 32);"></i></span>
                                                <div class="row justify-content-center">

                                                    
                                                    <?php $__currentLoopData = $tkt; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($chamado['id'] == $item['tickets_id']): ?>
                                                            <span class="category-tags mt-2 atribuido dropdown">
                                                                <div class="category a<?php echo e($chamado['id']); ?>"  role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    <?php echo e($tec[$item['users_id']]); ?>

                                                                </div>
                                                                <div class="dropdown-menu " aria-labelledby="dropdownMenuButton">

                                                                    <a class="dropdown-item status_tec" data-value="<?php echo e($chamado['id']); ?>">Rian</a>
                                                                    <a class="dropdown-item status_tec" data-value="<?php echo e($chamado['id']); ?>">Matheus</a>
                                                                    <a class="dropdown-item status_tec" data-value="<?php echo e($chamado['id']); ?>">Cassio</a>
                                                                    <a class="dropdown-item status_tec" data-value="<?php echo e($chamado['id']); ?>">Alan</a>
                                                                    <a class="dropdown-item status_tec" data-value="<?php echo e($chamado['id']); ?>">Paulo</a>


                                                                </div>
                                                            </span>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                            </div>

                                        <?php endif; ?>

                                        <div class="row justify-content-center fonte" style="align-self: center;">
                                            <a  type="button" class="botinho chamado_modal" data-value="<?php echo e($chamado['id']); ?>"   data-toggle="modal" data-target="#modalGeral" title="solucao">
                                                <h5  class="text-center" style="color: green;"><i class="bi bi-check-circle"></i></h4>
                                            </a>
                                            <a type="button" class="botinho chamado_modal" data-value="<?php echo e($chamado['id']); ?>"   data-toggle="modal" data-target="#modalGeral" title="acomp">
                                                <h5 class="text-center"><i class="bi bi-chat-square-text"></i></h4>
                                            </a>
                                            <a type="button" class="botinho chamado_modal" data-value="<?php echo e($chamado['id']); ?>"  data-toggle="modal" data-target="#modalGeral" title="lupa">
                                                <h5 class="text-center" style="color: rgb(3, 131, 216);"><i class="bi bi-search"></i></h4>
                                            </a>
                                            <a type="button" class="botinho chamado_modal" data-value="<?php echo e($chamado['id']); ?>"   data-toggle="modal" data-target="#modalGeral" title="encaminhar">
                                                <h5 class="text-center" style="color: rgb(34, 49, 133);"><i class="bi bi-send-fill"></i></h4>
                                            </a>
                                        </div>

                                    </div>
                            </div>
                            <input type="hidden" <?php echo e($contador = 1); ?>>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php else: ?>
                <div class="col-md-12" id='NONE' name='NONE' style="margin-top: 12rem;">
                    <h1 class="text-center" style="color: #777;"><i class="bi bi-bell-slash mr-3"></i>Não existem chamados com o filtro selecionado!</h1>
                </div>
                <div class="col-md-12" style="padding: 140px"></div>
                <?php endif; ?>
            </div>

        </div>
        
        <div class= "modal fade " id="modalGeral" tabindex="-1"  aria-hidden="true">
            <div class="modal-dialog modal-xl" style="width: 1200px; left:9%;">
                <div class="modal-content">
                    <div id="conteudomodal">

                    </div>
                </div>
            </div>
        </div>

        

        <div class= "modal fade " id="modalStatus" tabindex="1"  aria-hidden="true">
            <div class="modal-dialog modal-xl" style="max-width: 550px;">
                <div class="modal-content">
                    <div id="status-conteudo">
                        <div class="modal-header">
                            <h4 class="modal-title" id="exampleModalLabel">
                                Selecionar status
                            </h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row justify-content-center dropdown">
                                        <a type="button" class="btn btn-success btn-sm mx-2 status-post" name="" id="2">Aberto<i class="bi bi-circle ml-2"></i></a>
                                        <a class="btn btn-warning btn-sm mx-2" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Em andamento<i class="bi bi-chevron-compact-down ml-2"></i></a>
                                        <div class="dropdown-menu " aria-labelledby="dropdownMenuButton">

                                            <a class="dropdown-item status-post" id="4" name="Rian" data-value="<?php echo e($chamado['id']); ?>">Rian</a>
                                            <a class="dropdown-item  status-post" id="4" name="Matheus" data-value="<?php echo e($chamado['id']); ?>">Matheus</a>
                                            <a class="dropdown-item status-post" id="4" name="Cassio" data-value="<?php echo e($chamado['id']); ?>">Cassio</a>
                                            <a class="dropdown-item status-post" id="4" name="Alan" data-value="<?php echo e($chamado['id']); ?>">Alan</a>
                                            <a class="dropdown-item status-post" id="4" name="Paulo" data-value="<?php echo e($chamado['id']); ?>">Paulo</a>

                                        </div>
                                        <a class="btn btn-danger btn-sm  mx-2 status-post" name="" id="6">Fechado <i class="bi bi-x-circle ml-2"></i></a>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
    <!--FORM VALIDATE-->
    <?php if($message = Session::get('success')): ?>
    <div class="col-3 offset-9 fixed-bottom">
        <div class="alert alert-success alert-dismissible fade show p-4" role="alert">
            <strong>Chamado ID: <?php echo e($message); ?></strong><br>Enviado com sucesso!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
    <?php endif; ?>

    
    <div class="text-center p-4" >
        © 2022 Desenvolvido por : Casas da Água
    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.base-admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Bugs\resources\views/admin.blade.php ENDPATH**/ ?>