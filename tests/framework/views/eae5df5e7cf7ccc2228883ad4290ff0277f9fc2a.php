<?php $__env->startSection('conteudo'); ?>
<form action="<?php echo e(route('perfil.store')); ?>"  method="post"  enctype="multipart/form-data">
    <div class="container-fluid mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow p-5" style="height: 100%">

                    <div class="row ">

                        <div class="col-6 ">

                            <div class="row card-body">
                            <?php if(Auth::user()->comment !== null): ?>
                                <h3 style="color: rgb(0, 36, 104)"><strong><?php echo e(Auth::user()->name); ?></strong><br> Bem vindo!</h3>

                            </div>
                            <div class="mt-4">
                                <input type="password" name="passold" placeholder="Senha atual">
                            </div>
                            <div class="mt-5">
                                <input type="password" name="password" placeholder="Nova senha">
                            </div>
                            <div class="mt-4">
                                <input type="password" name="password2" placeholder="Confirme a senha">
                            </div>
                            <?php endif; ?>
                        </div>

                        <div class="col-5 text-center">
                            <div class="contact-form ">


                                    <?php echo e(csrf_field()); ?>

                                    <?php if(Auth::user()->comment !== null): ?>
                                        <div class="form-group  mt-4">
                                            <h5 class="text-center">Clique para alterar</h5>
                                            <div class="max-width">
                                                <div class="imageContainer">
                                                    <img src="storage/profile/<?php echo e(Auth::user()->comment); ?>.jpg" width="300" height="300" style="border-radius: 50%;" id="imgPhoto" alt="Sem foto">
                                                </div>
                                            </div>
                                            <input type="file" name="imagem" id="flImage" accept="image/*">
                                        </div>



                                        <input type="hidden" id="" name="user_user" value="<?php echo e(Auth::user()->comment); ?>">
                                    <?php endif; ?>



                            </div>
                        </div>
                        <div class="col-1" style="align-self: flex-start;">
                            <div style="align-self: flex-start !important;">
                                <a type="button" class="close text-left" href="/getChamado">
                                    <span aria-hidden="true">&times;</span>
                                </a>
                            </div>
                        </div>
                        <div class="col-1" style="align-self: flex-end;">
                                <button type="submit" class="btn btn-primary" style="padding:5px">Salvar </button>
                        </div>
                    </div>

                </div>
            </div>
            <?php if(Auth::user()->comment !== null): ?>
            <div class="col-md-4 ">
                <div class="row">
                    <div class="card pb-5 mb-5 shadow">

                        <div class="row mt-5 justify-content-center">
                            <div class="col-12 mb-4 text-center">
                                <h2>Chamados solucionados<i class="bi bi-patch-check-fill ml-3" style="color: rgb(0, 136, 199)"></i></h2>
                            </div>

                            <?php $__currentLoopData = $tec_count; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key_tec => $tecnosh): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($key_tec == Auth::user()->comment): ?>


                                <div class="col-xl-4 col-sm-6 col-12 text-center">
                                    <?php if($tecnosh > 100): ?>
                                    <div class="card mt-2" style="box-shadow: 0px 0px 4px #ff6767">
                                    <?php elseif($tecnosh > 50): ?>
                                    <div class="card mt-2" style="box-shadow: 0px 0px 4px #ffe761">
                                    <?php elseif($tecnosh > 25): ?>
                                    <div class="card mt-2" style="box-shadow: 0px 0px 2px #16A7D3">
                                    <?php else: ?>
                                    <div class="card shadow mt-2">
                                    <?php endif; ?>

                                        <div class="card-content">
                                            <div class="card-body">
                                                <div class="media d-flex">
                                                    <div class="media-body text-left">
                                                        <?php if($tecnosh > 100): ?>
                                                        <h3 style="color: #af1313 !important;"><i class="bi bi-gem mr-1"></i><?php echo e($tecnosh); ?></h3>

                                                        <?php elseif($tecnosh > 50): ?>
                                                        <h3 style="color: #c0a50b !important;"><i class="bi bi-fire mr-1"></i><?php echo e($tecnosh); ?></h3>

                                                        <?php elseif($tecnosh > 25): ?>
                                                        <h3 style="color: #16A7D3 !important;"><i class="bi bi-lightning-charge-fill mr-1"></i><?php echo e($tecnosh); ?></h3>

                                                        <?php else: ?>
                                                        <h3 style="color: #16A7D3 !important;"><?php echo e($tecnosh); ?></h3>

                                                        <?php endif; ?>
                                                        <span>Mês atual</span>

                                                    </div>
                                                    <div class="align-self-center">
                                                        <?php if($key_tec == Auth::user()->comment): ?>
                                                            <img src="storage/profile/<?php echo e(Auth::user()->comment); ?>.jpg" class=" float-right" width="50" height="50" style="border-radius: 50%;" alt="...">
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <?php $__currentLoopData = $tec_count_tot; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key_tec => $tecnosh): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($key_tec == Auth::user()->comment ): ?>
                                <div class="col-xl-4 col-sm-6 col-12 text-center">

                                    <div class="card shadow mt-2">

                                        <div class="card-content">
                                            <div class="card-body">
                                                <div class="media d-flex">
                                                    <div class="media-body text-left">
                                                        <h3 style="color: #16A7D3 !important;"><?php echo e($tecnosh); ?></h3>
                                                        <span>Total</span>
                                                    </div>
                                                    <div class="align-self-center">
                                                        <?php if($key_tec == Auth::user()->comment): ?>
                                                            <img src="storage/profile/<?php echo e(Auth::user()->comment); ?>.jpg" class=" float-right" width="50" height="50" style="border-radius: 50%;" alt="...">
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>
                    </div>
                    <div class="card pb-4 shadow "  style="width: 100%">

                        <div class="card-body">
                            <div class="col-12 text-center">
                                <h2 class="mb-4">Escala sabados<i class="bi bi-ui-checks ml-3" style="color: rgb(0, 136, 199)"></i></h2>
                                <?php $__currentLoopData = $escala; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $escalas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($escalas['data'] > date('2022-m-d')): ?>
                                            <div class="card shadow" >
                                                <div class="card-content">
                                                    <div class="card-body">
                                                        <div class="media d-flex">

                                                            <div class="align-self-center">
                                                                <h2>Seu proximo<i class="bi bi-arrow-up-short ml-2"></i></h2>
                                                            </div>
                                                            <div class="media-body text-right">
                                                                <h2 style="color:rgb(7, 147, 240);"><?php echo e(date('d/m', strtotime($escalas['data']))); ?></h2>
                                                                <span><?php echo e($escalas['nome']); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php break; ?>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</form>

<?php if($message = Session::get('success')): ?>
                <div class="col-3 offset-9 fixed-bottom p-5">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Perfil atualizado!</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>

<?php elseif($message = Session::get('erro')): ?>
<div class="col-3 offset-9 fixed-bottom p-5">
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Senha atual incorreta!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>
<?php elseif($message = Session::get('erro2')): ?>
<div class="col-3 offset-9 fixed-bottom p-5">
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Confirmação de senha incorreta!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>
<?php endif; ?>

<script>
    'use strict'

    let photo = document.getElementById('imgPhoto');
    let file = document.getElementById('flImage');

    photo.addEventListener('click', () => {
        file.click();
    });

    file.addEventListener('change', () => {

        if (file.files.length <= 0) {
            return;
        }

        let reader = new FileReader();

        reader.onload = () => {
            photo.src = reader.result;
        }

        reader.readAsDataURL(file.files[0]);
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Bugs\resources\views/profile/perfil.blade.php ENDPATH**/ ?>