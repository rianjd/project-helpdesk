<?php $__currentLoopData = $task; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if( $t['status'] == 1): ?>
        <h4 class="check mt-4" onclick="myFunc(this,<?php echo e($t['status']); ?>)" id="<?php echo e($t['id']); ?>"><i class="bi bi-arrow-right-short mr-2"></i><?php echo e($t['titulo']); ?></h4>
    <?php else: ?>
        <h4 class="text-muted risco check mt-4" onclick="myFunc(this,<?php echo e($t['status']); ?>)" id="<?php echo e($t['id']); ?>"><i class="bi bi-check-lg mr-2"></i><?php echo e($t['titulo']); ?></h4>
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\laragon\www\Bugs\resources\views/admin/modal/task.blade.php ENDPATH**/ ?>