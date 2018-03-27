@extends('layouts.master')

@section('content')
<div class="row pb-0">
        <div class="col-md-12">
            <h1>Users Management</h1>
        </div>
    </div>
<div class="row mb-5">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                
                 <div>
                    <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#createUserModal" ><i class="fa fa-user-plus"></i> Create User</button>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="notification" aria-hidden="true">×</button>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                {{--  Include Notification portion  --}}
                
                @include('layouts.partials.normal-notifications')              

                @if ($users->count()>0)
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
                                    <th >Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Sex</th>
                                    <th>Role</th>
                                    <th>Joined date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                
                                @foreach ($users as $user)
                                <tr  >
                                    <td><img src="{{asset('img/profile-pic-1.jpg')}}" alt="user" class="profile-picture" height="40" width="40"> {{$user->first_name}} {{$user->last_name}} </td>
                                    <td>{{ $user->email}}</td>
                                    <td>{{$user->phone}}</td>
                                    <td>{{$user->sex}}</td>
                                    <td >
                                    @if ($user->roles()->first()->name == 'admin')
                                        <span class="badge badge-blue">{{$user->roles()->first()->name}}</span>
                                    @else
                                        <span class="badge badge-secondary" >{{$user->roles()->first()->name}}</span>
                                    @endif
                                    </td>

                                    <td>{{$user->created_at->diffForHumans()}}</td>

                                    <td > 
                                    @if ($user->status == 'Active')
                                        <span class="badge badge-success ">{{$user->status}}</span>
                                    @elseif($user->status == 'Pending')
                                        <span class="badge badge-warning">{{$user->status}}</span>
                                    @else
                                        <span class="badge badge-elegant">{{$user->status}}</span>                                        
                                    @endif
                                    </td>

                                    <td>
                                        <button data-id="{{$user->id}}" data-url="/admin/edit-user/" data-toggle="modal" data-target="#editUserModal" class="btn btn-secondary waves-effect waves-light btn-sm"><i class="batch-icon batch-icon-eye"></i></button>
                                        <button  data-id="{{$user->id}}" data-url="/admin/delete-user/" class="btn btn-red btn-sm m-r-5 deleteUserBtn"><i class="batch-icon batch-icon-user-alt-remove"></i></button>
                                    </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
    <h4>Information </h4> 
    <p>No User created yet</p>
     <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#createUserModal" ><i class="fa fa-user-plus"></i> Create user</button>
    @endif
</div>      
</div>  
{{--  Include new user modal  --}}
@include('admins.partials.create-user-modal')

{{--  Include edit user modal  --}}
@include('admins.partials.edit-user-modal')

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
                        }
                        if(response.status =='error'){
                            swal('warning',response.data);
                        }
                    }
                });
            });

            $('.deleteUserBtn').on('click',function(e){
                e.preventDefault();
                var id = $(this).attr('data-id');
                var data_url = $(this).attr('data-url');
               swal({
                  title: "Are you sure?",
                  text: "You will not be able to recover the  user info again!",
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
		                            swal({title:"Great Job",text:"User has been deleted!",type:"success"},
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
                    swal("Cancelled", "Your Prospect file is safe :)", "error");
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
