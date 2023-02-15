<title>Chamado</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<!-- Chamado -->

<div class="container-fluid">

    <?php if($data['tipo'] == 'Chat'): ?><div class="d-flex align-items-center p-3 my-3 text-white-50 bg-primary rounded shadow"><img class="mr-3" id="logo-messenger" src=<?php echo e("https://github.com/rianjd/forms-cda/blob/master/public/images/logo-mattermost.png?raw=true"); ?> width="50" height="50" style="display:block;" alt=""> <h3 class="text-dark">Messenger</h3></div>
    <?php elseif($data['tipo'] == 'Core'): ?><div class="d-flex align-items-center p-3 my-3 text-white-50 bg-secondary rounded shadow"><img class="mr-3" id="corebusiness_1200x300" src=<?php echo e("https://github.com/rianjd/forms-cda/blob/master/public/images/corebusiness_1200x300.png?raw=true"); ?> width="160" height="40" style="display:block;" alt=""> </div>
    <?php elseif($data['tipo'] == 'DJ'): ?><div class="d-flex align-items-center p-3 my-3 text-white-50 bg-primary rounded shadow"><img class="mr-3" id="djpdv" src=<?php echo e("https://github.com/rianjd/forms-cda/blob/master/public/images/djpdv.png?raw=true"); ?> width="150" height="40" style="display:block;" alt=""></div>
    <?php elseif($data['tipo'] == 'Email'): ?><div class="d-flex align-items-center p-3 my-3 text-white-50 bg-info rounded shadow"><img class="mr-3" id="email" src=<?php echo e("https://github.com/rianjd/forms-cda/blob/master/public/images/zimbra-black.png?raw=true"); ?> width="150" height="40" style="display:block;" alt=""></div>
    <?php else: ?>  <div class="text-center p-3 my-3 text-white bg-info rounded shadow"><h5>Filial <?php echo e($data['filiais']); ?> -  <?php echo e($data['categoria']); ?>/<?php echo e($data['tipo_chamado']); ?> </h5></div>
    <?php endif; ?>


            <?php if(isset($data['ajuste'])): ?>
                <div class="my-3 p-3 bg-white rounded shadow-sm">
                    <h3 class="border-bottom border-gray pb-4 mb-0">
                         Nova solicitação de Ajuste <?php echo e($data['tipo']); ?> </h3>
            <?php elseif($data['tipo'] == 'Core' || $data['tipo'] == 'Chat' || $data['tipo'] == 'Email' || $data['tipo'] == 'DJ' ): ?>
                <div class="my-3 p-3 bg-white rounded shadow-sm">
                    <h3 class="border-bottom border-gray pb-4 mb-0">
                        Nova solicitação de criação <?php echo e($data['tipo']); ?></h3>
            <?php else: ?>
                <div class="my-3 p-3 bg-white rounded shadow-sm">
                    <h3 class="border-bottom border-gray pb-4 mb-0">
                        Novo chamado! </h3>

            <?php endif; ?>
        <?php if(isset($data['nome_user'])): ?><div class="text-muted pt-4">
            <div class="media-body pb-3 mb-0 med lh-125 border-bottom border-gray"><p><strong>Nome: </strong><?php echo e($data['nome_user']); ?></p></div></div><?php endif; ?>
        <?php if(isset($data['cpf'])): ?><div class="media text-muted pt-4">
            <div class="media-body pb-3 mb-0 med lh-125 border-bottom border-gray"><p><strong>CPF: </strong><?php echo e($data['cpf']); ?></p></div></div><?php endif; ?>
        <?php if(isset($data['setor'])): ?><div class="media text-muted pt-4">
            <div class="media-body pb-3 mb-0 med lh-125 border-bottom border-gray"><p><strong>Setor: </strong><?php echo e($data['setor']); ?></p></div></div><?php endif; ?>
        <?php if(isset($data['funcao'])): ?><div class="media text-muted pt-4">
            <div class="media-body pb-3 mb-0 med lh-125 border-bottom border-gray"><p><strong>Grupo: </strong><?php echo e($data['funcao']); ?></p></div></div><?php endif; ?>
        <?php if(isset($data['filial'])): ?><div class="media text-muted pt-4">
            <div class="media-body pb-3 mb-0 med lh-125 border-bottom border-gray"><p><strong>Filial: </strong><?php echo e($data['filiais']); ?></p></div></div><?php endif; ?>
        <?php if(isset($data['user'])): ?><div class="media text-muted pt-4">
            <div class="media-body pb-3 mb-0 med lh-125 border-bottom border-gray"><p><strong>User: </strong><?php echo e($data['user']); ?></p></div></div><?php endif; ?>
        <!-- divisao -->
        <?php if(isset($data['msg'])): ?><div class="media text-muted pt-4">
            <div class="media-body pb-3 mb-0 med lh-125 border-bottom border-gray"><p><strong>Observações: </strong><?php echo e($data['msg']); ?></p></div></div>
        <?php else: ?>
            <div class="media text-muted pt-4">
                <div class="media-body pb-3 mb-0 med lh-125 border-bottom border-gray"><p><strong>Observações: </strong>Solicitação de criação - <?php echo e($data['tipo']); ?></p></div></div>
        <?php endif; ?>

        <?php if(isset($data['nome'])): ?><div class="pt-4">
            <div class="media-body pb-3 mb-0 med lh-125 border-bottom border-gray"><p><strong>Nome solicitante: </strong><?php echo e($data['nome']); ?></p></div></div><?php endif; ?>
        <!-- divisao -->
        <?php if(isset($data['filename'])): ?>
        <div class="pt-4 text-center">
            <a href="<?php echo e(URL::asset('storage/chamado/'.$data['filename'])); ?>" download>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download mr-2" viewBox="0 0 16 16">
                    <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                    <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                  </svg>Baixar anexo
            </a>
        </div>
        <?php endif; ?>

</div>
</div>
<?php /**PATH C:\laragon\www\Bugs\resources\views/sender/mail.blade.php ENDPATH**/ ?>