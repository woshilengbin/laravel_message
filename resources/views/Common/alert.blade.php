@if(Session::has("success"))
<div class="alert alert-success alet-dismissible" role="alert">
    <strong>{{Session::get('success')}}</strong>
</div>
@endif
@if(Session::has("error"))
<div class="alert alert-danger alet-dismissible" role="alert">
    <strong>{{Session::get('error')}}</strong>
</div>
@endif