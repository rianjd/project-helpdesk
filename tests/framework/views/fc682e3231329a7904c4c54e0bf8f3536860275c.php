<?php $__currentLoopData = $conteudo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chamado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
 
    <div class="modal-header text-center" style="background-color: #eff1f1;">
        <h4 class="modal-title " id="exampleModalLabel">
            <i class="bi bi-search mr-3" style="color: rgb(23, 170, 228)"></i>Enviar para LUPA
        </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-6">
                <div class="contact-form">

                <form class="mb-2" action="<?php echo e(route('acompadmin')); ?>" method="post"   enctype="multipart/form-data">
                    <?php echo e(csrf_field()); ?>


                        <div class="row ">

                            <div class="col-md-12 ">
                                <div class="form-group mb-3">
                                    <label for="msg" class="col-form-label sans">Complemento do chamado :</label>
                                    <textarea class="form-control" name="complemento" id="" cols="30" rows="4" wrap="hard" placeholder="Descreva aqui mais detalhes sobre o chamado..."></textarea>
                                </div>
                            </div>
                            <div class="form-group col-md-7 mt-2  ">
                                <label for="imagem" class="col-form-label sans"><i class="bi bi-paperclip mr-3" style="font-size:20px;"></i>Anexar </label>

                                <input type="file"   id="imagem" name="imagem" multiple>
                              </div>
                            <div class="col-md-12 pt-5">
                                <div class="justify-content-center">
                                    <div class="form-group text-center">
                                        <input type="submit" style="background-color: rgb(23, 170, 228) !important; border:0;" value="Enviar"  class="btn btn-primary rounded-1 py-3 px-5">
                                        <span class="submitting"></span>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="id" value="<?php echo e($chamado['id']); ?>">
                            <input type="hidden" name="tipo_acomp" value="lupa">
                        </div>
                    </form>
                </div>
                </div>
                <div class="col-6">
                    <div class="text-left p-3 my-3 text-white rounded shadow">
                        <h5 class="p-1 " ><?php echo html_entity_decode($chamado['content']); ?></h5>
                    </div>
                </div>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\laragon\www\Bugs\resources\views/admin/modal/lupa.blade.php ENDPATH**/ ?>