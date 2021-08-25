@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @foreach ($User as $u)
            <div class="card">
                <div class="card-header">{{ $u->name }}'s Account</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                <h3>Account Info : </h3>
                <ul>
                    <li>Name : {{ $u->name }}</li>
                    
                </ul>
                <br>
                <h3>{{ $u->name}}'s Blog: </h3>
            @endforeach
            
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    @foreach ($Blog as $b)
                    <div class="col">
                      <div class="card h-200">
                        <img src="{{asset('image/'.$b->thumbnail)}}" alt="..." height="100%" width="100%">
                        <div class="card-body">
                          <a href="/home/blog/{{$b->id}}><h5 class="card-title">{{ $b->title }}</h5></a>
                          <p class="card-text text-muted" style="height:3.5rem;">{{ $b->created_at }}</p>
                          
                        </div>
                      </div>
                    </div>
                    @endforeach
                  </div>     
                
               
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
