<?php if(count($chamados) != 0): ?>
                <?php $__currentLoopData = $chamados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chamado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($chamado['users_id_recipient'] == 56): ?>
                            <div class="col-md-12 ">
                                    <div class="card-header row" style="background: rgb(234, 233, 233);">
                                        <div class="col-md-1" style="align-self: center;">
                                            <h5 class="text-center fonte mt-2" ><?php echo e($chamado['id']); ?></h5>
                                        </div>
                                        <div class="col-md-5 popover__wrapper" style="align-self: center;">
                                            <a class=" btn btn-block   popover__title chamado_modal" data-value="<?php echo e($chamado['id']); ?>"  data-toggle="modal" data-target="#modalGeral" title="solucionado">
                                                <h5 class="text-left fonte mt-2" ><?php echo e($chamado['name']); ?></h5>
                                            </a>
                                            <div class="popover__content" style="width: 500px;">
                                                <?php $__currentLoopData = $solution; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $solu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($solu['items_id'] == $chamado['id']): ?>
                                                        <p class="popover__message">
                                                            <?php echo $solu['content']; ?>

                                                        </p>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            </div>

                                        </div>

                                        <div class="col-2 text-center" style="align-self: center;">
                                            <h5 class="mt-2"><?php echo e(date('d/m/20y', strtotime($chamado['date_creation']))); ?></h5>
                                        </div>

                                        <div class="col-1 text-center" style="align-self: center;">
                                                <h5 class="mt-2" style="color:rgb(61, 143, 6);"><?php echo e(date('d/m/20y', strtotime($chamado['date_mod']))); ?></h5>
                                        </div>



                                        
                                        <?php if($chamado['status'] == '5' ): ?>
                                            <div class="col-md-2 text-center" style="align-self: center;"><span class="text-muted " style="align-items: center;">Solucionado<i class="bi bi-check-lg ml-1" style="color:rgb(83, 182, 17);"></i></span>
                                            </div>

                                        <?php endif; ?>


                                        <div class=" text-right col-xl-1" style="align-self: center;">

                                                <form action="<?php echo e(route ('restore.chamado')); ?>"  method="post">
                                                    <?php echo e(csrf_field()); ?>

                                                    <input type="hidden" value="<?php echo e($chamado['id']); ?>" name="id">
                                                    <button  type="submit" class="btn text-center" >
                                                        <h4  class="botinho" style="color: rgb(0, 66, 128);"><i class="bi bi-arrow-repeat"></i></h4>
                                                    </button>
                                                </form>
                                        </div>
                                    </div>





                            </div>
                            <input type="hidden" <?php echo e($contador = 1); ?>>
                        <?php endif; ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <div class= "modal fade " id="modalData" tabindex="1"  aria-hidden="true">
                    <div class="modal-dialog modal-xl" style="max-width: 1200px;">
                        <div class="modal-content">
                            <div class='input-group date' id='datetimepicker1'>
                                <input type='date' class="form-control chamado_table_blur"  name="time_to_resolve">
                                <span ><h3><i class="bi bi-calendar-event ml-3"></i></h3>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class= "modal fade " id="modalGeral" tabindex="1"  aria-hidden="true">
                    <div class="modal-dialog modal-xl" style="max-width: 1200px;">
                        <div class="modal-content">
                            <div id="conteudomodal">

                            </div>
                        </div>
                    </div>
                </div>


                
                <?php if(!isset($contador)): ?>
                    <div class="col-md-12" id='NONE' name='NONE' style="margin-top: 12rem;">
                        <h1 class="text-center" style="color: #777;"><i class="bi bi-bell-slash mr-3"></i>Não existem chamados para sua filial!</h1>
                    </div>
                    <div class="col-md-12" style="padding: 140px"></div>
                <?php else: ?>
                    <div class="col-md-12" style="padding: 0px 0px 0px 100px">
                        <p style="color: rgb(250, 250, 250) ">ala kkkkkk dark mode</p>
                    </div>

                <?php endif; ?>
            <?php endif; ?>
<?php /**PATH C:\laragon\www\Bugs\resources\views/admin/solucionados_table.blade.php ENDPATH**/ ?>