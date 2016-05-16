@if(Session::has('message-errors'))
    <div class="alert alert-danger alert-dismissable" role="alert" >

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true" >&times;</span>

        </button>
        {!! Session::get('message-errors') !!}
      </div>
@endif