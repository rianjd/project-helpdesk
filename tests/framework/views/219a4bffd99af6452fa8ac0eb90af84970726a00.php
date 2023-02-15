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
<?php /**PATH C:\laragon\www\Bugs\resources\views/admin/modal/task_check.blade.php ENDPATH**/ ?>