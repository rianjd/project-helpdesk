 
 <?php if(count($chamados) != 0): ?>
 <?php $__currentLoopData = $chamados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chamado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <div class="col-md-12" id="chamado<?php echo e($chamado['id']); ?>">
                 <div class="card-header row" style="background: rgb(234, 233, 233);">

                     <div class="col-md-1" style="align-self: center;" >
                         <h5 class="text-center mt-3 fonte" style="color:#e8ab1b;"><i class="fa fa-hashtag mr-1" aria-hidden="true"></i><?php echo e($chamado['id']); ?></h5>
                     </div>
                     <div class="col-md-5 popover__wrapper" style="align-self: center;">
                         <a class="  mt-2  popover__title btn  chamado_modal" data-value="<?php echo e($chamado['id']); ?>" title="conteudo" data-toggle="modal" data-target="#modalGeral">
                             <h5 class="text-left fonte" >
                                 <?php echo e($chamado['name']); ?></h5>


                         </a>

                         <div class="popover__content">
                             <p class="popover__message">
                                <?php echo html_entity_decode($chamado['content']); ?>


                             </p>
                         </div>
                     </div>



                     <div class="col-2 text-center" style="align-self: center;">
                         <h5 class="mt-2"><?php echo e(date('d/m/20y', strtotime($chamado['date_creation']))); ?></h5>
                     </div>

                     <div class="col-1 text-center" style="align-self: center;">

                            <h5 class=" mt-2"><?php echo e(date('d/m/20y', strtotime($chamado['date_mod']))); ?></h5>

                     </div>



                     
                     <?php if($chamado['status'] == '2' ): ?>
                         <div class="col-md-2 text-center" style="align-self: center;">
                             <span class="text-muted status" data-toggle="modal" data-target="#modalStatus" data-value="<?php echo e($chamado['id']); ?>" style="align-items: center;">
                                 Aberto</strong>
                                 <i class="bi bi-record ml-1" style="color:rgb(83, 182, 17);"></i>
                             </span>


                         </div>

                     <?php endif; ?>
                     <?php if($chamado['status'] == '3' ): ?>

                         <div class="col-md-2  text-center pt-2 popover__wrapper  status" data-toggle="modal" data-target="#modalStatus" data-value="<?php echo e($chamado['id']); ?>" style="align-self: center;"><span class="text-muted popover__title" style="align-items: center;">Planejado</strong><i class="bi bi-clock-fill ml-2" style="color:rgb(38, 139, 197);"></i></span>
                             <div class="row justify-content-center">
                                 <?php if($chamado['time_to_resolve'] != null): ?>
                                     <div class="popover__content" style="left: 90px;">
                                         <p class="popover__message">
                                             <?php echo e(date('d/m/20y', strtotime($chamado['time_to_resolve']))); ?>

                                         </p>
                                     </div>
                                 <?php endif; ?>
                                 <?php $__currentLoopData = $sup; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $supp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                     <?php if($chamado['id'] == $supp['tickets_id']): ?>
                                         <span class="category-tags mt-2 ">
                                             <div class="category " style="background: #2cb2ffa1;">
                                                 <?php echo e($tec[$supp['suppliers_id']]); ?>

                                             </div>
                                         </span>
                                     <?php endif; ?>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                             </div>
                         </div>
                     <?php endif; ?>
                     <?php if($chamado['status'] == '4'): ?>
                         <div class="col-md-2  text-center pt-2 " style="align-self: center;" ><span class="text-muted status" style="align-items: center;" data-toggle="modal" data-target="#modalStatus" data-value="<?php echo e($chamado['id']); ?>">Andamento</strong><i class="bi bi-record-fill ml-1" style="color:rgb(228, 182, 32);"></i></span>
                             <div class="row justify-content-center">

                                 
                                 <?php $__currentLoopData = $tkt; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                     <?php if($chamado['id'] == $item['tickets_id']): ?>
                                         <span class="category-tags mt-2 atribuido dropdown">
                                             <div class="category a<?php echo e($chamado['id']); ?>"  role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                 <?php echo e($tec[$item['users_id']]); ?>

                                             </div>
                                             <div class="dropdown-menu " aria-labelledby="dropdownMenuButton">

                                                 <a class="dropdown-item status_tec" data-value="<?php echo e($chamado['id']); ?>">Rian</a>
                                                 <a class="dropdown-item status_tec" data-value="<?php echo e($chamado['id']); ?>">Matheus</a>
                                                 <a class="dropdown-item status_tec" data-value="<?php echo e($chamado['id']); ?>">Cassio</a>
                                                 <a class="dropdown-item status_tec" data-value="<?php echo e($chamado['id']); ?>">Alan</a>

                                             </div>
                                         </span>
                                     <?php endif; ?>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                             </div>
                         </div>

                     <?php endif; ?>

                     <div class="row justify-content-center fonte" style="align-self: center;">

                         <a type="button" class="botinho chamado_modal" data-value="<?php echo e($chamado['id']); ?>"  data-toggle="modal" data-target="#modalGeral" title="lupa">
                             <h5 class="text-center" style="color: rgb(3, 131, 216);"><i class="bi bi-search"></i></h4>
                         </a>
                         <a type="button" class="botinho chamado_modal" data-value="<?php echo e($chamado['id']); ?>"   data-toggle="modal" data-target="#modalGeral" title="encaminhar">
                             <h5 class="text-center" style="color: rgb(34, 49, 133);"><i class="bi bi-send-fill"></i></h4>
                         </a>
                     </div>

                 </div>
         </div>
         <input type="hidden" <?php echo e($contador = 1); ?>>

     

 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php else: ?>
<div class="col-md-12" id='NONE' name='NONE' style="margin-top: 12rem;">
 <h1 class="text-center" style="color: #777;"><i class="bi bi-bell-slash mr-3"></i>Não existem chamados com o filtro selecionado!</h1>
</div>
<div class="col-md-12" style="padding: 140px"></div>
<?php endif; ?>
<?php /**PATH C:\laragon\www\Bugs\resources\views/admin/internos.blade.php ENDPATH**/ ?>