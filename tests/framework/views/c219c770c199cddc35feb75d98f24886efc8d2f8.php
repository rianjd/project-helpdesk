<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<?php $__env->startSection('conteudo'); ?>

<link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap-extended.min.css">
<link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/fonts/simple-line-icons/style.min.css">
<link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/colors.min.css">
<link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">

<div class="" style="background-color:#c6c6c62b; max-height:200px;">

    <section id="stats-subtitle">
        <div class="row justify-content-center">
                <div class="col-12 mt-3 mb-3 text-center">
                    <h4 class="text-uppercase">Dashboard chamados<i class="icon-pie-chart warning font-large-2 mx-1"></i></h4>
                    <p class="mr-5">Dashboard dos chamados mensais</p>
                </div>
        </div>
    </section>
</div>
<div class="grey-bg container-fluid">

    <div class="row justify-content-center mt-5 mb-2">


        <div class="col-xl-3 ">
            <div class="card overflow-hidden">
            <div class="card-content">
                <div class="card-body cleartfix">
                <div class="media align-items-stretch">
                    <div class="align-self-center">
                    <i class="icon-pencil danger font-large-2 mr-2"></i>
                    </div>
                    <div class="media-body">
                    <h4>Chamados abertos</h4>
                    <span>Total abertos no mês</span>
                    </div>
                    <div class="align-self-center">
                    <h1><strong><?php echo e($total['Total']); ?></strong></h1>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        <div class="col-xl-3 ">
            <div class="card overflow-hidden">
            <div class="card-content">
                <div class="card-body cleartfix">
                <div class="media align-items-stretch">
                    <div class="align-self-center">
                    <i class="icon-pointer warning font-large-2 mr-2"></i>
                    </div>
                    <div class="media-body">
                    <h4>Portal de chamados</h4>
                    <span>Web</span>
                    </div>
                    <div class="align-self-center">
                    <h2><?php echo e($total['Total_portal']); ?></h2>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        <div class="col-xl-3 ">
            <div class="card overflow-hidden">
            <div class="card-content">
                <div class="card-body cleartfix">
                <div class="media align-items-stretch">
                    <div class="align-self-center">
                        <img src="images/GLPI.png" class=" float-right mr-1" width="50" height="50" style="border-radius: 50%;" alt="...">
                    </div>
                    <div class="media-body">
                    <h4>GLPI</h4>
                    <span>Interno</span>
                    </div>
                    <div class="align-self-center">
                    <h2><?php echo e($total['Total_glpi']); ?></h2>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>



        <div class="col-6 mt-5" style="height: 50vh;">
            <div class="chart-container " style="position: relative; height:24vh; width:48vw">
                <canvas  id="myChart" ></canvas>
            </div>
        </div>
        <div class="col-6 mt-5">
            <div class="chart-container " style="position: relative; height:23vh; width:46vw">
                <canvas  id="myCharto"></canvas>
            </div>
        </div>
    </div>
    <section id="minimal-statistics">
    

    <div class="row justify-content-center mb-3">
        <div class="col-12 mt-3 mb-2  text-center">
            <h4 class="text-uppercase">Chamados Solucionados </h4>
            <p>Mês atual</p>
        </div>

        <div class="col-sm-3">
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


        <div class="col-sm-3 ">
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
    <div class="row">


        <?php $__currentLoopData = $tec_count; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key_tec => $tecnosh): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($key_tec != '56' ): ?>
        <div class="col-xl-2 col-sm-6 col-12">
            <div class="card" >
            <div class="card-content">
                <div class="card-body">
                <div class="media d-flex">
                    <div class="media-body text-left">
                    <h3 style="color: #16A7D3 !important;"><?php echo e($tec[$key_tec]); ?></h3>
                    <span><strong><?php echo e($tecnosh); ?></strong></span>
                    </div>
                    <div class="align-self-center">
                        <?php if($key_tec == 8): ?>
                            <img src="images/homer.png" class=" float-right" width="50" height="50" style="border-radius: 50%;" alt="...">
                        <?php elseif($key_tec == 2): ?>
                            <i class="icon-user  font-large-2 float-right" style="color: #16A7D3 !important;"></i>
                        <?php elseif($key_tec == 59): ?>
                            <img src="images/goku.png" class=" float-right" width="50" height="50" style="border-radius: 50%;" alt="...">
                        <?php elseif($key_tec == 60): ?>
                            <img src="images/mad.png" class=" float-right" width="50" height="50" style="border-radius: 50%;" alt="...">
                        <?php elseif($key_tec == 61): ?>
                            <img src="images/matheus.png" class=" float-right" width="50" height="50" style="border-radius: 50%;" alt="...">
                        <?php elseif($key_tec == 54): ?>
                            <i class="icon-user  font-large-2 float-right" style="color: #16A7D3 !important;"></i>
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
    <div class="row justify-content-center mb-3">
        <div class="col-12 mt-5 mb-2  text-center">
            <h4 class="text-uppercase">Chamados por categoria</h4>
            <p>Mês atual</p>
        </div>
        <div class="col-4 offset-1">
                <div class="chart-container " style="position: relative; height:13vh; width:26vw">
                    <canvas  id="myCharte"></canvas>
                </div>
        </div>
        <div class="col-4">
            <div class="col-5">
            <div class="card" >
                <div class="card-content">
                    <div class="card-body ">
                    <?php $__currentLoopData = $tipo_chamado; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nome => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="media d-flex mb-2">
                        <div class="media-body text-left text-center">
                        <?php if($nome =='Core'): ?><h3 style="color: #ffbb00 !important;"><?php echo e($nome); ?></h3><?php endif; ?>
                        <?php if($nome =='DJ'): ?><h3 style="color: #0089a1 !important;"><?php echo e($nome); ?></h3><?php endif; ?>
                        <?php if($nome =='Email'): ?><h3 style="color: #00c2c9 !important;"><?php echo e($nome); ?></h3><?php endif; ?>
                        <?php if($nome =='Chat'): ?><h3 style="color: #1a9b00 !important;"><?php echo e($nome); ?></h3><?php endif; ?>
                        <?php if($nome =='chamado'): ?><h3 style="color: #ff4141 !important;">Chamados</h3><?php endif; ?>
                        <?php if($nome =='ajuste'): ?><h3 style="color: #d410ba !important;">Ajustes</h3><?php endif; ?>


                        <span class=""><strong><?php echo e($item); ?></strong></span>
                        </div>
                        <div class="divider-sm"></div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
        

    </section>

