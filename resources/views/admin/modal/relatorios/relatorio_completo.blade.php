<style>
    .modal-dialog{
        max-width: 1200px !important;
    }
    body[data-isDarkmode='true'] .table{
        color: rgb(216, 216, 216);
    }
    .table{
        margin-bottom: 0px;
    }
</style>
<div class="row">
    <div class="card-body " >
            <div class="card" id="imprimir">
                    <h3 style="text-align: center; padding:20px;">RELATÓRIO DE ESTOQUE</h3>

                <table class="table" style="border: 1px solid rgb(201, 201, 201);">
                        <tr style="text-left" >
                            <th style="padding:20px;">Nome</th>
                            <th style="padding:20px;">Quantidade</th>
                            <th style="padding:20px;" >Data</th>
                            <th style="padding:20px;">Complemento</th>
                            <th style="padding:20px;" class="text-center">Técnico</th>

                        </tr>
                @foreach ($estoqueLog as $estoques)

                    <tr style="vertical-align: top;">

                        <td style="padding: 20px;">
                            {{$estoques['item_material']}}
                        </td>
                        <td style="padding: 20px; padding-bottom: 20px;" >
                            @if ($estoques['tipo'] == 'OUT')
                                <span style="color: rgb(177, 11, 11);">{{$estoques['quantidade']}}</span>
                            @elseif ($estoques['tipo'] == 'NEW')
                                <span style="color: rgb(6, 214, 204);">+{{$estoques['quantidade']}}</span>

                            @else

                                <span style="color: rgb(14, 133, 20);">+{{$estoques['quantidade']}}</span>
                            @endif
                             un.
                        </td>
                        <td style="padding: 20px;">
                           <p>{{date('d/m/Y', strtotime($estoques['data']))}}</p>
                        </td>
                        <td  style="width: 400px; padding: 20px 10px 20px 20px;">
                            @if($estoques['complemento'] != ''){{$estoques['complemento']}}
                            @else -- --
                            @endif
                            <br>
                            @if ($estoques['filial'] != '') <strong>{{$filiais[$estoques['filial']]}} - {{$estoques['setor']}}</strong>
                            @endif
                         </td>
                         <td  class="text-center" style="padding: 20px;">
                            {{$nomes[$estoques['user_mod']]}}
                         </td>

                    </tr>
                @endforeach

                </table>

            </div>
            <div class="mt-5">
                <span class="float-left mx-2">
                    <input type="button" value="Voltar" id="relatorio" tipo="close" class="btn rounded-0 py-2 px-4">
                </span>
                <span class="float-right baixar_relatorio mx-2">
                    <input type="button" value="Imprimir" onclick="Print()" class="btn btn-block btn-primary rounded-0 py-2 px-4 " id="print">
                </span>

            </div>
        </form>
    </div>
</div>

