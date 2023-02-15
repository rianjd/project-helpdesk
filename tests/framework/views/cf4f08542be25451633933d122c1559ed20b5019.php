
<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap-extended.min.css">

        <link href="//fonts.googleapis.com/css?family=Lato:300,400,700,400italic%7CJosefin+Sans:400,700,300italic%7CBebasNeue%7CChanga%7CKoulen%7CPassion+One%7CYantramanav%7CChivo%7CMerriweather+Sans" rel="stylesheet">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo e(URL::asset('images/favicon-32x32.png')); ?>">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <link rel="stylesheet" href="<?php echo e(URL::asset('css/style.css')); ?>">

        <title>ADMIN - LOCAL</title>
        <script src="https://kit.fontawesome.com/5a04192bbd.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha512-U6K1YLIFUWcvuw5ucmMtT9HH4t0uz3M366qrF5y4vnyH6dgDzndlcGvH/Lz5k8NFh80SN95aJ5rqGZEdaQZ7ZQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <?php echo $__env->yieldContent('styles'); ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    </head>

    <?php
        use App\Models\Chamado;

        $tot= Chamado::where('status','!=', 6)->where('status','!=', 5)->where('users_id_recipient',56)->get();
        $total_chamados = count($tot);

    ?>


<body >
    <div class="row" style="margin-right: 0;">
        <div class="col-md-2 ">
            <nav class="nav navbar-dark navbar-toggleable shadow " style="height: 100%; display: block; position:fixed; width: 15vw; border-radius:0;">
                <div class="text-center p-3"><img class="logomarca" src="<?php echo e(URL::asset('images/logo-novo-white.png')); ?>" height="50" width="160">
                </div>

                <div class="fixed mt-5">
                    <a href="/getChamado" class="nav-link branco"><i class="bi bi-rocket-takeoff-fill mr-4"></i>Chamados<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary ml-2"><?php echo e($total_chamados); ?></span></a>
                    <a href="/solucionados" class="nav-link branco"><i class="bi bi-check-lg mr-4"></i>Solucionados</a>

                    <div class="divider-medium"></div>

                    <a href="/admin/dashboard" class="nav-link branco"><i class="bi bi-graph-up mr-4"></i>Dashboard</a>
                    <a href="/admin/filiais" class="nav-link branco"><i class="bi bi-houses-fill mr-4"></i>Filiais</a>

                    <div class="divider-medium"></div>

                    <a href="/admin/tasks" class="nav-link branco"><i class="bi bi-list-check mr-4"></i>Tasks</a>

                    <div class="divider-medium"></div>

                    <a href="<?php echo e(route('admin_Escala')); ?>" class="nav-link branco"><i class="bi bi-calendar-date-fill mr-4"></i>Escala</a>
                    <a href="/admin/funcoes" class="nav-link branco disabled"><i class="bi bi-person-fill-gear mr-4 "></i>Funções</a>

                    <div class="divider-medium"></div>

                    <a href="/admin/doc" class="nav-link branco"><i class="bi bi-folder-fill mr-4"></i>Documentação</a>
                    <a href="<?php echo e(route('admin_Estoque')); ?>" class="nav-link branco"><i class="bi bi-box-seam-fill mr-4"></i>Estoque</a>

                    <div class="divider-medium"></div>
                    <a href="/logout" class="nav-link branco"><i class="bi bi-door-open-fill mr-4"></i>Sair</a>



                    <a href="/" class="nav-link" style="color: #f0f0f086"><i class="bi bi-arrow-return-left mr-4"></i>Voltar</a>
                </div>

            </nav>
            <a href="/perfil" class="nav-link branco fixed-bottom" style="max-width: 10%;"><img src="<?php echo e(URL::asset('storage/profile/'.Auth::user()->comment.'.jpg')); ?>" class="mr-2" width="40" height="40" style="border-radius: 50%;"><?php echo e(Auth::user()->name); ?></a>

        </div>

        <div class="col-md-10">

            <?php echo $__env->yieldContent('content'); ?>
        </div>

    </div>

    </body>
    <?php echo $__env->yieldContent('script'); ?>
</html>

<?php /**PATH C:\laragon\www\Bugs\resources\views/admin/base-admin.blade.php ENDPATH**/ ?>