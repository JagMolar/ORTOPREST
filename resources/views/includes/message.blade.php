@if(session('message'))
<div class="alert alert-success">
    <button class="close" data-dismiss="alert"><span>&times;</span></button>
    {{ session('message')}}
</div>
@endif

@if(session('error_message'))
<div class="alert alert-danger">
    <button class="close" data-dismiss="alert"><span>&times;</span></button>
    {{ session('error_message')}}
</div>
@endif