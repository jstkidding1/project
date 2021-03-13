@extends('announcement.layout')

@section('content')
        <div class="container">
            <div class="d-flex justify-content-around">
                <div class="row" style="padding-top: 50px">
                    <div class="col-md-12">
                        <a class="btn btn-warning btn-lg" href="{{ route('announcement.index')}}">ANNOUNCMENTS</a>&nbsp;&nbsp;&nbsp;
                        <a class="btn btn-warning btn-lg" href="{{ route('police.index')}}">POLICE OFFICERS</a>&nbsp;&nbsp;&nbsp;
                        <a class="btn btn-warning btn-lg" href="{{ route('incident.index')}}">INCIDENT REPORT</a>&nbsp;&nbsp;&nbsp;
                        <a class="btn btn-warning btn-lg" href="{{ route('crime.index')}}">CRIME RECORDS</a>&nbsp;&nbsp;&nbsp;
                        <a class="btn btn-warning btn-lg" href="{{ route('wanted.index')}}">WANTED PERSONS</a>&nbsp;&nbsp;&nbsp;
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <a class="btn btn-warning btn-lg" href="{{ route('missing.index')}}">MISSING PERSON</a>&nbsp;&nbsp;&nbsp;
            </div>
            <div class="d-flex justify-content-between" style="margin-top: 10%">
                <a class="btn btn-success"href="{{ route('announcement.create') }}">Add Announcement</a>
            <div class="col-md-4">
                <form action="{{ route('announcement.index') }}" method="GET" role="search" class="d-flex">
                    <button type="btn btn-info" class="btn btn-default" type="submit" title="Search....">
                        <span class="fa fa-search"></span>
                    </button>
                    <input type="text" class="form-control" name="term" placeholder="Search...." id="term">
                        <a href="{{ route('announcement.index')}}">
                            <span class="input-group-btn">
                                <button class="btn btn-success" type="button" title="Refresh Page">
                                    <span class="fa fa-refresh"></span>
                                </button>
                            </span>
                        </a>
                    </form>
                </div>
            </div>
            <section style="margin-top: 20px">
                <div class="row justify-content-between">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" style="text-align: left">All Announcements</div>
                                <br/>
                                @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                                @endif
                                    <div class="card-body">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <td>#</td>
                                                    <td>Title</td>
                                                    <td>Subject</td>
                                                    <td width="250px">Action</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($announcements as $announcement)
                                                    <tr>
                                                        <td style="vertical-align: middle">{{$loop->iteration}}</td>
                                                        <td style="vertical-align: middle">{{$announcement->title}}</td>
                                                        <td style="overflow-wrap: break-word">{{$announcement->subject}}</td>
                                                        <td style="vertical-align: middle">
                                                            <form action="{{ route('announcement.destroy', $announcement->id)}}" method="POST">
                                                                <a class="btn btn-outline-success" href="{{ route('announcement.show', $announcement->id)}}">View</a>
                                                                <a class="btn btn-outline-info" href="{{ route('announcement.edit', $announcement->id)}}">Edit</a>
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-outline-danger">Delete</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                {!! $announcements->links() !!}
            @endsection
                

   
