@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('errors'))
                        <div class="alert alert-success">
                            {{ session('errors') }}
                        </div>
                    @endif


                    <form action="/downloadform" method="post" enctype="multipart/form-data">
                         @csrf
                        <div class="form-group">
                            <input type="file" name="filefield" class="form-control">
                            <input type="submit" class="btn btn-primary">
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection