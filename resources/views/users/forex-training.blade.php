@extends('layouts.master')

@section('content')
@if($trainingContents->count()>0)
    @foreach ($trainingContents->chunk(4) as $chunk)
        <div class="row">
            @foreach ($chunk as $trainingContent)
            <div class="col-md-6 col-lg-3 col-xs-12 col-sm-6 mb-5">
                <div class="card "> 
                    {{--  <img class="img-responsive" alt="Training Cover Image" src="{{asset('/storage/coverImages/'.$trainingContent->cover_image)}}">  --}}
                    <div class="card-body">
                        <div class="text-muted">
                            <span class="m-r-10"><i class="fa fa-calendar"></i> {{$trainingContent->created_at->diffForHumans()}}</span> 
                            @if ($trainingContent->isLiked)
                                <a class="text-danger d-inline p-2 like" href="/users/training-content/like/{{$trainingContent->id}}"><i class="fa fa-heart"></i> {{$trainingContent->likes->count()}}</a>                                    
                            @else
                                <a class="text-secondary  d-inline p-2 like" href="/users/training-content/like/{{$trainingContent->id}}"><i class="fa fa-heart-o " ></i> {{$trainingContent->likes->count()}}</a>                                
                            @endif
                        </div>
                        <hr>
                        <h3 class="m-t-20 m-b-20">{{str_limit($trainingContent->title,50)}}</h3>
                        <p>{{str_limit($trainingContent->content, 100)}}</p>
                        <a  href="{{$trainingContent->url}}" data-toggle="modal" data-target="#viewTrainingModal"  data-url="{{$trainingContent->url}}" data-name="{{$trainingContent->title}}" class="btn btn-red btn-gradient pull-right m-t-20 showTrainingModal" >Watch Now</a>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @endforeach 
@else
<div class="media panel ">
    <div class="media-body">
        <h4 class="media-heading">Information </h4> 
        <p>No Training content avaliable yet</p>
        {{--  <a href="#" class="btn btn-danger">Back to Dashboard</a>  --}}
    </div>
</div>
@endif
@include('users.partials.viewTrainingModal')
@endsection

@section('scripts')
@include('users.partials.likeScript')
<script >
$(document).ready(function(){
    $('.showTrainingModal').on('click',function(e){
        e.preventDefault()
        console.log('clicked')
        $('#viewTrainingModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var title = button.data('name') 
            var src_url = button.data('url')// Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('.modal-title').text(title)
            modal.find('.modal-body iframe').attr('src', src_url)
            console.log(title+''+src_url)
        })

    })
})
</script>
@stop
