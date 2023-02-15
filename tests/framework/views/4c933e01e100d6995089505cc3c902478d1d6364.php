
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="Formulario de chamados">
<meta name="author" content="Rian">

<title>Chamado</title>

<!-- Principal CSS do Bootstrap -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<!-- Estilos customizados para esse template -->

<div class="container-fluid my-2">
    <div class="mx-3 mb-4">
        <div class="border-bottom py-3" style="font-weight: 600;"><h5><?php echo $data['complemento'] ?></h5></div>
        <div class="text-muted" ><p>Enviado por <?php echo e($data['nome']); ?></p></div>
    </div>
    <?php echo $data['content'] ?>


</div>
<?php /**PATH C:\laragon\www\Bugs\resources\views/sender/mailEnc.blade.php ENDPATH**/ ?>