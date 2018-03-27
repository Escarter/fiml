@extends('layouts.master')

@section('content')
<div class="row pb-0">
    <div class="col-md-12">
        <h1>Download Content Management</h1>
    </div>
</div>
    <!-- .row -->
    <div class="row">
        <div class="col-md-12 card">
            <div class="card-body">
                <div>
                    <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#createDownloadContentModal" ><i class="fa fa-plus fa-4x"></i> Downloadable Content</button>
                </div>
                <div class="clearfix"></div>

                <hr>
                
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

                @if ($downloadableContents->count()>0)
                <div class="table-responsive">
                        <div class="dt-buttons">
                            <a class="dt-button buttons-copy buttons-html5" tabindex="0" aria-controls="example23" href="#"><span>Copy</span></a>
                            <a class="dt-button buttons-csv buttons-html5" tabindex="0" aria-controls="example23" href="#"><span>CSV</span></a>
                            <a class="dt-button buttons-excel buttons-html5" tabindex="0" aria-controls="example23" href="#"><span>Excel</span></a>
                            <a class="dt-button buttons-pdf buttons-html5" tabindex="0" aria-controls="example23" href="#"><span>PDF</span></a>
                            <a class="dt-button buttons-print" tabindex="0" aria-controls="example23" href="#"><span>Print</span></a>
                        </div>
                        
                            
                    <table id="datatable-1" class="table table-datatable align-middle table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th>File Name</th>
                                <th>File Type</th>
                                <th>Size </th>
                                <th>Description</th>
                                <th>Created Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($downloadableContents as $downloadableContent)
                            <tr role="row" >
                                <td>{{$downloadableContent->file_name}} </td>
                                <td>{{$downloadableContent->file_extension }}</td>
                                @if ($downloadableContent->url != 'NULL')
                                    <td>{{ App\Helper\HelperClass::formatSizeUnits(filesize(storage_path('/app/public/downloads/'.$downloadableContent->file_extension.'/'.$downloadableContent->path))) }}</td>    
                                @else
                                <td><?php
                                        $head = array_change_key_case(get_headers($downloadableContent->remote_url, TRUE));
                                        $filesize = $head['content-length'];
                                        App\Helper\HelperClass::formatSizeUnits(filesize($filesize));
                                    ?></td>                                        
                                @endif
                                <td>{{str_limit($downloadableContent->description, 30)}}</td>
                                <td>{{$downloadableContent->created_at->diffForHumans()}}</td>
                                <td>
                                    <button data-id="{{$downloadableContent->id}}" data-url="/admin/edit-download-content/" data-toggle="modal" data-target="#editdownloadableContentModal" class="btn btn-warning btn-outline btn-circle btn-md m-r-5"><i class="ti-pencil-alt"></i></button>
                                    <button  data-id="{{$downloadableContent->id}}" data-url="/admin/delete-download-content/" class="btn btn-danger btn-outline btn-circle btn-md m-r-5 deletedownloadableContentBtn"><i class="ti-trash"></i></button>
                                </td>
                                </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                </div>
                @else
                    <h4>Information </h4> 
                    <p>No Downloadable content created yet</p>
                    <button class="btn btn-gradient btn-primary" data-toggle="modal" data-target="#createDownloadContentModal" ><i class="fa fa-plus fa-4x"></i> Downloadable Content</button>
                @endif
            </div>      
        </div>          
    </div>
</div>  
{{--  Include new downloadable-content modal  --}}
@include('admins.partials.create-downloadable-content-modal')

{{--  Include edit downloadable-content modal  --}}
@include('admins.partials.edit-downloadable-content-modal')

{{-- End of container-fluid --}}
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
        //Change the create modal inputs displayed
            $('#type').on('change',function(e){
                if($(this).val() == 'local'){
                    $('#file').show();
                    $('#url').hide();
                }else if($(this).val() == 'remote'){
                    $('#file').hide();
                    $('#url').show();
                }
            });
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

            //delete downloadable content

            $('.deletedownloadableContentBtn').on('click',function(e){
                e.preventDefault();
                var id = $(this).attr('data-id');
                var data_url = $(this).attr('data-url');
               swal({
                  title: "Are you sure?",
                  text: "You will not be able to recover the  downloadable content again!",
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
		                            swal({title:"Great Job",text:"downloadable content has been deleted!",type:"success"},
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
                    swal("Cancelled", "Your downloadable content is safe :)", "error");
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
