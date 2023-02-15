<?php
    $contador = 0;
?>

<link href="<?php echo e(URL::asset('css/main.css')); ?>" rel='stylesheet' />
<link href='https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.13.1/css/all.css' rel='stylesheet'>

<script src='<?php echo e(URL::asset("js/main.js")); ?>'></script>

<?php $__env->startSection('content'); ?>

    <div class="container-fluid" style="height: 100vh">
        <div class="row justify-content-center mt-5">
            <div class="col-12 mb-5 text-center"><h1>Plantão sabados</h1></div>
            <div class="col-5">
                <div id='calendar'></div>
            </div>
            <div class="col-3 offset-1 ">
                <?php $__currentLoopData = $escala; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $escalas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($contador == 0): ?>
                            <h3 style="color:rgb(35, 143, 214); ">Next</h3>
                            <div class="card" style="box-shadow: 0px 0px 4px rgba(24, 137, 212, 0.5); scale: 100%;">
                        <?php else: ?>
                            <div class="card" style="scale:90%;">
                        <?php endif; ?>
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="media d-flex">

                                            <div class="align-self-center">
                                                <img src="/storage/profile/<?php echo e($escalas['obs']); ?>.jpg" class=" float-right" width="50" height="50" style="border-radius: 50%;" alt="...">
                                            </div>
                                            <div class="media-body text-right">
                                                <?php if($escalas['nome'] == Auth::user()->name): ?>
                                                    <h2 style="color:rgb(255, 208, 0);">Você</h2>
                                                <?php else: ?>
                                                    <h2 style="color:rgb(30, 56, 95);"><?php echo e($escalas['nome']); ?></h2>
                                                <?php endif; ?>
                                                <span><?php echo e(date('d/m', strtotime($escalas['data']))); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php
                                $contador +=1;
                            ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

        </div>
        

    </div>
    
    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>

        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar')
            var calendar = new FullCalendar.Calendar(calendarEl, {
                themeSystem: 'google',
                locale: 'pt-br',
                events: [
                    <?php
                        foreach($escala_geral as $escalas){
                            echo "{title  :'".$escalas['nome']."' ,start  : '".$escalas['data']."'},";
                        }
                    ?>

                ],
            });
            calendar.render();
        });

    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.base-admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Bugs\resources\views/admin/escala.blade.php ENDPATH**/ ?>