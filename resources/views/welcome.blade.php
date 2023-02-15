<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="//fonts.googleapis.com/css?family=Lato:300,400,700,400italic%7CJosefin+Sans:400,700,300italic%7CBebasNeue%7CChanga%7CKoulen%7CPassion+One%7CYantramanav%7CChivo%7CMerriweather+Sans%7CAbel%7CJost%7CCantarell" rel="stylesheet">
        <link rel="icon" type="image/png" sizes="32x32" href="{{URL::asset('images/favicon-32x32.png')}}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <link rel="stylesheet" href="{{URL::asset('css/style.css')}}">

        <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/5a04192bbd.js" crossorigin="anonymous"></script>
        <title>Chamados - local</title>
    </head>
    <body style="background-color: rgb(250, 250, 250) ">
        <nav class="navbar navbar-light navbar-expand-lg shadow-sm sticky-top" style=" padding:.4em 3em; background-color:rgb(255, 255, 255);">
            <a class="navbar-brand" href="#">
                <img class="logomarca" src="{{URL::asset('images/your_logo.png')}}" width="80">
                <a class="navbar-brand" style="margin-right: -5em;" href="#"></a>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="true" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav" style="font-family: Chivo; font-size:17px;">
                    <li class="nav-item active">
                        <a class="nav-link mr-5" href="/"><i class="bi bi-grid-1x2-fill" style="margin-right:10px;color: #002c5e;"></i>Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown">
                        <a class="nav-link mr-5 dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >Dropdown</a>
                        <div class="dropdown-menu " aria-labelledby="dropdownMenuButton">
                            <p class="dropdown-item disabled" style="color: rgb(54, 54, 54)"><strong>Dropdown</strong></p>
                            <a class="dropdown-item" href="/chamado">Link 1</a>
                            <a class="dropdown-item"  data-toggle="modal" data-target="#modalCore">Link 2</a>
                            <a class="dropdown-item" href="/email">Link 3</a>
                            <a class="dropdown-item" href="/chat">Link 4</a>
                        </div>
                    </div>
                    </li>

                    <li class="nav-item ">
                        <a class="nav-link mr-5" href="/getChamado">Admin</a>
                    </li>

                    @if (Auth::check() and Auth::user()->comment !== null)
                    <li class="nav-item ">
                        <a class="nav-link mr-5" href="/admin/dashboard">Dashboard</a>
                    </li>

                    @endif
                </ul>
            </div>

            {{-- ENTRAR/SAIR --}}
            @if ( Auth::check() )

                <div class="dropleft">
                    @if (Auth::user()->locations_id == 0)
                    <a class="nav-link dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" ><img src="storage/profile/{{Auth::user()->comment}}.jpg" width="40" height="40" style="border-radius: 50%;" alt="Sair"></a>
                    @else
                    <a class="nav-link dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" ><img src="storage/profile/none.jpg" width="40" height="40" style="border-radius: 50%;" ></a>
                    @endif
                    <div class="dropdown-menu " aria-labelledby="dropdownMenuButton">
                        <p class="dropdown-item disabled" style="color: rgb(54, 54, 54)"><strong>{{Auth::user()->name}}</strong></p>
                        @if (Auth::user()->comment !== null) <a class="dropdown-item" href="/perfil">Ver perfil</a> @else <a class="dropdown-item disabled" href="/perfil">Ver perfil</a>@endif
                        <a class="dropdown-item" href="/logout">Sair</a>
                    </div>
                </div>
            @else
            <ul class="navbar-nav" style="font-family: Chivo; font-size:17px;">
                <li class="nav-item ">
                    <a class="nav-link" href="/getChamado"><i class="bi bi-box-arrow-in-right mr-2"></i>Entrar</a>
                </li>
            </ul>
            @endif
        </nav>
        @yield('conteudo')
        <!--CONTEUDO-->
        <!-- Modal Core -->
        <div class="modal fade" id="modalCore" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel"><img src="{{URL::asset('images/corebusiness_1200x300.png')}}" width="120" height="30" class="align-top mt-1 mr-2" alt="">
                        Solicitações</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body" style="background-color: rgb(251, 254, 255)">
                        <div class="card mb-5 shadow-sm" id="Tone">
                            <div class="card-body text-center">
                                <h5 class="card-title"><i class="bi bi-person-plus-fill mr-1"></i>Criação de login</h5>
                                <p class="card-text mb-3">Enviar informações do colaborador para a criação de um login novo.</p>
                                <a href="/core" class="btn btn-primary"  >Solicitar login</a>
                            </div>
                        </div>
                        <div class="card mb-5 shadow-sm">
                            <div class="card-body text-center " >
                                <h5 class="card-title"><i class="bi bi-gear mr-1"></i>Ajustes de usuário</h5>
                                <p class="card-text mb-3">Alterar permissões, login, senha, entre outras solicitações referentes a usuários já existentes</p>
                                <a href="/coreajuste" class="btn btn-primary">Abrir </a>
                            </div>
                        </div>
                            <div class="card-body text-center alert alert-warning">
                                <h5 class="card-title"><i class="bi bi-exclamation-diamond mr-1 mr-1" style="color: rgb(211, 175, 14);"></i>IMPORTANTE</h5>
                                <p class="mb-3">Esse formulário não é destinado para SUPORTE operacional do sistema, caso seja isso que esteja procurando, favor enviar no grupo de Whatsapp de Duvidas.</p>
                            </div>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>
