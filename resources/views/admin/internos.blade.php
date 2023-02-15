 {{-- CONTEUDO TABELA --}}
 @if (count($chamados) != 0)
 @foreach($chamados as $chamado)
         <div class="col-md-12" id="chamado{{$chamado['id']}}">
                 <div class="card-header row" style="background: rgb(234, 233, 233);">

                     <div class="col-md-1" style="align-self: center;" >
                         <h5 class="text-center mt-3 fonte" style="color:#e8ab1b;"><i class="fa fa-hashtag mr-1" aria-hidden="true"></i>{{$chamado['id']}}</h5>
                     </div>
                     <div class="col-md-5 popover__wrapper" style="align-self: center;">
                         <a class="  mt-2  popover__title btn  chamado_modal" data-value="{{$chamado['id']}}" title="conteudo" data-toggle="modal" data-target="#modalGeral">
                             <h5 class="text-left fonte" >
                                 {{$chamado['name'] }}</h5>


                         </a>

                         <div class="popover__content">
                             <p class="popover__message">
                                {!! html_entity_decode($chamado['content']) !!}

                             </p>
                         </div>
                     </div>



                     <div class="col-2 text-center" style="align-self: center;">
                         <h5 class="mt-2">{{date('d/m/20y', strtotime($chamado['date_creation'])) }}</h5>
                     </div>

                     <div class="col-1 text-center" style="align-self: center;">

                            <h5 class=" mt-2">{{date('d/m/20y', strtotime($chamado['date_mod'])) }}</h5>

                     </div>



                     {{-- STATUS (ABERTO/EM ANDAMENTO) --}}
                     @if  ($chamado['status'] == '2' )
                         <div class="col-md-2 text-center" style="align-self: center;">
                             <span class="text-muted status" data-toggle="modal" data-target="#modalStatus" data-value="{{$chamado['id']}}" style="align-items: center;">
                                 Aberto</strong>
                                 <i class="bi bi-record ml-1" style="color:rgb(83, 182, 17);"></i>
                             </span>


                         </div>

                     @endif
                     @if  ($chamado['status'] == '3' )

                         <div class="col-md-2  text-center pt-2 popover__wrapper  status" data-toggle="modal" data-target="#modalStatus" data-value="{{$chamado['id']}}" style="align-self: center;"><span class="text-muted popover__title" style="align-items: center;">Planejado</strong><i class="bi bi-clock-fill ml-2" style="color:rgb(38, 139, 197);"></i></span>
                             <div class="row justify-content-center">
                                 @if ($chamado['time_to_resolve'] != null)
                                     <div class="popover__content" style="left: 90px;">
                                         <p class="popover__message">
                                             {{date('d/m/20y', strtotime($chamado['time_to_resolve']))}}
                                         </p>
                                     </div>
                                 @endif
                                 @foreach ($sup as $supp)
                                     @if ($chamado['id'] == $supp['tickets_id'])
                                         <span class="category-tags mt-2 ">
                                             <div class="category " style="background: #2cb2ffa1;">
                                                 {{$tec[$supp['suppliers_id']]}}
                                             </div>
                                         </span>
                                     @endif
                                 @endforeach
                             </div>
                         </div>
                     @endif
                     @if ($chamado['status'] == '4')
                         <div class="col-md-2  text-center pt-2 " style="align-self: center;" ><span class="text-muted status" style="align-items: center;" data-toggle="modal" data-target="#modalStatus" data-value="{{$chamado['id']}}">Andamento</strong><i class="bi bi-record-fill ml-1" style="color:rgb(228, 182, 32);"></i></span>
                             <div class="row justify-content-center">

                                 {{-- Atribuido para : --}}
                                 @foreach ($tkt as $item)
                                     @if ($chamado['id'] == $item['tickets_id'])
                                         <span class="category-tags mt-2 atribuido dropdown">
                                             <div class="category a{{$chamado['id']}}"  role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                 {{$tec[$item['users_id']]}}
                                             </div>
                                             <div class="dropdown-menu " aria-labelledby="dropdownMenuButton">

                                                 <a class="dropdown-item status_tec" data-value="{{$chamado['id']}}">Rian</a>
                                                 <a class="dropdown-item status_tec" data-value="{{$chamado['id']}}">Matheus</a>
                                                 <a class="dropdown-item status_tec" data-value="{{$chamado['id']}}">Cassio</a>
                                                 <a class="dropdown-item status_tec" data-value="{{$chamado['id']}}">Alan</a>

                                             </div>
                                         </span>
                                     @endif
                                 @endforeach
                             </div>
                         </div>

                     @endif

                     <div class="row justify-content-center fonte" style="align-self: center;">

                         <a type="button" class="botinho chamado_modal" data-value="{{$chamado['id']}}"  data-toggle="modal" data-target="#modalGeral" title="lupa">
                             <h5 class="text-center" style="color: rgb(3, 131, 216);"><i class="bi bi-search"></i></h4>
                         </a>
                         <a type="button" class="botinho chamado_modal" data-value="{{$chamado['id']}}"   data-toggle="modal" data-target="#modalGeral" title="encaminhar">
                             <h5 class="text-center" style="color: rgb(34, 49, 133);"><i class="bi bi-send-fill"></i></h4>
                         </a>
                     </div>

                 </div>
         </div>
         <input type="hidden" {{$contador = 1}}>

     {{-- @endif
     @endforeach --}}

 @endforeach

@else
<div class="col-md-12" id='NONE' name='NONE' style="margin-top: 12rem;">
 <h1 class="text-center" style="color: #777;"><i class="bi bi-bell-slash mr-3"></i>Não existem chamados com o filtro selecionado!</h1>
</div>
<div class="col-md-12" style="padding: 140px"></div>
@endif
