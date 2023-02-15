<div class="card-body ">
    <div class="row" style="justify-content: space-evenly;">
        <div class="text-center">
            <span class=" mx-2">
                <button type="button" value="Relatório completo" class="btn btn-block btn-sec rounded-0 py-2 px-4" id="relatorio" tipo="relatorio_completo">
                    <img src="{{ URL::asset('images/relatorio.png') }}" width="100" height="100" alt="">
                    <h4 class="mt-3">Relatório completo</h4>

                </button>
            </span>

        </div>
        <div class="text-center">
            <span class="mx-2">
                <button type="button" value="Itens faltantes" class="btn btn-block  rounded-0 py-2 px-4" id="relatorio"
                    tipo="itens_faltantes">
                    <img src="{{ URL::asset('images/vazia.png') }}" width="100" height="100" alt="">
                    <h4 class="mt-3">Itens faltantes</h4>
                </button>
            </span>
        </div>
    </div>

</div>
