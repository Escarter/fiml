<div class="modal fade" id="editDownloadContentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel1"><i class="mdi mdi-plus-box"></i>  Update Downloadable Content</h4> </div>
                <div class="modal-body">
                    <form method="POST" action="/admin/edit-download-content" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row ">
                            <div class="col-md-12 col-xs-12">
                                <input class="form-control" type="file"  name="filefield" value="" required="" placeholder="Email Address"> 
                            </div>
                        </div>
                        <div class="col-md-12 col-xs-12">
                            <input class="form-control " type="text"  name="filename" value="" required="" placeholder="File Name"> 
                        </div>
                        <div class="form-group row ">
                            <div class="col-md-12 col-xs-12">
                                <textarea name="description" class="form-control"  id=""  placeholder="Enter Brief Description"></textarea>
                            </div>
                        </div>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary"><i class="mdi mdi-plus-box"></i> Update Downloadable</button>
                </form>
                </div>
            </div>
        </div>
    </div>