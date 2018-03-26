<div class="modal fade  " id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" ><i class="mdi mdi-account-edit"></i> Edit User</h4> </div>
            <div class="modal-body">
                <form method="POST" action="/admin/update" id="editUserForm">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-6 col-xs-12">
                            <input class="form-control" type="text"  name="first_name"  id="edit_first_name" value="First Name" required=""  > 
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <input class="form-control" type="text"  name="last_name"  value="" required="" > 
                        </div>
                    </div>
                    <div class="form-group row ">
                        <div class="col-md-6 col-xs-12">
                            <input class="form-control" type="text"  name="location" value="" required=""> 
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <input class="form-control" type="text"  name="phone" value="" required=""> 
                        </div>
                    </div>
                    <div class="form-group row ">
                        <div class="col-md-6 col-xs-12">
                            <select name="sex" class="form-control" id="editsex">
                                <option value="0">Select gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <input class="form-control mydatepicker" type="text"  name="dob" value="" required="" > 
                        </div>
                    </div>
                    <div class="form-group row ">
                        <div class="col-md-12 col-xs-12">
                            <input class="form-control" type="email"  name="email" value="" required="" > 
                        </div>
                    </div>

                    <div class="form-group row ">
                        <div class="col-md-6 col-xs-12">
                            <select name="role" class="form-control" id="editrole">
                                <option value="O">Select Role</option>
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <select name="status" class="form-control" id="editstatus">
                                <option value="0">Select status</option>
                                <option value="Active">Active</option>
                                <option value="Pending">Pending</option>
                                <option value="Suspended">Suspended</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row ">
                        <div class="col-md-6 col-xs-12">
                            <input class="form-control" type="password"  name="password"  placeholder="Password"> 
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <input class="form-control" type="password"  name="password_confirmation"  placeholder="Confirm Password"> 
                        </div>
                    </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary"><i class="mdi mdi-account-edit"></i> Update User</button>
            </form>
            </div>
        </div>
    </div>
</div>