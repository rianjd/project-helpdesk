@extends('admin.base-admin')
<link rel="stylesheet" href="{{ URL::asset('css/contact.css') }}">

@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>

    <script>
        $(document).on('click', ".baixar", function() {
            let id = $(this).attr("data-value")
            let tipo = $(this).attr('title')
            $.post('{{ route('baixar.relatorio') }}', {
                "_token": "{{ csrf_token() }}",
                'tipo': tipo
            }, (result) => {
                console.log(result);
            })
        })
    </script>

    <div class="container-fluid mt-2">
        <div class="p-5 mb-5" style="background-image: url('{{ URL::asset('images/back.jpg') }}'); border-radius:5px;">
            <h1 class="text-center" style="color: aliceblue">Estoque<i class="bi bi-box-seam ml-3"
                    style="color: #fbca0a;"></i></h1>
            <p class="lead text-center" style="color: rgb(224, 224, 224)">Itens e materiais</p>

        </div>

        <div class="row mb-3">

            {{-- Pesquisar --}}
            <div class="col-1 text-right">
                <i class="bi bi-search"></i>
            </div>
            <div class="col-6">
                <input class="form-control mr-sm-2" id="searchbar" onkeyup="search_animal()" type="text" name="search"
                    placeholder="Procurar itens..">
            </div>

            {{-- add estoque --}}
            <div class="col-5 text-right">
                <a class=" btn mt-2 mx-3" style="padding:0;" data-toggle="modal" data-target="#modalRelatorio"
                    title="Relatório">
                    <h4 class="text-center"><i class="bi bi-file-text-fill"></i></h4>
                </a>
                <a class=" btn mt-2 mx-3" style="padding:0;" data-toggle="modal" data-target="#modalEstoque"
                    title="Adicionar item">
                    <h4 class="text-center"><i class="bi bi-plus-square"></i></h4>
                </a>
            </div>
        </div>

        <ul id='list' style="list-style-type: none;">

            <div class="row">
                <div class="col-md-12 ">
                    <div class="card-header chamado row mb-4" style="margin-left:.01px;margin-right:.01px;">
                        <div class="col-md-1 ">
                            <h5 class="text-center mt-2 mr-4" style="color: white !important;">ID</h5>
                        </div>
                        <div class="col-md-3">
                            <h5 class="text-center mt-2  mr-3" style="color: white !important;">Item / Material</h5>
                        </div>
                        <div class="col-md-2">
                            <h5 class="text-center mt-2 mr-3" style="color: white !important;">Quantidade</h5>
                        </div>
                        <div class="col-md-3">
                            <h5 class="text-center mt-2 mr-5" style="color: white !important;">Ultima atualização</h5>
                        </div>
                        <div class="col-md-2">
                            <h5 class="text-center mt-2 mr-3" style="color: white !important;">Status</h5>
                        </div>

                    </div>
                    <div style="overflow-y:scroll; overflow-x:hidden; max-height:650px;">
                        @if (count($estoque) != 0)
                            @foreach ($estoque as $estoques)
                                <li class="item_m ">
                                    @if ($estoques['quantidade'] == '0')
                                        <div class="card-header row" style="background: rgba(230, 10, 10, 0.39); ">
                                        @else
                                            <div class="card-header row">
                                    @endif
                                    <div class="col-md-1 ">
                                        <h5 class="text-center mt-1" readonly>{{ $estoques['id'] }}</h5>
                                    </div>
                                    <div class="col-md-3 ">
                                        <h5 class="text-center mt-1">{{ $estoques['item_material'] }}</h5>
                                    </div>
                                    <div class="col-md-2 ">
                                        <h5 class="text-center mt-1">{{ $estoques['quantidade'] }}</h5>
                                    </div>
                                    <div class="col-3 ">
                                        <h5 class="text-center mt-1 mr-4 ">
                                            {{ date('d/m/20y', strtotime($estoques['ultima_att'])) }}</h5>
                                    </div>
                                    <div class="col-md-2 ">
                                        @if ($estoques['quantidade'] == '0')
                                            <h5 class="text-center mt-1"><i class="bi bi-x-circle"
                                                    style="color:rgb(201, 6, 6);"></i></h5>
                                        @elseif ($estoques['quantidade'] <= 5)
                                            <h5 class="text-center mt-1"><i class="bi bi-exclamation-circle"
                                                    style="color:#ffb007"></i></h5>
                                        @else
                                            <h5 class="text-center mt-1"><i class="bi bi-check" style="color: green;"></i>
                                            </h5>
                                        @endif
                                    </div>
                                    <div class="col-1 text-right">
                                        <a class=" btn btn-sec mt-2" style="padding: 0;" data-toggle="modal"
                                            data-target="#modalEdita{{ $estoques['id'] }}" title="Editar">
                                            <h5 class="text-muted"><i class="bi bi-pencil-fill"></i></h5>
                                        </a>
                                    </div>
                    </div>
                    </li>


                    {{-- MODAL EDITAR ITEM --}}
                    <div class="modal fade edit" id="modalEdita{{ $estoques['id'] }}"
                        quantidade="{{ $estoques['quantidade'] }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-xl" style="max-width: 600px;">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="exampleModalLabel">
                                        Editar item
                                    </h4>
                                    <button type="button" style="color: #fff" class="close" data-dismiss="modal"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="contact-form">
                                        <form action="{{ route('edita.item') }}" method="post">
                                            {{ csrf_field() }}

                                            <div class="card-body row ">
                                                <div class=" form-group col-md-8 ">
                                                    <label for="nome" class="col-form-label ">Nome item</label>
                                                    <input name="nome" class="form-control"
                                                        value="{{ $estoques['item_material'] }}">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="quant" class="col-form-label sans">Quantidade</label>
                                                    <input type="number" class="form-control" id="quantidade"
                                                        name="quant" value="{{ $estoques['quantidade'] }}">
                                                </div>
                                                <div class="hidden oculto my-4 text-center col-md-12">
                                                    <h4>Informações sobre envio</h4>
                                                    <div class="divider"></div>
                                                </div>

                                                <div class="form-group hidden oculto col-md-4">
                                                    <label for="filial" class="col-form-label sans ">Filial </label>

                                                    <select class="form-control" name="filial">
                                                        <option value="">... </option>

                                                    </select>
                                                </div>
                                                <div class="form-group hidden oculto col-md-4">
                                                    <label for="setor" class="col-form-label sans">Setor</label>
                                                    <select class="form-control" name="setor">
                                                        <option value="">...</option>


                                                    </select>
                                                </div>
                                                <div class="form-group hidden oculto col-md-12">
                                                    <textarea name="complemento" id="complemento" placeholder="Complemento..."></textarea>
                                                </div>
                                                <div class="offset-4 col-md-4 mt-4">
                                                    <input type="submit" value="Salvar"
                                                        class="btn btn-block btn-primary rounded-0 py-2 px-4">
                                                    <span class="submitting"></span>
                                                </div>
                                                <input type="hidden" name="id" value="{{ $estoques['id'] }}">
                                                <input type="hidden" name="user"
                                                    value="{{ Auth::user()->comment }}">
                                                <input type="hidden" class="open"
                                                    value="{{ $estoques['quantidade'] }}">

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>

    </div>
    </ul>
    </div>
    {{-- MODAL RELATORIO --}}
    <div class="modal fade" id="modalRelatorio" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog " style="max-width: 800px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">
                        Relatório de estoque
                    </h4>
                    <button type="button" id="relatorio" tipo="close" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
                <div class="modal-body">


                    <div id="conteudo_modal">
                        <div class="card-body ">
                            <div class="row" style="justify-content: space-evenly;">
                                <div class="text-center">
                                    <span class=" mx-2">
                                        <button type="button" value="Relatório completo"
                                            class="btn btn-block btn-sec rounded-0 py-2 px-4" id="relatorio"
                                            tipo="relatorio_completo">
                                            <img src="{{ URL::asset('images/relatorio.png') }}" width="100"
                                                height="100" alt="">
                                            <h4 class="mt-3">Relatório completo</h4>

                                        </button>
                                    </span>

                                </div>
                                <div class="text-center">
                                    <span class="mx-2">
                                        <button type="button" value="Itens faltantes"
                                            class="btn btn-block  rounded-0 py-2 px-4" id="relatorio"
                                            tipo="itens_faltantes">
                                            <img src="{{ URL::asset('images/vazia.png') }}" width="100"
                                                height="100" alt="">
                                            <h4 class="mt-3">Itens faltantes</h4>
                                        </button>
                                    </span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL ADD ESTOQUE --}}
    <div class="container mb-5" style="margin-top: 100px;">
        <div class="modal fade" id="modalEstoque" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" style="max-width: 1200px;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">
                            Adicionar item ao estoque
                        </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            <form action="{{ route('inclui.item') }}" method="post">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-4 form-group mb-5">
                                        <label for="name" class="col-form-label sans">Nome item</label>
                                        <input type="text" class="form-control" name="nome" id="nome"
                                            required placeholder="">
                                    </div>
                                    <div class="offset-1 col-md-4 form-group mb-5">
                                        <label for="marca" class="col-form-label sans">Complemento</label>
                                        <input type="text" class="form-control" name="marca" id="marca"
                                            placeholder="Opcional">
                                    </div>
                                    <div class="offset-1 col-md-2 form-group mb-5">
                                        <label for="quant" class="col-form-label sans">Quantidade</label>
                                        <input type="number" class="form-control" name="quant" min="0"
                                            id="quant" required placeholder=" ">
                                    </div>

                                    <div class="col-md-12">
                                        <div class="offset-10 col-md-2 form-group text-right">
                                            <input type="submit" value="Salvar"
                                                class="btn btn-block btn-primary rounded-0 py-2 px-4">
                                            <span class="submitting"></span>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--FORM VALIDATE-->
        @if ($message = Session::get('success'))
        <div class="col-3 offset-9 fixed-bottom">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Sucesso!</strong> <br>A ação foi realizada.
                    <button type="button" class="close" style="color: rgb(31, 31, 31);" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        @endif
        @if ($message = Session::get('error'))
        <div class="col-3 offset-9 fixed-bottom">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Email para contato invalido!</strong> <br><br>Verifique se o email está dentro do padrão<u>".
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
        @endif
    </div>

    <script>
        var quant_item = 0;
        $(document).on('click', '#relatorio', function() {
            var tipo = $(this).attr('tipo');
            $.get('{{ route('baixar.relatorio') }}', {
                'tipo': tipo
            }, (result) => {
                $("#conteudo_modal").html(result)
            })
        })
        $(document).on('focus', '.edit', function() {

            quant_item = $(this).attr('quantidade');
        })
        $(document).on('change', '#quantidade', function() {
            var item = $(this).val();
            if (parseInt(quant_item) > item) {
                $('.show .oculto').removeClass('hidden');
                $('.show .oculto').attr('disabled');
            } else {
                $('.show .oculto').addClass('hidden');
            }
        })
    </script>
    <script>
        function search_animal() {
            let input = document.getElementById('searchbar').value
            input = input.toLowerCase();
            let x = document.getElementsByClassName('item_m');

            for (i = 0; i < x.length; i++) {
                if (!x[i].innerHTML.toLowerCase().includes(input)) {
                    x[i].style.display = "none";
                } else {
                    x[i].style.display = "list-item";
                }
            }
        }
    </script>
    <script>
        function Print() {
            var divToPrint = document.getElementById("imprimir");
            newWin = window.open("");
            newWin.document.write(divToPrint.outerHTML);
            newWin.document.write('<br><p style="text-align:center;padding-top:30px;">Relatório gerado pelo sistema</p>');
            newWin.document.write('<p style="text-align:center;">' + new Date() + '</p>');

            newWin.print();
            newWin.close();
        }
        $(document).on("click","#copiar", function(){
            let textoCopiado = document.getElementById("texto").innerHTML;
            let input = $("#textarea");
            $('#textdiv').removeClass('hidden');

            input.removeClass('hidden');
            input.val(textoCopiado);
            input.select();
            document.execCommand("copy");
        })



    </script>

@endsection
