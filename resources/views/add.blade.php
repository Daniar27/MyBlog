@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Headline') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                     
                        <form action="/home/save/{{ Auth::user()->id}}" method="POST" enctype="multipart/form-data">  
                            {{ csrf_field() }}
                            <div class="card mb-3">
                                Thumbnail
                                <input type="file" name="thumbnail" class="form-control" placeholder="Upload Thumbnail ...">
                                @if($errors->has('thumbnail'))
                                    <div class="text-danger">
                                        {{ $errors->first('thumbnail')}}
                                    </div>
                                @endif
                                <div class="card-body">
                                    <div class="form-group">
                                <input type="text" class="form-control card-title" name="judul" placeholder="Title">
                                 @if($errors->has('title'))
                                    <div class="text-danger">
                                        {{ $errors->first('title')}}
                                    </div>
                                @endif
                                <textarea class="form-control" name="content" rows="9" placeholder="Your content (can using tag html <p><b> etc)"></textarea>
                                @if($errors->has('content'))
                                    <div class="text-danger">
                                        {{ $errors->first('content')}}
                                    </div>
                                @endif
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-secondary" value="Submit">
                                </div>
                                </div>
                            </div>
                        </form> 
                    
                 
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection