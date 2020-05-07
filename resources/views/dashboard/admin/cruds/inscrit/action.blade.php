<div class="d-inline-flex">

    <a href="{{ route('users.show', ['user'=>$id]) }}"> <i class="fas fa-eye"> </i> </a>&nbsp&nbsp

    <form action="{{route('components.destroy' , ['component'=>$id])}}" method="POST">
        @csrf
        @method("DELETE")
        <a href=""><i class="fa fa-trash" style="color: firebrick"></i></a>
        {{-- <input class="btn btn-block btn-outline-danger btn-xs" type="submit" value="Delete" id="delete"> --}}
    </form>
</div>