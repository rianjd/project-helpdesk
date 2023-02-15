<?php $__env->startSection('conteudo'); ?>

<div class="container">
    <form action="<?php echo e(route('chamados.login')); ?>" method="post">
        <?php echo e(csrf_field()); ?>

    <div class="input-group mb-3">
        <div class="input-group">
        <input type="text" class="form-control" name="name" aria-label="Text input with checkbox">
      </div>

      <div class="input-group">
        <input type="password" class="form-control" name="password" aria-label="Text input with radio button">
      </div>
      <div class="row justify-content-center">
        <div class="col-md-4 mb-5 form-group text-center">
          <input type="submit" value="Enviar" class="btn btn-block btn-primary rounded-0 py-2 px-4">
          <span class="submitting"></span>
        </div>
      </div>
    </form>
</div>
 <!--FORM VALIDATE-->
 <?php if($message = Session::get('error')): ?>
 <div class="alert alert-danger alert-dismissible fade show" role="alert">
         <strong>Usuario ou senhas incorretos.</strong> <br>
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
         </button>
 </div>
<?php endif; ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Bugs\resources\views/teste.blade.php ENDPATH**/ ?>