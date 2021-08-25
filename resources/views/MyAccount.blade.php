@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Hello {{ Auth::user()->name }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                <h3>Account Info : </h3>
                <ul>
                    <li>Name : {{ Auth::user()->name }}</li>
                    <li>Email : {{ Auth::user()->email}}</li>
                    <li>First Join : {{ Auth::user()->created_at}}</li>
                </ul>
                <br>
                <h3>My Blog : </h3>
                <div class="list-group">
                    @foreach ($Blog as $b)
                    <a href="/home/blog/{{$b->id}}" class="list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-between">
                          <h5 class="mb-1">{{$b->title}}</h5>
                          <small class="text-muted">{{$b->created_at}}</small>
                        </div>
                       
                            <small>Writer : {{$b->name}}</small>
                           
                              
                      </a>
                      <div class="row">
                          <div class="col-1"><a class="btn btn-dark" href="edit/{{$b->id}}">Edit</a></div>
                          <div class="col-1"><a class="btn btn-secondary" href="delete/{{$b->id}}">Delete</a></div>
                          
                        </div>
                    @endforeach
                </div>  
               
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
