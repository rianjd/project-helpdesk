@if (count($chamados) != 0)
                @foreach($chamados as $chamado)
                        @if ($chamado['users_id_recipient'] == 56)
                            <div class="col-md-12 ">
                                    <div class="card-header row" >
                                        <div class="col-md-1" style="align-self: center;">
                                            <h5 class="text-center fonte mt-2" >{{$chamado['id']}}</h5>
                                        </div>
                                        <div class="col-md-5 popover__wrapper" style="align-self: center;">
                                            <a class=" btn btn-block   popover__title chamado_modal" data-value="{{$chamado['id']}}"  data-toggle="modal" data-target="#modalGeral" title="solucionado">
                                                <h5 class="text-left fonte mt-2" >{{$chamado['name'] }}</h5>
                                            </a>
                                            <div class="popover__content" style="width: 500px;">
                                                @foreach ($solution as $solu )
                                                    @if ($solu['items_id'] == $chamado['id'])
                                                        <p class="popover__message">
                                                            {!! $solu['content'] !!}
                                                        </p>
                                                    @endif
                                                @endforeach

                                            </div>

                                        </div>

                                        <div class="col-2 text-center" style="align-self: center;">
                                            <h5 class="mt-2">{{date('d/m/20y', strtotime($chamado['date_creation'])) }}</h5>
                                        </div>

                                        <div class="col-1 text-center" style="align-self: center;">
                                                <h5 class="mt-2" style="color:rgb(61, 143, 6);">{{date('d/m/20y', strtotime($chamado['date_mod'])) }}</h5>
                                        </div>



                                        {{-- STATUS (ABERTO/EM ANDAMENTO) --}}
                                        @if  ($chamado['status'] == '5' )
                                            <div class="col-md-2 text-center" style="align-self: center;"><span class="text-muted " style="align-items: center;">Solucionado<i class="bi bi-check-lg ml-1" style="color:rgb(83, 182, 17);"></i></span>
                                            </div>

                                        @endif


                                        <div class=" text-right col-xl-1" style="align-self: center;">

                                                <form action="{{route ('restore.chamado')}}"  method="post">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" value="{{$chamado['id']}}" name="id">
                                                    <button  type="submit" class="btn text-center" >
                                                        <h4  class="botinho" style="color: rgb(0, 66, 128);"><i class="bi bi-arrow-repeat"></i></h4>
                                                    </button>
                                                </form>
                                        </div>
                                    </div>





                            </div>
                            <input type="hidden" {{$contador = 1}}>
                        @endif

                @endforeach
                <div class= "modal fade " id="modalData" tabindex="1"  aria-hidden="true">
                    <div class="modal-dialog modal-xl" style="max-width: 1200px;">
                        <div class="modal-content">
                            <div class='input-group date' id='datetimepicker1'>
                                <input type='date' class="form-control chamado_table_blur"  name="time_to_resolve">
                                <span ><h3><i class="bi bi-calendar-event ml-3"></i></h3>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- MODAL CHAMADOS --}}
                <div class= "modal fade " id="modalGeral" tabindex="1"  aria-hidden="true">
                    <div class="modal-dialog modal-xl" style="max-width: 1200px;">
                        <div class="modal-content">
                            <div id="conteudomodal">

                            </div>
                        </div>
                    </div>
                </div>


                {{-- IF SEM CHAMADO --}}
                @if(!isset($contador))
                    <div class="col-md-12" id='NONE' name='NONE' style="margin-top: 12rem;">
                        <h1 class="text-center" style="color: #777;"><i class="bi bi-bell-slash mr-3"></i>Não existem chamados para sua filial!</h1>
                    </div>
                    <div class="col-md-12" style="padding: 140px"></div>


                @endif
            @endif
