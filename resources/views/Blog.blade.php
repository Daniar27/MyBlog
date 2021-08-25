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

                    
                        @foreach ($User as $u)
                            
                        <div class="card mb-3">
                            <img src="{{asset('image/'.$u->thumbnail)}}" class="card-img-top">
                            <div class="card-body">
                              <h5 class="card-title">{{$u->title}}</h5>
                              <p class="card-text"><small style="color: black;">writer : <a href="/home/info/{{$u->id_user}}">{{$u->name}}</a></small></p>
                              @php
                                  echo <<<text
                                    {$u->content}
                                  text;
                              @endphp   
                              <p class="card-text"><small class="text-muted">{{$u->created_at}}</small></p>
                            </div>
                          </div>

                        @endforeach
                    
                 
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection