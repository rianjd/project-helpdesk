@extends('admin.base-admin')
@section('styles')
    <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/colors.min.css">
    <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/fonts/simple-line-icons/style.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.1/chart.min.js" integrity="sha512-O2fWHvFel3xjQSi9FyzKXWLTvnom+lOYR/AUEThL/fbP4hv1Lo5LCFCGuTXBRyKC4K4DJldg5kxptkgXAzUpvA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha512-U6K1YLIFUWcvuw5ucmMtT9HH4t0uz3M366qrF5y4vnyH6dgDzndlcGvH/Lz5k8NFh80SN95aJ5rqGZEdaQZ7ZQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $.getJSON("https://api.ipify.org?format=json", function(data) {

        // Setting text of element P with id gfg
        $.get('{{route("testeip")}}', {ip: data.ip}, (result) => {
            console.log(result);
        });
    })
</script>
@section('content')

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
                            <h3><strong>{{$total['Total']}}</strong></h3>
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
                            <h3>{{$total['Total_portal']}}</h3>
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
                                <img src="{{URL::asset('images/GLPI.png')}}" class=" float-right mr-1" width="50" height="50" style="border-radius: 50%;" alt="...">
                            </div>
                            <div class="media-body">
                            <h4>GLPI</h4>
                            <span>Interno</span>
                            </div>
                            <div class="align-self-center">
                            <h3>{{$total['Total_glpi']}}</h3>
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
                                        <h3 class="danger">{{$total['Total_tec']}}</h3>
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


                @foreach ($tec_count as $key_tec => $tecnosh)
                @if ($key_tec != '56' )
                <div class="col-xl-2 col-sm-6 col-12">

                    @if ($tecnosh > 100)
                    <div class="card" style="box-shadow: 0px 0px 4px #ff6767">
                        <span class="position-absolute badge_"><h3><i class="bi bi-gem mr-1" style="color: #af1313 !important;"></i></h3></span>

                    @elseif ($tecnosh > 50)
                    <div class="card" style="box-shadow: 0px 0px 4px #ffe761">
                        <span class="position-absolute badge_"><h3><i class="bi bi-fire mr-1" style="color: #c0a50b !important;"></i></h3></span>

                    @elseif ($tecnosh > 25)
                    <div class="card" style="box-shadow: 0px 0px 2px #16A7D3">
                        <span class="position-absolute badge_"><h3><i class="bi bi-lightning-charge-fill mr-1" style="color: #16A7D3 !important;"></i></h3></span>

                    @else
                    <div class="card">
                    @endif

                        <div class="card-content">
                            <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    @if ($tecnosh > 100)
                                    <h3 style="color: #af1313 !important;">{{$tec[$key_tec]}}</h3>

                                    @elseif ($tecnosh > 50)
                                    <h3 style="color: #c0a50b !important;">{{$tec[$key_tec]}}</h3>
                                    @elseif ($tecnosh > 25)
                                    <h3 style="color: #16A7D3 !important;">{{$tec[$key_tec]}}</h3>

                                    @else
                                    <h3 style="color: #16A7D3 !important;">{{$tec[$key_tec]}}</h3>

                                    @endif

                            <span><strong>{{$tecnosh}}</strong></span>
                            </div>
                            <div class="align-self-center">
                                <img src="/storage/profile/{{$key_tec}}.jpg" class=" float-right" width="50" height="50" style="border-radius: 50%;" alt="...">
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                @endif
                @endforeach

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
       <p>{{request()->cookie('feedback')}}</p>



@endsection
@section('script')
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
                    data: [{{$filial['1']}}+{{$filial['22']}}+{{$filial['23']}}+{{$filial['24']}}+{{$filial['25']}}+{{$filial['26']}}+{{$filial['27']}}, {{$filial['2']}}, {{$filial['3']}}, {{$filial['4']}}, {{$filial['5']}}, {{$filial['6']}}, {{$filial['7']}}, {{$filial['8']}},
                        {{$filial['9']}}, {{$filial['10']}}, {{$filial['11']}}, {{$filial['12']}}, {{$filial['13']}}, {{$filial['14']}}, {{$filial['15']}}, {{$filial['16']}} ,
                        {{$filial['17']}}, {{$filial['18']}}, {{$filial['19']}}, {{$filial['20']}},{{$filial['21']}} ],
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
                    data: [{{$total_mes['1']}},{{$total_mes['2']}},{{$total_mes['3']}},{{$total_mes['4']}},{{$total_mes['5']}},{{$total_mes['6']}},{{$total_mes['7']}},{{$total_mes['8']}},{{$total_mes['9']}},{{$total_mes['10']}},{{$total_mes['11']}},{{$total_mes['12']}}],
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
                    data: [{{$tipo_chamado['Core']}},{{$tipo_chamado['Computador']}},{{$tipo_chamado['Internet']}},{{$tipo_chamado['Infra']}},{{$tipo_chamado['Telefonia']}},
                    {{$tipo_chamado['Impressora']}},{{$tipo_chamado['Scanner']}},{{$tipo_chamado['Aplicativos']}},{{$tipo_chamado['Sistema']}},{{$tipo_chamado['Equipamento']}},{{$tipo_chamado['Acesso']}}
                    ,{{$tipo_chamado['Material']}},{{$tipo_chamado['Email']}},{{$tipo_chamado['Assinatura']}},{{$tipo_chamado['Chat']}}],

                    backgroundColor: [
                        'rgba(255, 23, 23, 0.6)',
                        'rgba(30, 162, 23, 0.6)',
                        'rgba(255, 206, 86, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(153, 102, 255, 0.6)',
                        'rgba(255, 159, 64, 0.6)'
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
@endsection
