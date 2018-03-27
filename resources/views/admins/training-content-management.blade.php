@extends('layouts.master')

@section('content')
<div class="row pb-0">
    <div class="col-md-12">
        <h1>Training Content Management</h1>
    </div>
</div>
    <!-- .row -->
    <div class="row mb-5">
        <div class="col-md-12 card">
            <div class="card-body">
                <div>
                    <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#createTrainingContentModal" ><i class="fa fa-plus"></i> Training Content</button>
                </div>
                <div class="clearfix"></div>
                
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                {{--  Include Notification portion  --}}
                
                @include('layouts.partials.normal-notifications')              

                @if ($trainingContents->count()>0)
                <div class="table-responsive">
                    <div class="dt-buttons">
                        <a class="dt-button buttons-copy buttons-html5" tabindex="0" aria-controls="example23" href="#"><span>Copy</span></a>
                        <a class="dt-button buttons-csv buttons-html5" tabindex="0" aria-controls="example23" href="#"><span>CSV</span></a>
                        <a class="dt-button buttons-excel buttons-html5" tabindex="0" aria-controls="example23" href="#"><span>Excel</span></a>
                        <a class="dt-button buttons-pdf buttons-html5" tabindex="0" aria-controls="example23" href="#"><span>PDF</span></a>
                        <a class="dt-button buttons-print" tabindex="0" aria-controls="example23" href="#"><span>Print</span></a>
                    </div>
                    <br><hr>
                        
                    <table id="datatable-1" class="table table-datatable align-middle table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Type</th>
                                <th>Content</th>
                                <th>URL</th>
                                <th>created Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($trainingContents as $trainingContent)
                                <tr>
                                    <td><img src="{{asset('storage/coverImages/'.$trainingContent->cover_image)? asset('storage/coverImages/'.$trainingContent->cover_image): '/img/profile-pic-1.jpg'}}" alt="training-cover-image" class="profile-picture"> {{$trainingContent->title}} </td>
                                    
                                    <td>
                                        @if ($trainingContent->category->name  == 'Forex Trainings')
                                            <span class="badge badge-danger">{{$trainingContent->category->name }}</span>
                                        @elseif($trainingContent->category->name  == 'FIML Training')
                                            <span class="badge badge-secondary" >{{$trainingContent->category->name}}</span>
                                        @elseif($trainingContent->category->name  == 'Binary Trainings')
                                            <span class="badge badge-info" >{{$trainingContent->category->name}}</span>
                                        @else
                                          <span class="badge badge-success" >{{$trainingContent->category->name}}</span>
                                        @endif
                                    </td>
                                    <td>{{$trainingContent->type}}</td>
                                    <td>{{str_limit($trainingContent->content, 20)}}</td>
                                    <td>{{str_limit($trainingContent->url,20)}}</td>
                                    <td>{{$trainingContent->created_at->diffForHumans()}}</td>
                                    <td>
                                        <button data-id="{{$trainingContent->id}}" data-url="/admin/edit-training-content/" data-toggle="modal" data-target="#editTrainingContentModal" class="btn btn-secondary waves-effect waves-light btn-sm"><i class="fa fa-pencil fa-5x"></i></button>
                                        <button  data-id="{{$trainingContent->id}}" data-url="/admin/delete-training-content/" class="btn btn-red waves-effect waves-light deleteTrainingContentBtn btn-sm"><i class="fa fa-remove fa-5x"></i></button>
                                    </td>
                                 </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @else
                    <h4>Information </h4> 
                    <p>No Training content created yet</p>
                    <br>
                    <button class="btn btn-gradient btn-primary " data-toggle="modal" data-target="#createTrainingContentModal" ><i class="fa fa-plus"></i> Training Content</button>
                    {{--  <a href="#" class="btn btn-danger">Back to Dashboard</a>  --}}
                @endif
            </div>      
        </div>          
    </div>
</div>  
{{--  Include new training-content modal  --}}
@include('admins.partials.create-training-content-modal')

{{--  Include edit training-content modal  --}}
@include('admins.partials.edit-training-content-modal')

{{-- End of container-fluid --}}
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {

            //Edit User modal
            $('#editUserModal').on('show.bs.modal', function (event) {

                var editUserBtn = $(event.relatedTarget);
                var id = editUserBtn.data('id');
                var data_url = editUserBtn.data('url');
                var editUserModal = $(this);
                
                //console.log(data_url+id);
                $.ajax({
                    dataType  :'JSON',
                    type      :'GET',
                    url       : data_url+id,
                    success   :function(response){
    
                        if (response.status == 'success') {

                            console.log(response);

                            editUserModal.find('#editUserForm  input[name="id"]').val(response.data.id)
                            editUserModal.find('#editUserForm  input[name="first_name"]').val(response.data.first_name)
                            editUserModal.find('#editUserForm  input[name="last_name"]').val(response.data.last_name)
                            editUserModal.find('#editUserForm  input[name="phone"]').val(response.data.phone)
                            editUserModal.find('#editUserForm  input[name="dob"]').val(response.data.dob)
                            editUserModal.find('#editUserForm  input[name="email"]').val(response.data.email)
                            editUserModal.find('#editUserForm  input[name="location"]').val(response.data.location)


                            editUserModal.find('#editUserForm #editstatus').val(response.data.status).trigger('change');
                            editUserModal.find('#editUserForm #editrole').val(response.role).trigger('change');
                            editUserModal.find('#editUserForm #editsex').val(response.data.sex).trigger('change');

                                
                                // $('.editUserModal').modal('show');
                        }
                        if(response.status =='error'){
                            swal('warning',response.data);
                        }
                    }
                });
            });

            $('.deleteTrainingContentBtn').on('click',function(e){
                e.preventDefault();
                var id = $(this).attr('data-id');
                var data_url = $(this).attr('data-url');
               swal({
                  title: "Are you sure?",
                  text: "You will not be able to recover the  training content again!",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonColor: "#DD6B55",
                  confirmButtonText: "Yes, delete it!",
                  cancelButtonText: "No, cancel plx!",
                  closeOnConfirm: false,
                  closeOnCancel: true
                },
                function(isConfirm){
                  if (isConfirm) {
		                $.ajax({
		                    dataType  :'JSON',
		                    type      :'GET',
		                    url       : data_url+id,
		                    success     :function(response){
		                        console.log(response);
		                        if (response.status == 'success') {
		                            swal({title:"Great Job",text:"Training content has been deleted!",type:"success"},
					                    function(){
					                      location.reload();
					                   }); 
		                        }
		                        if(response.status =='error'){
		                            swal({title:"Error",text:"Something went wrong!",type:"warning"});
		                        }
		                    }
		                });
		          } else {
                    swal("Cancelled", "Your Training content is safe :)", "error");
                  }
            });
        });
        
            $('#myTable').DataTable();
            $(document).ready(function () {
                var table = $('#example').DataTable({
                    "columnDefs": [
                        {
                            "visible": false
                            , "targets": 2
                        }
                    ]
                    , "order": [[2, 'asc']]
                    , "displayLength": 25
                    , "drawCallback": function (settings) {
                        var api = this.api();
                        var rows = api.rows({
                            page: 'current'
                        }).nodes();
                        var last = null;
                        api.column(2, {
                            page: 'current'
                        }).data().each(function (group, i) {
                            if (last !== group) {
                                $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                                last = group;
                            }
                        });
                    }
                });
                
            });
        });
        $('#example23').DataTable({
            dom: 'Bfrtip'
            , buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
        });
    </script>
    
@stop
