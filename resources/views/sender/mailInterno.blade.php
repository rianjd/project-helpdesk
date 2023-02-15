<title>Chamado</title>

<!-- Principal CSS do Bootstrap -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<!-- Estilos customizados para esse template -->

<div class="container-fluid">

    <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-primary rounded shadow"><h3 class="text-dark">Chamado</h3></div>

        <div class="my-3 p-3 bg-white rounded shadow-sm">
            <h3 class="border-bottom border-gray pb-4 mb-0">
                Novo chamado! - ID [{{$data['id']}}] </h3>


        @if (isset($data['nome_user']))<div class="text-muted pt-4">
            <div class="media-body pb-3 mb-0 med lh-125 border-bottom border-gray"><p><strong>Nome: </strong>{{$data['nome_user'] }}</p></div></div>@endif
        @if (isset($data['filial']))<div class="media text-muted pt-4">
            <div class="media-body pb-3 mb-0 med lh-125 border-bottom border-gray"><p><strong>Filial: </strong>{{$data['filiais'] }}</p></div></div>@endif
        @if (isset($data['setor']))<div class="media text-muted pt-4">
            <div class="media-body pb-3 mb-0 med lh-125 border-bottom border-gray"><p><strong>Setor: </strong>{{$data['setor'] }}</p></div></div>@endif

        <!-- divisao -->
        @if (isset($data['msg']))<div class="media text-muted pt-4">
            <div class="media-body pb-3 mb-0 med lh-125 border-bottom border-gray"><p><strong>Observações: </strong>{{$data['msg'] }}</p></div></div>

        @endif

        @if (isset($data['nome']))<div class="pt-4">
            <div class="media-body pb-3 mb-0 med lh-125 border-bottom border-gray"><p><strong>Nome solicitante: </strong>{{$data['nome'] }}</p></div></div>@endif
        <!-- divisao -->
        @if (isset($data['filename']))
        <div class="pt-4 text-center">
            <a href="{{URL::asset('storage/chamado/'.$data['filename'])}}" download>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download mr-2" viewBox="0 0 16 16">
                    <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                    <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                  </svg>Baixar anexo
            </a>
        </div>
        @endif

    </div>
</div>
