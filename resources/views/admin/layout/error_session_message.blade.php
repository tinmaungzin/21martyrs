@if(Session::has('msg'))
    <div class="alert alert-danger alert-dismissible" style="position: fixed; right:35px; bottom: 20px;">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        {{Session::get('msg')}}
    </div>
@endif
