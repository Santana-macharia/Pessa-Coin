<div class="alert alert-info alert-dismissible fade in" role="alert">
  <div class="icon"><span class="fa fa-info-circle"></span></div>
  <p align="center"><strong>Heads up!</strong> @lang('app.proceed_info')</p>
</div>

  <form action="{{url('proceed')}}" method="post"> @csrf
<div class="row">
  <div class="form-group">
  
    <div class="col-sm-4">
      <label class="control-label"><p>&nbsp;</p></label>
      <a href="{{ route('payments') }}" class="btn btn-bg btn-danger">PROCEED</a>
    </div>
  </div>
</div>
</form>
