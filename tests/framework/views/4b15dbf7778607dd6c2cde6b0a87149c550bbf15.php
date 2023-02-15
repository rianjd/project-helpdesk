<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/colors.min.css">
    <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/fonts/simple-line-icons/style.min.css">

<?php $__env->stopSection(); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>

<script>
    function myFunc(element, status){

        let id = element.id

        $.post('<?php echo e(route("check_task")); ?>', {id: id,  "_token": "<?php echo e(csrf_token()); ?>", 'status':status}, (result) => {
            $("#conteudomodal").html(result)
        })
    }
    $(document).on('click',".task_ver", function() {
                let id = $(this).attr("data-value")
                $.post('<?php echo e(route("ver_task")); ?>', {id: id,  "_token": "<?php echo e(csrf_token()); ?>"}, (result) => {
                    $("#modal_task").html(result)
                })
    })

</script>
<?php $__env->startSection('content'); ?>
<div class="container mt-5">
    <div class="row ">
        <div class="col-xl-12 ">
            <div class="card-group">
                <div class="card m-1" style="background-color: rgba(245, 214, 207, 0.404)">
                    <div class="card-content">
                        <div class="card-body">
                        <h3><i class="icon-pencil danger  mr-3"></i>Suas tasks<span class="float-right"><a data-toggle="modal" data-target="#modalAdd"><i class="bi bi-plus secondary"></i></a></span>
                        </h3>

                            <div class="media-body mt-5">
                                <div id="conteudomodal">
                                    <?php if(count($task) > 0): ?>

                                        <?php $__currentLoopData = $task; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                <div class="p-2" style="border-bottom: solid 1px rgb(209, 209, 209)">
                                                    <?php if( $t['status'] == 1): ?>
                                                        <h4 class="check mt-2" onclick="myFunc(this,<?php echo e($t['status']); ?>)" id="<?php echo e($t['id']); ?>" style=" display: inline;">
                                                            <i class="bi bi-dot mr-2 danger"></i>
                                                            <?php echo e($t['titulo']); ?>


                                                        </h4>
                                                        <span class="float-right"><a class="task_ver danger botinho" data-toggle="modal" data-target="#modalTask" data-value="<?php echo e($t['id']); ?>">Ver<i class="bi bi-eye-fill ml-2"></i></a></span>

                                                    <?php else: ?>
                                                        <h4 class="text-muted risco check mt-2" onclick="myFunc(this,<?php echo e($t['status']); ?>)" id="<?php echo e($t['id']); ?>" style=" display: inline;">
                                                            <i class="bi bi-check-lg mr-2"></i>
                                                            <?php echo e($t['titulo']); ?></h4>
                                                        </h4>
                                                    <?php endif; ?>
                                                </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                        <h5 class="text-center">Sem tarefas</h5>
                                    <?php endif; ?>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


                <div class="card m-1" style="background-color: rgba(255, 246, 204, 0.404)">
                    <div class="card-content">

                        <div class="card-body">
                        <h3><i class="bi bi-person-lock warning  mr-3"></i>Interno TI</h3>
                        <div class="media-body mt-5">
                                <?php $__currentLoopData = $task_grupo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-12 popover__wrapper" style="align-self: center;">

                                    
                                    <div class="p-2" style="border-bottom: solid 1px rgb(209, 209, 209)">

                                        <h6 class="popover__title"><strong>#<?php echo e($t['id']); ?></strong> - <?php echo e($t['name']); ?></h6>
                                    </div>
                                    <div class="popover__content" style="width: 500px; top:50px;">
                                       <p class="popover__message">
                                            <?php echo html_entity_decode($t['content']); ?>
                                        </p>
                                    </div>
                                </div>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="card-group mt-5">
                <div class="card m-1" style="background-color: rgba(189, 224, 245, 0.404) ;max-width: 33%;">
                    <div class="card-content">

                        <div class="card-body" >
                        <h3 ><i class="bi bi-hourglass-split primary  mr-3"></i>Chamados pendentes</h3>
                        <div class="media-body mt-5">
                            <?php if(count($task_pen) > 0): ?>
                                <?php $__currentLoopData = $task_pen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <h5>Chamado pendente - <strong>ID #<?php echo e($t['id']); ?></strong></h5>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <h5 class="text-center">Sem chamados pendentes</h5>

                            <?php endif; ?>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="card m-1" style="background-color: rgba(189, 224, 245, 0.404) ;max-width: 33%;">
                    <div class="card-content">

                        <div class="card-body" >
                        <h3 ><i class="bi bi-envelope-exclamation primary  mr-3"></i>Recado da semana</h3>
                        <div class="media-body mt-5">
                                <h5 class="text-center">Jogo do BRASIL!! 28/11<br><br>Todos reunidos no auditório para ver o jogo as 13h</h5>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="card m-1" style="background-color: rgba(189, 224, 245, 0.404) ;max-width: 33%;">
                    <div class="card-content">

                        <div class="card-body" >
                        <h3 class="text-muted text-center"></i>Vazio</h3>
                        <div class="media-body mt-5">

                        </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="modalTask" >
    <div class="modal-dialog modal-xl" style="max-width: 800px;">
        <div id="modal_task">
        </div>
    </div>
</div>
<div class="modal fade" id="modalAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" style="max-width: 800px;">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title" id="exampleModalLabel">
                Criar task</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body" style="background-color: rgb(251, 254, 255)">
                <div class="contact-form">
                    <form action="<?php echo e(route('add_Task')); ?>" method="post" id="contact-form" >
                        <?php echo e(csrf_field()); ?>

                        <div class="col-md-6 input-group mb-3">
                            <input type="text" class="form-control" placeholder="Titulo" aria-label="titulo" name="titulo" aria-describedby="basic-addon1">
                        </div>

                        <div class="col-md-12 input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><h3><i class="bi bi-bookmarks"></i></h3></span>
                            </div>
                            <textarea class="form-control" aria-label="With textarea" rows="5" name="msg" placeholder="Sua tarefa..."></textarea>
                        </div>
                        <div class="col-md-12 pt-5">
                            <div class="justify-content-center">
                                <div class="form-group text-center">
                                    <input type="submit" value="Enviar" class="btn btn-primary rounded-1 py-3 px-5">
                                    <span class="submitting"></span>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.base-admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Bugs\resources\views/admin/tasks.blade.php ENDPATH**/ ?>