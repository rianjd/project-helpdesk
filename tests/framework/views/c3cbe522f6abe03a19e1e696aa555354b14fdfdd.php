<?php $__currentLoopData = $conteudo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chamado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">
                    Chamados
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card mb-5" id="Tone">

                    
                    <h5 class="col-12 card-title text-center my-2">Solução</h5>
                    <?php $__currentLoopData = $solution; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $solu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($solu['items_id'] == $chamado['id']): ?>
                        <div class="row m-2"  id='teste' name="teste">
                            <div class="col-2 media  "  style="align-items: center;">
                                <div class="media-body">
                                    <img src="storage/profile/<?php echo e($solu['users_id']); ?>.jpg" class="mr-3" width="50" height="50" style="border-radius: 50%;" alt="...">
                                    <h5 class="mt-0"><?php echo e($tec[$solu['users_id']]); ?><i class="bi bi-chat-left-dots ml-2" style="color: rgb(95, 95, 95);"></i></h5>

                                    <span class="text-muted"><?php echo e(date('d/m/20y', strtotime($solu['date_creation']))); ?><span>
                                </div>
                            </div>

                            <div class="col-9 text-left alert alert-success m-3">
                                <p class="mb-3 "><?php echo html_entity_decode($solu['content']); ?></p>

                            </div>
                        </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    
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
                            <span class="text-muted" style="align-content:end;">Em andamento</strong><i class="bi bi-record-fill ml-1" style="color:rgb(228, 182, 32);"></i></span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\laragon\www\Bugs\resources\views/admin/modal/solucionado.blade.php ENDPATH**/ ?>