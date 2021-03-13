@extends('dashboard.layout')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between" style="margin-top: 10%">
            <div class="pull-right" style="padding: 20px">
                        {{-- <a class="btn btn-primary" href="{{ route('welcome') }}" style="margin-bottom: 5px"> Back</a> --}}
                    </div>
        <div class="col-md-4">
            <form action="{{ route('dashboard.index') }}" method="GET" role="search" class="d-flex">
                <button type="btn btn-info" class="btn btn-default" type="submit" title="Search....">
                    <span class="fa fa-search"></span>
                </button>
                <input type="text" class="form-control" name="term" placeholder="Search...." id="term">
                    <a href="{{ route('dashboard.index')}}">
                        <span class="input-group-btn">
                            <button class="btn btn-success" type="button" title="Refresh Page">
                                <span class="fa fa-refresh"></span>
                            </button>
                        </span>
                    </a>
                </form>
            </div>
        </div>
        <div class="accordion" id="accordionExample">
            @foreach($announcements as $announcement)
            <div class="card">
              <div class="card-header" id="headingOne-{{ $announcement->id }}">
                <h2 class="mb-0">
                  <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne-{{ $announcement->id }}" @if($loop->first) aria-expanded="true" @endif aria-controls="collapseOne-{{ $announcement->id }}">
                    {{ $announcement->title}} {{ $announcement->date }} - {{ $announcement->time }}
                  </button>
                </h2>
              </div>
              <div id="collapseOne-{{ $announcement->id }}" class="collapse show" aria-labelledby="headingOne-{{ $announcement->id }}" data-parent="#accordionExample">
                <div class="card-body">
                    <div class="form-group">
                        <h1>{{ $announcement->title}}</h1>
                         {{ $announcement->date }} - {{ $announcement->time }}
                    </div>
                    <hr class="solid"/>
                    <div class="form-group">
                        <img class="card-img-top" src="{{asset('images/'. $announcement->image )}}" height="400px" width="200px" style="object-fit: none;" />
                        <p class="text-center"><small>{{ $announcement->shortTitle}}</small></p>
                    </div>
                    <hr class="solid"/>
                    <div class="form-group">
                        <h3>{{ $announcement->subject}}</h3>
                    </div>
                    <div class="form-group">
                        {{ $announcement->description}}
                    </div>
                </div>
              </div>
            </div>
            @endforeach
        </div>
@endsection
   
