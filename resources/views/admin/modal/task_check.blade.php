@foreach ($task as $t)

<div class="p-2" style="border-bottom: solid 1px rgb(209, 209, 209)">
    @if ( $t['status'] == 1)
        <h4 class="check mt-2" onclick="myFunc(this,{{$t['status']}})" id="{{$t['id']}}" style=" display: inline;">
            <i class="bi bi-dot mr-2 danger"></i>
            {{$t['titulo']}}

        </h4>
        <span class="float-right"><a class="task_ver danger botinho" data-toggle="modal" data-target="#modalTask" data-value="{{$t['id']}}">Ver<i class="bi bi-eye-fill ml-2"></i></a></span>

    @else
        <h4 class="risco check mt-2" onclick="myFunc(this,{{$t['status']}})" id="{{$t['id']}}" style=" display: inline;">
            <i class="bi bi-check-lg mr-2"></i>
            {{$t['titulo']}}</h4>
        </h4>
    @endif
</div>
@endforeach
