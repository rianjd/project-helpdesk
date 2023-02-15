<?php $__env->startSection('content'); ?>
<div class="container-fluid mt-5">
    <div class="row mb-4">
        <div class="col-3">
            <div class="card shadow-sm mb-3">
                <div class="list-group text-center" id="list-tab" role="tablist">
                    <h3 class="p-3">Procedimentos<span class="float-right"><a data-toggle="modal" data-target="#modalAdd"><i class="bi bi-plus secondary"></i></a></span>
                    </h3>
                    <a class="list-group-item list-group-item-action active" id="home-list" data-toggle="list" href="#home" role="tab" aria-controls="home" ><i class="bi bi-house-fill mr-1"></i>Home</a>

                    <?php $__currentLoopData = $doc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <a class="list-group-item list-group-item-action" style="display: inline;" id="pdf-<?php echo e($d['id']); ?>-list" data-toggle="list" href="#pdf-<?php echo e($d['id']); ?>" role="tab" aria-controls="<?php echo e($d['id']); ?>">
                            <i class="bi bi-file-earmark-pdf mr-1"></i><?php echo e($d['name']); ?>

                        </a>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
            </div>
        </div>
        <div class="col-7 offset-1">

            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade active show" id="home" role="tabpanel" aria-labelledby="home-list">
                    <div class="row">
                        <div class="col-md-6"><h3><strong>Suporte TI</strong> </h3><h4>Procedimentos e orientações</h4><br>
                        <p>Por questão de segurança, manteremos os procedimentos e acessos na Wiki. <br><br>Aqui você encontra todo o passo a passo relacionado ao Suporte de aplicações e sistemas da Casas da Água.</p>
                        <a class="btn btn-secondary mt-3 shadow" href="http://wiki.casasdaagua.com.br/index.php/PROCEDIMENTOS_DE_SUPORTE">Abrir Wiki<i class="bi bi-box-arrow-in-up-right ml-2"></i></a>
                        </div>
                        <div class="col-md-6 card shadow-lg"><img src="<?php echo e(URL::asset('images/suporte_cda.png')); ?>" alt="" width="400px"></div>
                    </div>

                </div>
                <?php $__currentLoopData = $doc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="tab-pane fade" id="pdf-<?php echo e($d['id']); ?>" role="tabpanel" aria-labelledby="pdf-<?php echo e($d['id']); ?>-list">
                        <object
                            data="<?php echo e(URL::asset('storage/'.$d['local'])); ?>"
                            type="application/<?php echo e($d['path']); ?>"
                            width="100%"
                            height="800">
                            <iframe src="<?php echo e(URL::asset('storage/'.$d['local'])); ?>" height="650" width="100%" class="shadow">
                                <p>Download: <a href="<?php echo e(URL::asset($d['local'])); ?>">chamados-passo-a-passo.pdf</a></p>
                            </iframe>

                        </object>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" style="max-width: 500px;">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title" id="exampleModalLabel">
                Adicionar documento</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body" style="background-color: rgb(251, 254, 255)">
                <div class="contact-form">
                    <form action="<?php echo e(route('add_doc')); ?>" method="post" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

                        <div class="col-md-12 input-group mb-3">
                            <input type="text" class="form-control" placeholder="Titulo" aria-label="titulo" name="titulo" aria-describedby="basic-addon1">
                        </div>

                        <div class="form-group col-md-12 col-sm-12 co-xs-12 mt-4">

                            <i class="bi bi-paperclip" style="font-size:20px;"></i><input type="file"  id="imagem" name="imagem" multiple>
                        </div>
                        <div class="col-md-12 pt-5">
                            <div class="justify-content-center">
                                <div class="form-group text-center">
                                    <input type="submit" value="Enviar" class="btn btn-primary rounded-1 py-3 px-5">
                                    <span class="submitting"></span>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.base-admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Bugs\resources\views/admin/doc.blade.php ENDPATH**/ ?>