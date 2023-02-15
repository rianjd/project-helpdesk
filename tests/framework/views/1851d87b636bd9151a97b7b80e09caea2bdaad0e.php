<?php $__currentLoopData = $conteudo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chamado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="card mb-5" id="Tone">

    

    <h5 class="col-12 card-title text-center my-2">Acompanhamento</h5>
    <div class="row m-2"  id='teste' name="teste">
    <?php $__currentLoopData = $acomp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $acompanha): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($acompanha['items_id'] == $chamado['id']): ?>

            <div class="col-2 media  "  style="align-items: center;">
                <div class="media-body">

                    <img src="storage/profile/<?php echo e($acompanha['users_id']); ?>.jpg" class="mr-3" width="50" height="50" style="border-radius: 50%;" alt="...">
                    <h5 class="mt-0"><?php echo e($tec[$acompanha['users_id']]); ?><i class="bi bi-chat-left-dots ml-2" style="color: rgb(95, 95, 95);"></i></h5>

                    <span class="text-muted"><?php echo e(date('d/m/20y', strtotime($acompanha['date_creation']))); ?><span>
                </div>
            </div>

            <div class="col-9 text-left alert alert-info ">
                <p class="mb-3 "><?php echo html_entity_decode($acompanha['content']); ?></p>
                <?php if($acompanha['status']==2): ?>
                    <div class="p-2 text-right">
                        <span>Enviado para: <strong>LUPA</strong><span>
                    </div>
                <?php endif; ?>
            </div>


        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <div class="col-1">
            <a type="button" class="botinho"  data-toggle="modal" data-target="#modalAgenda<?php echo e($chamado['id']); ?>" title="Agenda">
                <h4 class="float-right" style="color: rgb(247, 189, 0);"><i class="bi bi-calendar-date m-3"></i></h4>
            </a>
        </div>
    </div>
    
    <div class="card-body text-left ">
        <h5 class="mb-5"><?php echo html_entity_decode($chamado['content']); ?></h5>
        <h5 class="text-center">Data de abertura:  <strong><?php echo e(date('d/m/20y', strtotime($chamado['date_creation']))); ?></strong></h5>
    </div>
</div>
<div class="card-footer row">
    <div class="col-md-6">
        <?php if($chamado['status'] == '2' ): ?>
            <span class="text-muted" style="align-content:end;">Aberto</strong><i class="bi bi-record-fill ml-1" style="color:rgb(82, 194, 7);"></i></span>
        <?php endif; ?>
        <?php if($chamado['status'] == '3'): ?>
            <span class="text-muted " style="align-content:end;">Planejado</strong><i class="bi bi-calendar2-check ml-1" style="color:rgb(32, 189, 228);"></i><strong>
                <?php if($chamado['time_to_resolve'] != null): ?> - <?php echo e(date('d/m/Y' , strtotime($chamado['time_to_resolve']))); ?>

                <?php else: ?> - Lupa
                <?php endif; ?></strong></span>
        <?php endif; ?>
        <?php if($chamado['status'] == '4'): ?>
            <span class="text-muted" style="align-content:end;">Em andamento</strong><i class="bi bi-record-fill ml-1" style="color:rgb(228, 182, 32);"></i></span>
        <?php endif; ?>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\laragon\www\Bugs\resources\views/admin/conteudo.blade.php ENDPATH**/ ?>