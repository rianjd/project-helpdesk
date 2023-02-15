<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Help">
    <meta name="author" content="Rian">

    <title>Relatório</title>

    <!-- Principal CSS do Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- Estilos customizados para esse template -->
</head>

<body>
    <div class="container-fluid">
        <div class=" text-center p-3 my-3 text-white bg-warning rounded shadow">
            <h5>Estoque TI</h5>
        </div>

        <div class="my-3 p-3 bg-white rounded shadow-sm">
            <h3 class="border-bottom border-gray pb-4 mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="rgb(223, 14, 14)"
                    class="bi bi-x-circle mr-3 " viewBox="0 0 20 20">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                    <path
                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                </svg>Itens em falta
            </h3>
            @foreach ($data as $items)
                <h4 class="my-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                        fill="rgb(223, 14, 14)" class="bi bi-dot mr-3" viewBox="0 0 16 16">
                        <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" />
                    </svg>{{ $items }}</h4>
            @endforeach

            <p class="text-center mt-5"><strong>Data do relatório: </strong>{{ date('d/m/2022') }}</p>

        </div>
        <div class="rounded shadow-sm  text-muted" style="background-color: #f1f1f1 ">
            <p class="p-3"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                    class="bi bi-info-circle mr-3" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                    <path
                        d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                </svg> Relatório informativo gerado pelo sistema de estoque</p>
        </div>


    </div>

    </div>


</body>

</html>
