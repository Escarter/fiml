@if(Session::has('success'))
<div class="alert alert-success alert-dismissible ">
     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  <h5 class="box-title">Well done!</h5>
    <p>{{Session::get('success')}}</p>
</div>
@elseif(Session::has('error'))
<div class="alert alert-error alert-dismissible ">
     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  <h4 class="box-title">Opps! Something is wrong</h4>
    <p>{{Session::get('error')}}</p>
  <hr>
  <p class="mb-0">Please contact the adminstration via .</p>
</div>
@elseif(Session::has('warning'))
<div class="alert alert-warning alert-dismissible ">
     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  <h4 class="box-title">Sad! Please be careful</h4>
    <p>{{Session::get('warning')}}</p>
  <hr>
</div>
@elseif(Session::has('info'))
<div class="alert alert-info alert-dismissible ">
     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  <h4 class="box-title">Info! Please be careful</h4>
    <p>{{Session::get('info')}}</p>
  <hr>
</div>

@endif