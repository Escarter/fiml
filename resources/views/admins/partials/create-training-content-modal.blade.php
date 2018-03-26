<div class="modal fade" id="createTrainingContentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel1"><i class="mdi mdi-plus-box"></i>  Create Training Content</h4> </div>
            <div class="modal-body">
                <form method="POST" action="/admin/create-training-content" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-6 col-xs-12">
                            <input class="form-control" type="text"  name="title" value="" required="" placeholder="Title" autofocus> 
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <select name="type" class="form-control" id="type">
                                <option value="0">Select Type</option>
                                <option value="video">Video</option>
                                <option value="text">Text</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row ">
                        <div class="col-md-6 col-xs-12">
                            <select name="video_category_id" class="form-control" id="video-category">
                                <option value="Male">Select Training Category</option>
                                @foreach ($trainingCategories as $trainingCategory )
                                     <option value="{{$trainingCategory->id}}">{{$trainingCategory->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <input class="form-control " type="url"  name="url" value="" required="" placeholder="Video URL"> 
                        </div>
                    </div>
                    <div class="form-group row ">
                        <div class="col-md-12 col-xs-12">
                            <textarea name="content" class="form-control"  id=""  placeholder="Enter Brief Description"></textarea>
                        </div>
                    </div>
                    <div class="form-group row ">
                        <div class="col-md-12 col-xs-12">
                            <input class="form-control" type="file"  name="cover-image" value="{{ old('email') }}" required="" placeholder="Email Address"> 
                        </div>
                    </div>
                
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary"><i class="mdi mdi-plus-box"></i> Create Training</button>
            </form>
            </div>
        </div>
    </div>
</div>