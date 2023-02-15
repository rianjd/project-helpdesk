@foreach ($task as $t)
<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">{{$t['titulo']}}</h4>
        <button type="button" style="color: #fff" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body" >
        <div class="contact-form">
            <form action="{{route('edit_task')}}" method="post">
                {{ csrf_field() }}

                <div class="col-md-6 input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-pencil-square"></i></span>
                    </div>
                    <input type="text" class="form-control titulo" value="{{$t['titulo']}}" name="titulo">
                </div>
                <div class="col-md-12 input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="bi bi-bookmarks"></i></span>
                    </div>
                    <textarea class="form-control msg" aria-label="With textarea"  name="msg">@php echo html_entity_decode($t['content']);@endphp</textarea>
                </div>
                <div class="col-md-12 pt-3 text-right">
                    <div class="form-group text-right" style=" display: inline;">
                        <input type="submit" value="Salvar" class="btn btn-primary rounded-1 " >
                    </div>
                    <div class="form-group text-right" style=" display: inline;">
                        <a type="button" data-dismiss="modal" aria-label="Close" class="btn btn-secondary rounded-1">Voltar</a>
                    </div>
                </div>
                <input type="hidden" name="id" value="{{$t['id']}}">
            </form>
        </div>
    </div>
</div>
@endforeach
