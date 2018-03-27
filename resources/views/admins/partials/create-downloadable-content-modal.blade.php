<div class="modal fade" id="createDownloadContentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content p-2">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel1"><i class="mdi mdi-plus-box"></i>  Create Training Content</h4> 
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>            
            </div>
            <div class="modal-body p-3">
                <form method="POST" action="/admin/create-download-content" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row ">
                        <div class="col-md-12 col-xs-12">
                            <select name="type" class="form-control" id="type">
                                <option value="O">Select file Location</option>
                                <option value="local">Local server</option>
                                <option value="remote">Remote url</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row ">
                        <div class="col-md-12 col-xs-12">
                            <input class="form-control" type="text"  name="file_name" value="" required="" placeholder="File Name"> 
                        </div>
                    </div>
                    <div class="form-group row ">
                        <div class="col-md-12 col-xs-12">
                            <textarea name="file_description" class="form-control" rows="6" id=""  placeholder="Enter Brief Description"></textarea>
                        </div>
                    </div>
                    <div class="form-group row " id="file" style="display:none;">
                        <div class="col-md-12 col-xs-12">
                            <input class="form-control" type="file"  name="file" value=""  placeholder="File"> 
                        </div>
                    </div>
                    <div id="url" style="display:none;">
                        <div class="form-group row " >
                            <div class="col-md-12 col-xs-12">
                                <input class="form-control" type="text"  name="file_url" value="" placeholder="File Url"> 
                            </div>
                        </div>
                        <div class="form-group row ">
                            <div class="col-md-12 col-xs-12">
                                <select name="file_extension" class="form-control " >
                                    <option value="O">Select file Extension</option>
                                    <option value="pdf">PDF</option>
                                    <option value="exe">Installer</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary"><i class="mdi mdi-plus-box"></i> Create Training</button>
            </form>
            </div>
        </div>
    </div>
</div>

    