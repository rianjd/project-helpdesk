<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>


        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Help">
        <meta name="author" content="Rian">

        <title>Acompanhamento</title>

        <!-- Principal CSS do Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <!-- Estilos customizados para esse template -->
    </head>

    <body>
        <div class="container-fluid">
            <div class=" text-center p-3 my-3 text-white bg-info rounded shadow">
                <h5>{{$data['title']}}</h5>
            </div>

            <div class="my-3 p-3 bg-white rounded shadow-sm" >
                <h3 class="border-bottom border-gray pb-4 mb-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-chat-square-text mr-3" viewBox="0 0 16 16" style="font-size: 23px; color: #17a2b8;">
                        <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1h-2.5a2 2 0 0 0-1.6.8L8 14.333 6.1 11.8a2 2 0 0 0-1.6-.8H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h2.5a1 1 0 0 1 .8.4l1.9 2.533a1 1 0 0 0 1.6 0l1.9-2.533a1 1 0 0 1 .8-.4H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                        <path d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6zm0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                      </svg>Novo Acompanhamento!</h3>
                @if (isset($data['msg']))
                        <div class="media-body pb-3 my-3 med lh-125 border-bottom border-gray" style="font-size: 23px;">
                            <?php echo $data['msg']; ?>
                            <p><br/>Atenciosamente, <br/><strong>{{$data['nome'] }}</strong></p>
                            <p class="text-muted" style="font-size: 17px;"><br/>OBS: Você tambem pode visualizar seus acompanhamentos no portal de chamados!<br/></p>
                        </div>
                @endif
                @if (isset($data['nome']))
                    <div class="media-body p-3 my-2 med lh-125 border-gray text-center" style="font-size: 18px; margin-bottom:0; "><p><strong>Enviado em: </strong></p>{{$data['time'] }}</div>@endif

        </div>
        <div class="my-3 p-3 rounded shadow-sm  text-muted" style="background-color: #f0fbff ">
            <h4 class="border-bottom border-gray pb-4 mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-info-circle mr-3" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
              </svg>Chamado de referencia</h4>
            <div class="media-body pb-3 my-3 med lh-125 border-gray">
                <p><strong>Aberto em: </strong>{{date('d/m/2022', strtotime($data['date_creation']))}}</p>
                @php echo $data['content']; @endphp

            </div>

        </div>
    </body>
</html>
