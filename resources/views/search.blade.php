@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Result') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                   
                    <div class="row row-cols-1 row-cols-md-2 g-4 mb-2">
                       
                        @foreach ($Blog as $b)
                            
                        <div class="col mb-1 mt-1" >
                          <div class="card">
                            <img src="{{asset('image/'.$b->thumbnail)}}" class="card-img-top" alt="...">
                            <div class="card-body text-dark">
                              <a href="home/blog/{{$b->id}}"><h5 class="card-title">{{$b->title}}</h5></a>
                              
                              <small>{{$b->created_at}}</small>
                            </div>
                          </div>
                        </div>
                        @endforeach
                        
                    </div>

                    <div class="list-group">
                        @foreach ($User as $u)
                        <a href="/home/info/{{$u->id}}" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                              <h5 class="mb-1">{{$u->name}}</h5>
                              <small class="text-muted">Join at {{$u->created_at}}</small>
                            </div>
                        </a>
                        @endforeach
                    </div>  
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
