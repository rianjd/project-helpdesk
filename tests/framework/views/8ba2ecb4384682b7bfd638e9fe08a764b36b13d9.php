<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/colors.min.css">
    <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/fonts/simple-line-icons/style.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.1/chart.min.js" integrity="sha512-O2fWHvFel3xjQSi9FyzKXWLTvnom+lOYR/AUEThL/fbP4hv1Lo5LCFCGuTXBRyKC4K4DJldg5kxptkgXAzUpvA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<?php $__env->stopSection(); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha512-U6K1YLIFUWcvuw5ucmMtT9HH4t0uz3M366qrF5y4vnyH6dgDzndlcGvH/Lz5k8NFh80SN95aJ5rqGZEdaQZ7ZQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $.getJSON("https://api.ipify.org?format=json", function(data) {

        // Setting text of element P with id gfg
        $.get('<?php echo e(route("testeip")); ?>', {ip: data.ip}, (result) => {
            console.log(result);
        });
    })
</script>
<?php $__env->startSection('content'); ?>

    <div class="container-fluid">

        <div class="grey-bg container-fluid">

            <div class="row justify-content-center mt-5 mb-2">


                <div class="col-xl-3 fadeTop1">
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
                <div class="col-xl-3 fadeTop2">
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
                <div class="col-xl-3 fadeTop3">
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



                <div class="col-6 mt-5" style="height: 45vh;">
                    <div class="chart-container " style="position: relative; height:20vh; width:38vw">
                        <canvas  id="myChart" ></canvas>
                    </div>
                </div>
                <div class="col-6 mt-5">
                    <div class="chart-container " style="position: relative; height:20vh; width:38vw">
                        <canvas  id="myCharto"></canvas>
                    </div>
                </div>
            </div>
            <section id="minimal-statistics">


            <div class="row justify-content-center mb-3">
                <div class="col-12 mt-3 mb-2  text-center fade-bottom ">
                    <h4 class="text-uppercase">Chamados Solucionados </h4>
                    <p>Mês atual</p>
                </div>

                <div class="col-sm-3 fade-bottom">
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


                <div class="col-sm-3 fade-bottom">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                            <div class="media d-flex">
                                <div class="align-self-center">
                                <i class="icon-graph success font-large-2 float-left"></i>
                                </div>
                                <div class="media-body text-right">
                                <h3><?php if ($total['Total_tec'] != 0) {echo intval(($total['Total_tec']*100)/$total['Total']);} else { echo 0;} ?>%</h3>
                                <span>Solucionados</span>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">


                <?php $__currentLoopData = $tec_count; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key_tec => $tecnosh): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($key_tec != '56' ): ?>
                <div class="col-xl-2 col-sm-6 col-12">

                    <?php if($tecnosh > 100): ?>
                    <div class="card" style="box-shadow: 0px 0px 4px #ff6767">
                        <span class="position-absolute badge_"><h3><i class="bi bi-gem mr-1" style="color: #af1313 !important;"></i></h3></span>

                    <?php elseif($tecnosh > 50): ?>
                    <div class="card" style="box-shadow: 0px 0px 4px #ffe761">
                        <span class="position-absolute badge_"><h3><i class="bi bi-fire mr-1" style="color: #c0a50b !important;"></i></h3></span>

                    <?php elseif($tecnosh > 25): ?>
                    <div class="card" style="box-shadow: 0px 0px 2px #16A7D3">
                        <span class="position-absolute badge_"><h3><i class="bi bi-lightning-charge-fill mr-1" style="color: #16A7D3 !important;"></i></h3></span>

                    <?php else: ?>
                    <div class="card">
                    <?php endif; ?>

                        <div class="card-content">
                            <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <?php if($tecnosh > 100): ?>
                                    <h3 style="color: #af1313 !important;"><?php echo e($tec[$key_tec]); ?></h3>

                                    <?php elseif($tecnosh > 50): ?>
                                    <h3 style="color: #c0a50b !important;"><?php echo e($tec[$key_tec]); ?></h3>
                                    <?php elseif($tecnosh > 25): ?>
                                    <h3 style="color: #16A7D3 !important;"><?php echo e($tec[$key_tec]); ?></h3>

                                    <?php else: ?>
                                    <h3 style="color: #16A7D3 !important;"><?php echo e($tec[$key_tec]); ?></h3>

                                    <?php endif; ?>

                            <span><strong><?php echo e($tecnosh); ?></strong></span>
                            </div>
                            <div class="align-self-center">
                                <img src="/storage/profile/<?php echo e($key_tec); ?>.jpg" class=" float-right" width="50" height="50" style="border-radius: 50%;" alt="...">
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
            <div class="row justify-content-center mb-5">
                <div class="col-12 mt-5 mb-2  text-center">
                    <h4 class="text-uppercase">Chamados por categoria</h4>
                    <p>Mês atual</p>
                </div>
                <div class="col-md-6 ">
                        <div class="chart-container " style="position: relative;  height:19vh; width:38vw">
                            <canvas  id="myCharte"></canvas>
                        </div>
                </div>

            </div>

            </section>

        </div>
    </div>
    <footer class=" text-center" style="margin-top: 15em;">
        <p style="color: rgb(126, 126, 126)">        © 2022 Desenvolvido por : Casas da Água
        </p>
    </footer>
    </div>
       <p><?php echo e(request()->cookie('feedback')); ?></p>



<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
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
            type: 'bar',
            data: {
                labels: ['Core','Computador','Internet','Infra','Telefonia','Impressora','Scanner','Aplicativos','Sistema','Equipamento','Acesso','Material','Email','Assinatura','Chat'],
                datasets: [{
                    fill: true,
                    label: '# Chamados',
                    data: [<?php echo e($tipo_chamado['Core']); ?>,<?php echo e($tipo_chamado['Computador']); ?>,<?php echo e($tipo_chamado['Internet']); ?>,<?php echo e($tipo_chamado['Infra']); ?>,<?php echo e($tipo_chamado['Telefonia']); ?>,
                    <?php echo e($tipo_chamado['Impressora']); ?>,<?php echo e($tipo_chamado['Scanner']); ?>,<?php echo e($tipo_chamado['Aplicativos']); ?>,<?php echo e($tipo_chamado['Sistema']); ?>,<?php echo e($tipo_chamado['Equipamento']); ?>,<?php echo e($tipo_chamado['Acesso']); ?>

                    ,<?php echo e($tipo_chamado['Material']); ?>,<?php echo e($tipo_chamado['Email']); ?>,<?php echo e($tipo_chamado['Assinatura']); ?>,<?php echo e($tipo_chamado['Chat']); ?>],

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

                    borderWidth: 1
                }]
            },
            options: {
                responsive:true,
                indexAxis: 'y',
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


        function reveal() {
            var reveals = document.querySelectorAll(".reveal");

            for (var i = 0; i < reveals.length; i++) {
                var windowHeight = window.innerHeight;
                var elementTop = reveals[i].getBoundingClientRect().top;
                var elementVisible = 20;

                if (elementTop < windowHeight - elementVisible) {
                reveals[i].classList.add("active");
                } else {
                reveals[i].classList.remove("active");
                }
            }
            }

        window.addEventListener("scroll", reveal);

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.base-admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Bugs\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>