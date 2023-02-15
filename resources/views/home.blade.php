<style>
    .card-tipo {
        background-image: linear-gradient(to right, rgb(230, 211, 170), rgb(248, 233, 205));
    }
</style>

<div style="background-color: rgb(78, 109, 49); max-height:200px;">

    <section id="stats-subtitle">
        <div class="row justify-content-center">
            <div class="col-12 mt-3 mb-3 text-center">
                <h1 class="text-uppercase " style="color: aliceblue; font-family:Abel;">Nome da empresa</h1>
                <p  style="color:rgb(225, 233, 241)">Subtitulo</p>
            </div>
        </div>
    </section>
</div>
@extends('welcome')
<link rel="stylesheet" href="css/home.css">

@section('conteudo')

    <div class="container-fluid" style="padding-top: 50px;">

        <div class="row justify-content-center">
            <div class="col-md-8 mb-5">
                <div class="card-body">
                    <blockquote>
                        Ticket system<br>
                        <small>
                            - Home view
                        </small>
                    </blockquote>
                    <p>This page is a preview of a ticket system where the customer opens and tracks support requests.<br>
                    Server side works on Laravel Framework with MySql</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">

            <div class="col-md-4 mb-2">
                <div class="card mb-4 shadow-sm fadeInRight" id="card">
                    <div class="color-header" style="background-image: url(images/img3.jpg);background-size: cover;"></div>
                    <div class="logo text-center">
                        <h3 class="title">Form title</h3>
                    </div>
                    <div class="card_title mb-3 sans"></div>
                    <div class="card-description">
                        <p>Description text</p>
                        <a href="/chamado" class="btn btn-primary mb-4 sans"
                            style="background-color: rgb(45, 65, 46) !important;"><i
                                class="bi bi-arrow-return-right mr-1 yellow"></i>Abrir</a>
                    </div>
                </div>

            </div>
            <div class="col-md-4 mb-2">
                <div class="card mb-4 shadow-sm fadeInRight" id="card">
                    <div class="color-header" style="background-image: url(images/lula.png);background-size: cover;"></div>
                    <div class="logo text-center">
                        <h3 class="title">Form title</h3>
                    </div>
                    <div class="card_title mb-3 sans"></div>
                    <div class="card-description">
                        <p>Description text</p>
                        <a href="/chamado" class="btn btn-primary mb-4 sans"
                            style="background-color: rgb(45, 65, 46) !important;"><i
                                class="bi bi-arrow-return-right mr-1 yellow"></i>Abrir</a>
                    </div>
                </div>

            </div>
        </div>

        @endsection
