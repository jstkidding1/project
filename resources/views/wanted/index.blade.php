@extends('wanted.layout')

@section('content')
        <div class="container">
            <div class="d-flex justify-content-around">
                <div class="row" style="padding-top: 50px">
                    <div class="mr-auto">
                        <a class="btn btn-warning btn-lg" href="{{ route('announcement.index')}}">ANNOUNCMENTS</a>&nbsp;&nbsp;&nbsp;
                        <a class="btn btn-warning btn-lg" href="{{ route('police.index')}}">POLICE OFFICERS</a>&nbsp;&nbsp;&nbsp;
                        <a class="btn btn-warning btn-lg" href="{{ route('incident.index')}}">INCIDENT REPORT</a>&nbsp;&nbsp;&nbsp;
                        <a class="btn btn-warning btn-lg" href="{{ route('crime.index')}}">CRIME RECORDS</a>&nbsp;&nbsp;&nbsp;
                        <a class="btn btn-warning btn-lg" href="{{ route('wanted.index')}}">WANTED PERSONS</a>&nbsp;&nbsp;&nbsp;
                        <a class="btn btn-warning btn-lg" href="{{ route('missing.index')}}">MISSING PERSON</a>&nbsp;&nbsp;&nbsp;
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-between" style="margin-top: 10%">
                <a class="btn btn-success"href="{{ route('wanted.create') }}">Add Wanted Person</a>
            <div class="col-md-4">
                <form action="{{ route('wanted.index') }}" method="GET" role="search" class="d-flex">
                    <button type="btn btn-info" class="btn btn-default" type="submit" title="Search....">
                        <span class="fa fa-search"></span>
                    </button>
                    <input type="text" class="form-control" name="term" placeholder="Search...." id="term">
                        <a href="{{ route('wanted.index')}}">
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
                                <div class="card-header" style="text-align: left">All Wanted</div>
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
                                                    <td>Name</td>
                                                    <td>Offense</td>
                                                    <td width="250px">Action</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($wanteds as $wanted)
                                                    <tr>
                                                        <td style="vertical-align: middle">{{$loop->iteration}}</td>
                                                        <td style="vertical-align: middle">{{$wanted->name}}</td>
                                                        <td style="vertical-align: middle">{{$wanted->offense}}</td>
                                                        <td style="vertical-align: middle">
                                                            <form action="{{ route('wanted.destroy', $wanted->id)}}" method="POST">
                                                                <a class="btn btn-outline-success" href="{{ route('wanted.show', $wanted->id)}}">View</a>
                                                                <a class="btn btn-outline-info" href="{{ route('wanted.edit', $wanted->id)}}">Edit</a>
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
            {!! $wanteds->links() !!}
        @endsection


   
