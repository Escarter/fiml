@extends('layouts.master')

@section('content')
    <div class="row pb-0">
        <div class="col-md-12">
            <h1>Download content</h1>
        </div>
    </div>
    @if($downloadableContents->count()>0)
        @foreach ($downloadableContents->chunk(2) as $chunk)
            <div class="row mt-2">
                @foreach ($chunk->sortBy('created_at') as $downloadableContent)
                <div class="cards col-md-6 col-lg-6 col-xs-12 col-sm-6 mb-5">
                    <div class="card "> 
                        {{--  <img class="img-responsive" alt="Training Cover Image" src="{{asset('/storage/coverImages/'.$downloadableContent->cover_image)}}">  --}}
                        <div class="card-body">
                            <div class="text-muted">
                                <span class="m-r-10"><i class="fa fa-calendar"></i> {{$downloadableContent->created_at->diffForHumans()}}</span> 
                                @if ($downloadableContent->isLiked)
                                    <a class="text-danger d-inline p-2 like" href="/users/downloadable-content/like/{{$downloadableContent->id}}"><i class="fa fa-heart"></i> {{$downloadableContent->likes->count()}}</a>                                    
                                @else
                                    <a class="text-secondary  d-inline p-2 like" href="/users/downloadable-content/like/{{$downloadableContent->id}}"><i class="fa fa-heart-o " ></i> {{$downloadableContent->likes->count()}}</a>                                
                                @endif
                            </div>
                            <hr>
                            <h3 class="m-t-20 m-b-20">{{str_limit($downloadableContent->file_name,100)}}</h3>
                            <p>{{str_limit($downloadableContent->description, 200)}}</p>
                            <a  href="/users/download-file/{{$downloadableContent->id}}" class="btn btn-gradient btn-red  pull-right m-t-20 " target="_blank" > Download Now</a>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @endforeach 
    @else
    <div class="card mb-5">
        <div class="card-header">
                Information
            </div>
        <div class="card-body">
            <h3 class="card-text">No Downloadable content avaliable yet</h3>
            <a href="/users/dashboard" class="btn btn-red btn-gradient  waves-effect waves-light">Back to Dashboard</a>
        </div>
    </div>
    @endif    
@endsection

@section('scripts')
@include('users.partials.likeScript')
@stop