</div>
<footer class="pt-5 pb-2 text-center">
    <p style="color: rgb(126, 126, 126)">Footer maneiro </p>
</footer>
<script>
    const ctx = document.getElementById('myChart');
    const myChart = new Chart(ctx, {
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
    });


    const ctxo = document.getElementById('myCharto');
    const myCharto = new Chart(ctxo, {
        type: 'line',
        data: {
            labels: ['Jan','Feb','Mar','Apr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dec',],
            datasets: [{
                fill: true,
                label: '# Chamados',
                data: [<?php echo e($total_mes['1']); ?>,<?php echo e($total_mes['2']); ?>,<?php echo e($total_mes['3']); ?>,<?php echo e($total_mes['4']); ?>,<?php echo e($total_mes['5']); ?>,<?php echo e($total_mes['6']); ?>,<?php echo e($total_mes['7']); ?>,<?php echo e($total_mes['8']); ?>,<?php echo e($total_mes['9']); ?>,<?php echo e($total_mes['10']); ?>,<?php echo e($total_mes['11']); ?>,<?php echo e($total_mes['12']); ?>],
                backgroundColor:[
                    'rgba(75, 192, 192, 0.2)'
                ],
                borderColor: [
                    'rgb(75, 192, 192)',

                ],
                tension: 0.1,
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
    });
    const ctxe = document.getElementById('myCharte');
    const myCharte = new Chart(ctxe, {
        type: 'doughnut',
        data: {
            //labels: ['Core','DJ','Email','Chat','Chamados','Ajuste'],
            datasets: [{
                fill: true,
                label: '# Chamados',
                data: [<?php echo e($tipo_chamado['Core']); ?>,<?php echo e($tipo_chamado['DJ']); ?>,<?php echo e($tipo_chamado['Email']); ?>,<?php echo e($tipo_chamado['Chat']); ?>,<?php echo e($tipo_chamado['chamado']); ?>,<?php echo e($tipo_chamado['ajuste']); ?>],
                backgroundColor:[
                    'rgba(255, 188, 50)',
                    'rgba(0, 150, 180)',
                    'rgba(75, 192, 192)',
                    'rgba(40, 159, 64)',
                    'rgba(255, 70, 70)',
                    'rgba(255, 80, 180)',

                ],
                borderColor: [
                    'rgb(255, 255, 255)',

                ],
                tension: 0.1,
                borderWidth: 1
            }]
        },
        options: {
            responsive:true,

        }
    });


</script>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Bugs\resources\views/dashboard.blade.php ENDPATH**/ ?>