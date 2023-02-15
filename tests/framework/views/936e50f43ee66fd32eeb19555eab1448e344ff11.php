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
                        <span class="text-muted alarme"><h6><?php echo e(date("d") - date('d', strtotime($chamado['date_mod']))); ?> dias sem interação</h6></span>
                    <?php else: ?>
                        <span class="text-muted ">(Mês passado)</span>
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
        <div class="col-md-2  text-center pt-2" style="align-self: center;"><span class="text-muted" style="align-items: center;">Andamento</strong><i class="bi bi-record-fill ml-1" style="color:rgb(228, 182, 32);"></i></span>
            <div class="row justify-content-center">

                
                <?php $__currentLoopData = $tkt; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($chamado['id'] == $item['tickets_id']): ?>
                        <span class="category-tags mt-2 atribuido dropdown">
                            <div class="category <?php echo e($chamado['id']); ?>"  role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php echo e($tec[$item['users_id']]); ?>

                            </div>
                            <div class="dropdown-menu " aria-labelledby="dropdownMenuButton">

                                <a class="dropdown-item" data-value="<?php echo e($chamado['id']); ?>">Rian</a>
                                <a class="dropdown-item" data-value="<?php echo e($chamado['id']); ?>">Matheus</a>
                                <a class="dropdown-item" data-value="<?php echo e($chamado['id']); ?>">Cassio</a>
                                <a class="dropdown-item" data-value="<?php echo e($chamado['id']); ?>">Alan</a>

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
<?php /**PATH C:\laragon\www\Bugs\resources\views/admin/modal/chamado_unico.blade.php ENDPATH**/ ?>