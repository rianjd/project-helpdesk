
<div class="row">
    <div class="card-body ">
        <h4 class="mb-3 text-center">Itens em falta</h4>
        <form class="contact-form " action="{{ route('enviar.relatorio') }}" method="post">
            @csrf
            <div class="card p-2">
                <div class="row justify-content-center">
                    @foreach ($estoque->where('quantidade', '0') as $estoques)
                            <div class="m-5">
                                <input type="checkbox" checked name="{{ $estoques['item_material'] }}" value="{{ $estoques['item_material'] }}" id="{{ $estoques['id'] }}">
                                <label class="col-form-label ml-2" style="font-size: 15px" for="{{ $estoques['item_material'] }}">{{ $estoques['item_material'] }}</label>
                            </div>

                    @endforeach
                </div>
            </div>
            <div class="mt-5">
                <span class="float-left mx-2">
                    <input type="button" value="Voltar" id="relatorio" tipo="close" class="btn rounded-0 py-2 px-4">
                </span>
                <span class="float-right mx-2">
                    <input type="submit" value="Enviar por email" class="btn btn-block btn-primary rounded-0 py-2 px-4">
                </span>
                <span class="float-right baixar_relatorio mx-2">
                    <input type="button"  value="Copiar em texto" class="btn btn-block btn-primary rounded-0 py-2 px-4 " id="copiar">
                </span>
            </div>
        </form>
    </div>
</div>
<div class="hidden " id="texto">*ITENS EM FALTA*
@foreach ($estoque->where('quantidade', '0') as $estoques)- {{$estoques['item_material']}}
@endforeach
</div>
<div class="contact-form form-group hidden col-md-12 my-4" id="textdiv">

    <textarea class="hidden"  type="text" id="textarea"></textarea>
    <div class="col-3 offset-5 mt-3">
        <div class="alert alert-success  fade show text-center" role="alert">
            <strong>Copiado!</strong>

        </div>
    </div>
</div>
