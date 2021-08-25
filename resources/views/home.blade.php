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
                   
                    <div class="row row-cols-1 row-cols-md-2 g-4 mb-2">
                       
                        @foreach ($Blog as $b)
                            
                        <div class="col mb-1 mt-1" >
                          <div class="card">
                            <img src="{{asset('image/'.$b->thumbnail)}}" class="card-img-top" alt="...">
                            <div class="card-body text-dark">
                              <a href="home/blog/{{$b->id}}"><h5 class="card-title">{{$b->title}}</h5></a>
                              <a href="home/info/{{$b->id_user}}"><p class="text-muted">{{$b->name}}</p></a>
                              <small>{{$b->created_at}}</small>
                            </div>
                          </div>
                        </div>
                       

                        @endforeach
                        
                    </div>
                    {{ $Blog->links() }}
                 
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
