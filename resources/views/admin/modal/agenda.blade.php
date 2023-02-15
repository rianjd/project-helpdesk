@foreach ($conteudo as $chamado)
 {{-- MODAL AGENDA --}}

    <div class="modal-header text-center" >
        <h4 class="modal-title " id="exampleModalLabel">
            <i class="bi bi-calendar-date mr-3" style="color: rgb(231, 209, 12)"></i>Agendar
        </h4>
        <button type="button" style="color: #fff" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="row justify-content-center">
            <div class="col-16">
                <div class="contact-form">

                <form class="mb-2" action="{{ route('acompadmin')}}" method="post" >
                    {{ csrf_field() }}

                        <div class="row ">

                            <div class="col-md-12 ">
                                <div class="form-group ">
                                    <label for="time_to_resolve" class="col-form-label sans">Planejar: </label>

                                    <div class='input-group date' id='datetimepicker1'>
                                        <input type='date' class="form-control"  name="time_to_resolve">
                                        <span ><h3><i class="bi bi-calendar-event ml-3"></i></h3>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mt-1">
                                <div class="justify-content-center">
                                    <div class="form-group text-center">
                                        <input type="submit" style="background-color: rgb(23, 170, 228) !important; border:0;" value="Enviar"  class="btn btn-primary rounded-1 py-3 px-5">
                                        <span class="submitting"></span>
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" name="id" value="{{$chamado['id']}}">
                            <input type="hidden" name="tipo_acomp" value="agenda">
                        </div>
                    </form>
                </div>
                </div>

        </div>
    </div>
@endforeach
