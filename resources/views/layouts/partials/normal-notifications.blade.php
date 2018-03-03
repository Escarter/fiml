@if(Session::has('success'))
<div class="notification notification-success alert-dismissible ">
     <button type="button" class="close" data-dismiss="notification" aria-hidden="true">×</button>
  <h5 class="box-title">Well done!</h5>
    <p>{{Session::get('success')}}</p>
</div>
@elseif(Session::has('error'))
<div class="notification notification-error alert-dismissible ">
     <button type="button" class="close" data-dismiss="notification" aria-hidden="true">×</button>
  <h4 class="box-title">Opps! Something is wrong</h4>
    <p>{{Session::get('error')}}</p>
  <hr>
  <p class="mb-0">Please contact the adminstration via .</p>
</div>
@elseif(Session::has('warning'))
<div class="notification notification-warning alert-dismissible ">
     <button type="button" class="close" data-dismiss="notification" aria-hidden="true">×</button>
  <h4 class="box-title">Sad! Please be careful</h4>
    <p>{{Session::get('warning')}}</p>
  <hr>
  <p class="mb-0">.</p>
</div>
@elseif(Session::has('info'))
<div class="notification notification-info alert-dismissible ">
     <button type="button" class="close" data-dismiss="notification" aria-hidden="true">×</button>
  <h4 class="box-title">Info! Please be careful</h4>
    <p>{{Session::get('info')}}</p>
  <hr>
  <p class="mb-0">.</p>
</div>

@endif