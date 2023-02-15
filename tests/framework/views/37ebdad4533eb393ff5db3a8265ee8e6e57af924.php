<?php $__env->startSection('conteudo'); ?>

<div class="container-fluid px-5 py-5" id="featured-3">
    <img src="images/corebusiness_1200x300.png" width="200" height="60" class="d-inline-block align-top pb-2 border-bottom" alt="">
    <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
      <div class="feature col">

        <h2>Criação de Usuario</h2>
        <p>Criação de novo login e senha para acesso ao sistema Core, apenas para colaboradores nunca cadrastrados.</p>
        <a href="/coreforms" class="btn btn-primary mb-4">Ajustar usuário</a>
      </div>
      <div class="feature col">

        <h2>Ajuste no usuário</h2>
        <p>Ajustes de permissões, limitações, login, senha, entre outras funções presentes no sistema.</p>
        <a href="/coreforms" class="btn btn-primary mb-4">Ajustar usuário</a>
      </div>
      <div class="feature col">

        <h2>Desativar login</h2>
        <p>Desativar ou bloquear login (Apenas para gerencia)*.</p>
        <a href="/coreforms" class="btn btn-primary mb-4">Ajustar usuário</a>
      </div>
    </div>
  </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Bugs\resources\views/sub/subCore.blade.php ENDPATH**/ ?>