<script>
    $(document).ready(function() {
        var time = 45000;
        setTimeout(function() {
        $.get('<?php echo e(route("painel")); ?>', {filtro: 1}, (result) => {
            $("#conteudo").html(result)
        })
        }, time);

    });

</script>
<?php
    $contador_tot=0;
    $contador = 0;
    $contador_ = 0;
    ?>
    <div class="p-3" style="background-image: url(<?php echo e(URL::asset('images/back5.jpg')); ?>);">
    </div>
    <div class="container-fluid my-1">

        <div class="row p-3">

            <div class="col-lg-6">
                <div class="col-12 mb-4  text-center fade-bottom ">
                        <?php $__currentLoopData = $daily_chamado; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $daily): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            if (date("20y-m-d", strtotime($daily['date_creation'])) == date("2022-m-d", strtotime('-3 hour')) and $daily['status'] != 6) $contador += 1;
                            if (date("20y-m-d", strtotime($daily['date_mod'])) == date("2022-m-d", strtotime('-3 hour')) and $daily['status'] == 5) $contador_ += 1;
                        ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <h3 class="mb-2"><strong>Atividade</strong></h3>
                <h4>
                    <?php echo e($contador); ?><i class="bi bi-caret-up-fill ml-2 fadeTop4" style="color:#379d0e;" title="Abertos"></i>
                    <i class="bi bi-caret-down-fill mr-2 fadeDown" style="color:rgb(158, 8, 8)" title="Fechados"></i><?php echo e($contador_); ?>

                </h4>

                </div>
                <div class="row shadow">
                    
                    <div class="col-md-12">
                        <div class="card-header row" style="background: rgb(42, 57, 66);">
                            <div class="col-md-1 " style="color: white !important;">
                                <h5 class="text-center" >ID
                                </h5>
                            </div>
                            <div class="col-md-6">
                                <h5 class="text-left" style="color: white !important;" ><i class="fa fa-list-ul mr-2" aria-hidden="true"></i>
                                    Titulo do chamado</h5>
                            </div>
                            <div class="col-md-2" style="color: white !important;">
                                <h5 class="text-center  " >Abertura
                                </h5>
                            </div>

                            <div class="col-md-2" style="color: white !important;">
                                <h5 class="text-center"  >Modific.</h5>
                            </div>

                            <div class="col-md-1" style="color: white !important;">
                                <h5 class="text-center ">Status
                                </h5>
                            </div>

                        </div>
                    </div>

                    
                    <?php if(count($chamados) != 0): ?>
                    <?php $__currentLoopData = $chamados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chamado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-12" id="chamado<?php echo e($chamado['id']); ?>">
                                <?php if(date("Y-m-d H:i:s", strtotime('-3 days')) < $chamado['date_mod'] or $chamado['status'] == 3 or  $chamado['users_id_recipient'] != 56): ?>
                                    <div class="card-header row" style="background: rgb(234, 233, 233);">
                                        <div class="col-md-1" style="align-self: center;" >
                                            <h6 class="text-center fonte" style="color:#e8ab1b;"><?php echo e($chamado['id']); ?></h6>
                                        </div>
                                <?php else: ?>
                                    <div class="card-header row " style="background: rgba(199, 1, 1, 0.226);">
                                        <div class="col-md-1" style="align-self: center;" >
                                            <h6 class="text-center fonte" style="color:rgb(158, 8, 8)"><?php echo e($chamado['id']); ?></h6>
                                        </div>

                                <?php endif; ?>

                                        <div class="col-md-6" style="align-self: center;">
                                            <h6 class="text-left fonte" style="letter-spacing: 1px" ><?php echo e($chamado['name']); ?></h6>
                                        </div>



                                        <div class="col-2 text-center" style="align-self: center;">
                                            <h6 ><?php echo e(date('d/m/y', strtotime($chamado['date_creation']))); ?></h6>
                                        </div>

                                        <div class="col-2 text-center" style="align-self: center;">

                                                <?php if(date("Y-m-d H:i:s", strtotime('-3 days')) < $chamado['date_mod'] or $chamado['status'] == 3 or  $chamado['users_id_recipient'] != 56): ?>
                                                    <h6 class="fonte"><?php echo e(date('d/m/y', strtotime($chamado['date_mod']))); ?></h6>
                                                <?php else: ?>
                                                    <h6 class="alarme fonte" style="color:rgb(158, 8, 8)"><?php echo e(date('d/m/y', strtotime($chamado['date_mod']))); ?></h6>

                                                        <?php if(date("m") == date('m', strtotime($chamado['date_mod']))): ?>
                                                            <span class="text-muted alarme"><h6><?php echo e(date("d") - date('d', strtotime($chamado['date_mod']))); ?> dias sem interação</h6></span>
                                                        <?php else: ?>
                                                            <span class="text-muted alarme">(Mês passado)</span>
                                                        <?php endif; ?>
                                                <?php endif; ?>


                                        </div>



                                        
                                        <?php if($chamado['status'] == '2' ): ?>
                                            <div class="col-md-1 text-center" style="align-self: center;">
                                                <span class="fonte" style="align-items: center;">
                                                    <i class="bi bi-record ml-1" style="color:rgb(83, 182, 17);"></i>
                                                </span>
                                            </div>
                                        <?php endif; ?>
                                        <?php if($chamado['status'] == '3' ): ?>

                                            <div class="col-md-1  text-center">
                                                <span class="fonte" style="align-items: center;">
                                                    <i class="bi bi-clock-fill ml-2" style="color:rgb(38, 139, 197);"></i>
                                                </span>

                                            </div>
                                        <?php endif; ?>
                                        <?php if($chamado['status'] == '4'): ?>
                                            <div class="col-md-1  text-center " style="align-self: center;" >
                                                <div class="row justify-content-center">
                                                    <i class="bi bi-record-fill ml-1 fonte" style="color:rgb(228, 182, 32);"></i>

                                                </div>
                                            </div>

                                        <?php endif; ?>

                                    </div>
                            </div>
                            <input type="hidden" <?php echo e($contador = 1); ?>>

                        

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
            </div>

            <div class="col-lg-6  px-5">
                <div class="col-12 mt-3 mb-2  text-center ">
                    <h4 class="text-uppercase">Chamados Mensais</h4>
                    <p>Mês atual</p>
                </div>
                <div class="row justify-content-center mt-5 mb-2">
                        <div class="col-xl-4 ">
                            <div class="card overflow-hidden">
                            <div class="card-content">
                                <div class="card-body cleartfix">
                                <div class="media align-items-stretch">
                                    <div class="align-self-center">
                                    <i class="icon-pencil danger font-large-2 mr-2"></i>
                                    </div>
                                    <div class="media-body">
                                    <h4>Chamados</h4>
                                    <span>Total aberto</span>
                                    </div>
                                    <div class="align-self-center">
                                    <h3><strong><?php echo e($total['Total']); ?></strong></h3>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="col-xl-4 ">
                            <div class="card overflow-hidden">
                            <div class="card-content">
                                <div class="card-body cleartfix">
                                <div class="media align-items-stretch">
                                    <div class="align-self-center">
                                    <i class="icon-pointer warning font-large-2 mr-2"></i>
                                    </div>
                                    <div class="media-body">
                                    <h4>Portal</h4>
                                    <span>Chamados - Web</span>
                                    </div>
                                    <div class="align-self-center">
                                    <h3><?php echo e($total['Total_portal']); ?></h3>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="card overflow-hidden">
                            <div class="card-content">
                                <div class="card-body cleartfix">
                                <div class="media align-items-stretch">
                                    <div class="align-self-center">
                                        <img src="<?php echo e(URL::asset('images/GLPI.png')); ?>" class=" float-right mr-1" width="50" height="50" style="border-radius: 50%;" alt="...">
                                    </div>
                                    <div class="media-body">
                                    <h4>GLPI</h4>
                                    <span>Interno</span>
                                    </div>
                                    <div class="align-self-center">
                                    <h3><?php echo e($total['Total_glpi']); ?></h3>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>




                    <div class="col-12 mt-5">
                        <div class="chart-container " style="position: relative; height:43vh; width:43vw">
                            <canvas  id="myChart" ></canvas>
                        </div>
                    </div>
                    <section id="minimal-statistics">
                        <div class="row justify-content-center mb-2">

                            <div class="col-12 mt-3 mb-2  text-center fade-bottom ">
                                <h4 class="text-uppercase">Solucionados </h4>
                            </div>
                                <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-content">
                                                <div class="card-body">
                                                    <div class="media d-flex">
                                                        <div class="media-body text-left">
                                                        <h3 class="danger"><?php echo e($total['Total_tec']); ?></h3>
                                                        <span>Solucionados</span>
                                                        </div>
                                                        <div class="align-self-center">
                                                        <i class="icon-rocket danger font-large-2 float-right"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>


                                <div class="col-md-6 ">
                                    <div class="card">
                                        <div class="card-content">
                                            <div class="card-body">
                                            <div class="media d-flex">
                                                <div class="align-self-center">
                                                <i class="icon-graph success font-large-2 float-left"></i>
                                                </div>
                                                <div class="media-body text-right">
                                                <h3><?php echo intval(($total['Total_tec']*100)/$total['Total']); ?>%</h3>
                                                <span>Solucionados</span>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <script>
        var ctx = document.getElementById('myChart');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Matriz', '01 - Joinville', '02 - Biguaçu', '03 - Palhoça', '04 - Itajaí', '06 - Balneario','08 - Centro','09 - Trindade','11 - Joinville','12 - Blumenau','21 - Estreito','24 - Rio do Sul',
                '26 - Itapema','27 - Jaraguá','28 - Blumenau','29 - Tijucas','30 - Brusque','32 - Vargem Grande','34 - Porto Belo','35 - Campeche','36 - Itajaí'],
                datasets: [{
                    fill: false,
                    label: '# Chamados',
                    data: [<?php echo e($filial['1']); ?>+<?php echo e($filial['22']); ?>+<?php echo e($filial['23']); ?>+<?php echo e($filial['24']); ?>+<?php echo e($filial['25']); ?>+<?php echo e($filial['26']); ?>+<?php echo e($filial['27']); ?>, <?php echo e($filial['2']); ?>, <?php echo e($filial['3']); ?>, <?php echo e($filial['4']); ?>, <?php echo e($filial['5']); ?>, <?php echo e($filial['6']); ?>, <?php echo e($filial['7']); ?>, <?php echo e($filial['8']); ?>,
                        <?php echo e($filial['9']); ?>, <?php echo e($filial['10']); ?>, <?php echo e($filial['11']); ?>, <?php echo e($filial['12']); ?>, <?php echo e($filial['13']); ?>, <?php echo e($filial['14']); ?>, <?php echo e($filial['15']); ?>, <?php echo e($filial['16']); ?> ,
                        <?php echo e($filial['17']); ?>, <?php echo e($filial['18']); ?>, <?php echo e($filial['19']); ?>, <?php echo e($filial['20']); ?>,<?php echo e($filial['21']); ?> ],
                    backgroundColor: [
                        'rgba(255, 23, 23, 0.2)',
                        'rgba(30, 162, 23, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(30, 162, 23, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive:true,
                indexAxis: 'x',
                scales: {
                    x: {
                        display: true
                    },
                    y: {
                        display: true
                    }
                }
            }
        })
    </script>
<?php /**PATH C:\laragon\www\Bugs\resources\views/admin/painel-page.blade.php ENDPATH**/ ?>