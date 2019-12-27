@if(Session::has('insert-success'))
    <div class="message alert alert-success">{{Session::get('insert-success')}}</div>
@endif

@if(Session::has('error'))
    <div class="message alert alert-danger">{{Session::get('error')}}</div>
@endif

