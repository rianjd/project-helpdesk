<head>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Template offcanvas, usando Bootstrap.</title>

    <!-- Principal CSS do Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- Estilos customizados para esse template -->
</head>


<div class="container">

    <?php if($data['tipo'] == 'Chat'): ?><div class="d-flex align-items-center p-3 my-3 text-white-50 bg-primary rounded shadow"><img class="mr-3" id="logo-messenger" src=<?php echo e("https://github.com/rianjd/forms-cda/blob/master/public/images/logo-mattermost.png?raw=true"); ?> width="50" height="50" style="display:block;" alt=""> <h3 class="text-dark">Messenger</h3> <?php endif; ?>
    <?php if($data['tipo'] == 'Core'): ?><div class="d-flex align-items-center p-3 my-3 text-white-50 bg-secondary rounded shadow"><img class="mr-3" id="corebusiness_1200x300" src=<?php echo e("https://github.com/rianjd/forms-cda/blob/master/public/images/corebusiness_1200x300.png?raw=true"); ?> width="160" height="40" style="display:block;" alt=""> <?php endif; ?>
    <?php if($data['tipo'] == 'DJ'): ?><div class="d-flex align-items-center p-3 my-3 text-white-50 bg-primary rounded shadow"><img class="mr-3" id="djpdv" src=<?php echo e("https://github.com/rianjd/forms-cda/blob/master/public/images/djpdv.png?raw=true"); ?> width="150" height="40" style="display:block;" alt="">  <?php endif; ?>
    <?php if($data['tipo'] == 'Email'): ?><div class="d-flex align-items-center p-3 my-3 text-white-50 bg-info rounded shadow"><img class="mr-3" id="email" src=<?php echo e("https://github.com/rianjd/forms-cda/blob/master/public/images/zimbra-black.png?raw=true"); ?> width="150" height="40" style="display:block;" alt="">  <?php endif; ?>

    </div>

    <div class="my-3 p-3 bg-white rounded shadow-sm">
        <h5 class="border-bottom border-gray pb-4 mb-0">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-bell-fill" viewBox="0 0 20 20">
                <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"/>
              </svg> Novo chamado </h5>
        <?php if(isset($data['nome'])): ?><div class="text-muted pt-4">
            <div class="media-body pb-3 mb-0 med lh-125 border-bottom border-gray"><p><strong>Aberto por: </strong><?php echo e($data['nome']); ?></p></div></div><?php endif; ?>
        <?php if(isset($data['setor'])): ?><div class="media text-muted pt-4">
            <div class="media-body pb-3 mb-0 med lh-125 border-bottom border-gray"><p><strong>Setor: </strong><?php echo e($data['setor']); ?></p></div></div><?php endif; ?>
        <?php if(isset($data['filial'])): ?><div class="media text-muted pt-4">
            <div class="media-body pb-3 mb-0 med lh-125 border-bottom border-gray"><p><strong>Filial: </strong><?php echo e($data['filial']); ?></p></div></div><?php endif; ?>
        <?php if(isset($data['user'])): ?><div class="media text-muted pt-4">
            <div class="media-body pb-3 mb-0 med lh-125 border-bottom border-gray"><p><strong>Usuário: </strong><?php echo e($data['user']); ?></p></div></div><?php endif; ?>
        <?php if(isset($data['msg'])): ?><div class="media text-muted pt-4">
            <div class="media-body pb-3 mb-0 med lh-125 border-bottom border-gray"><p><strong>Observaçõess: </strong><?php echo e($data['msg']); ?></p></div></div><?php endif; ?>



</div>
<?php /**PATH C:\laragon\www\Bugs\resources\views/sender/gerente.blade.php ENDPATH**/ ?>