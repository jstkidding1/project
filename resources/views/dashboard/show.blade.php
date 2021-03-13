@extends('dashboard.layout')

@section('content')
    <div class="container">
        <section style="padding-top: 60px">
            <div class="container">
                <div class="row">
                    <div class="pull-right" style="padding: 20px">
                        <a class="btn btn-primary" href="{{ route('dashboard.index') }}" style="margin-bottom: 5px"> Back</a>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                Announcement
                            </div>
                            <div class="card-body">
                                {{-- @foreach($announcements as $announcement) --}}
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
                                {{-- @endforeach --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection
   
