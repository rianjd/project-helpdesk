@extends('admin.base-admin')
@php
    $contador = 0;
@endphp

<link href="{{URL::asset('css/main.css')}}" rel='stylesheet' />
<link href='https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.13.1/css/all.css' rel='stylesheet'>

<script src='{{URL::asset("js/main.js")}}'></script>


<style>

    body[data-isDarkmode = "true"] .fc-daygrid-day-number{
        color: #fff;
    }
    .fc-license-message{
        opacity: 0;
    }
</style>
@section('content')

    <div class="container-fluid" style="height: 100vh">
        <div class="row justify-content-center mt-5">
            <div class="col-12 mb-5 text-center"><h1>Plantão </h1></div>
            <div class="col-5">
                <div id='calendar' ></div>
            </div>
            <div class="col-3 offset-1 ">
                @foreach ($escala as $escalas)
                        @if ($contador == 0)
                            <h3 style="color:rgb(35, 143, 214); ">Next</h3>
                            <div class="card" style="box-shadow: 0px 0px 4px rgba(63, 100, 180, 0.534); scale: 100%;">
                        @else
                            <div class="card" style="scale:90%;">
                        @endif
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="media d-flex">

                                            <div class="align-self-center">
                                                <img src="/storage/profile/{{$escalas['obs']}}.jpg" class=" float-right" width="50" height="50" style="border-radius: 50%;" alt="...">
                                            </div>
                                            <div class="media-body text-right">
                                                @if ($escalas['nome'] == Auth::user()->name)
                                                    <h2 style="color:rgb(255, 208, 0);">Você</h2>
                                                @else
                                                    <h2 >{{$escalas['nome']}}</h2>
                                                @endif
                                                <span>{{date('d/m', strtotime($escalas['data']))}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @php
                                $contador +=1;
                            @endphp
                @endforeach
            </div>

        </div>

    </div>

    </div>

@endsection
@section('script')
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

@endsection
