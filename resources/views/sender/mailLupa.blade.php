
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="Formulario de chamados">
<meta name="author" content="Rian">

<title>Chamado</title>

<!-- Principal CSS do Bootstrap -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<!-- Estilos customizados para esse template -->

<div class="container-fluid">

    @if (isset($data['content']))
            {!! html_entity_decode($data['content']) !!}
    @endif


    <div class="rounded shadow-sm p-3" style="background-color:rgba(167, 214, 255, 0.356);">
        <div class="border-bottom py-4"><h4>Complemento do chamado - ID {{$data['id']}}</h4></div>
        <div class="border-bottom py-4"><?php echo $data['complemento'] ?></div>
        <div class="pt-3"><p class="text-muted">Enviado por {{$data['nome']}}</p></div>
    </div>
</div>
