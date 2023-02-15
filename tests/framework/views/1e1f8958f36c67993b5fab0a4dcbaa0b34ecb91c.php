<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>


        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Help">
        <meta name="author" content="Rian">

        <title>Solução</title>

        <!-- Principal CSS do Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <!-- Estilos customizados para esse template -->
    </head>

    <body>
        <div class="container-fluid">
            <div class=" text-center p-3 my-3 text-white bg-success rounded shadow">
                <h5><?php echo e($data['title']); ?></h5>
            </div>

            <div class="my-3 p-3 bg-white rounded shadow-sm" >
                <h3 class="border-bottom border-gray pb-4 mb-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-check-circle mr-3" style="font-size: 23px; color:rgb(8, 156, 8);" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
                    </svg>Chamado solucionado!</h3>
                <?php if(isset($data['msg'])): ?>
                        <div class="media-body pb-3 my-3 med lh-125 border-bottom border-gray" style="font-size: 23px;">
                            <?php echo $data['msg']; ?>
                            <p><br/>Qualquer duvida estamos á disposição!<br/> </p>
                            <p>Atenciosamente, <br/><strong><?php echo e($data['nome']); ?></strong></p>
                        </div>
                <?php endif; ?>
                <?php if(isset($data['nome'])): ?>

                <div class="media-body p-3 my-2 med lh-125 border-gray text-center" style="font-size: 18px; margin-bottom:0; "><p><strong>Finalizado em: </strong></p><?php echo e($data['time']); ?></div><?php endif; ?>
        </div>
        <div class="my-3 p-3 rounded shadow-sm  text-muted" style="background-color: #f0fbff ">
            <h4 class="border-bottom border-gray pb-4 mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-info-circle mr-3" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
              </svg>Chamado de referencia</h4>
            <div class="media-body pb-3 my-3 med lh-125 border-gray">
                <p><strong>Aberto em: </strong><?php echo e(date('d/m/2022', strtotime($data['date_creation']))); ?></p>
                <?php echo $data['content']; ?>

            </div>


        </div>

    </body>
</html>
<?php /**PATH C:\laragon\www\Bugs\resources\views/sender/mailSolutions.blade.php ENDPATH**/ ?>