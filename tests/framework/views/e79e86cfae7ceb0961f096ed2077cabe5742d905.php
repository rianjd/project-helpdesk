<?php $__currentLoopData = $task; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel"><?php echo e($t['titulo']); ?></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body" style="background-color: rgb(247, 253, 255)">
        <div class="contact-form">
            <form action="<?php echo e(route('edit_task')); ?>" method="post">
                <?php echo e(csrf_field()); ?>


                <div class="col-md-6 input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-pencil-square"></i></span>
                    </div>
                    <input type="text" class="form-control titulo" value="<?php echo e($t['titulo']); ?>" name="titulo">
                </div>
                <div class="col-md-12 input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="bi bi-bookmarks"></i></span>
                    </div>
                    <textarea class="form-control msg" aria-label="With textarea"  name="msg"><?php echo html_entity_decode($t['content']);?></textarea>
                </div>
                <div class="col-md-12 pt-3 text-right">
                    <div class="form-group text-right" style=" display: inline;">
                        <input type="submit" value="Salvar" class="btn btn-primary rounded-1 " >
                    </div>
                    <div class="form-group text-right" style=" display: inline;">
                        <a type="button" data-dismiss="modal" aria-label="Close" class="btn btn-secondary rounded-1">Voltar</a>
                    </div>
                </div>
                <input type="hidden" name="id" value="<?php echo e($t['id']); ?>">
            </form>
        </div>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\laragon\www\Bugs\resources\views/admin/modal/task_modal.blade.php ENDPATH**/ ?>