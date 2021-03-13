@extends('report.layout')

@section('content')
        <div class="container">
            <div class="d-flex justify-content-between" style="margin-top: 10%">
                <a class="btn btn-success"href="{{ route('report.create') }}">Add Report</a>
            <div class="col-md-4">
                <form action="{{ route('report.index') }}" method="GET" role="search" class="d-flex">
                    <button type="btn btn-info" class="btn btn-default" type="submit" title="Search....">
                        <span class="fa fa-search"></span>
                    </button>
                    <input type="text" class="form-control" name="term" placeholder="Search...." id="term">
                        <a href="{{ route('report.index')}}">
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
                                <div class="card-header" style="text-align: left">All Reports</div>
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
                                                    <td>Email</td>
                                                    <td>Mobile</td>
                                                    <td>Type Of Report</td>
                                                    <td>Status</td>
                                                    <td width="250px">Action</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($reports as $officer)
                                                    <tr>
                                                        <td style="vertical-align: middle">{{$loop->iteration}}</td>
                                                        <td style="vertical-align: middle">{{$officer->name}}</td>
                                                        <td style="vertical-align: middle">{{$officer->email}}</td>
                                                        <td style="vertical-align: middle">{{$officer->mobile}}</td>
                                                        <td style="vertical-align: middle">{{$officer->type}}</td>
                                                        <td style="vertical-align: middle">{{$officer->status}}</td>
                                                        <td style="vertical-align: middle">
                                                            <form action="{{ route('report.destroy', $officer->id)}}" method="POST">
                                                                <a class="btn btn-outline-success" href="{{ route('report.show', $officer->id)}}">View</a>
                                                                <a class="btn btn-outline-info" href="{{ route('report.edit', $officer->id)}}">Edit</a>
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
                {!! $reports->links() !!}
            @endsection


   

   
