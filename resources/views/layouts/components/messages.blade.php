@if(session()->has('fail'))
    <div class="alert alert-danger alert-dismissible fade show text-center">
        <strong>{{session('fail')}}</strong>
        <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
@elseif(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show text-center">
        <strong>{{session('success')}}</strong>
        <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
@endif
