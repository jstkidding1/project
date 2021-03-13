@extends('report.layout')

@section('content')
    <section style="padding-top: 60px">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('report.index') }}" style="margin-bottom: 5px"> Back</a>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            Edit report Report
                        </div>
                        <div class="card-body">
                            @if($errors->any())
                            <div class="alert alert-danger">
                                Whoops! There were some problems with your input
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <form action="{{ route('report.update', $report->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="name" style="padding: 5px">Name</label>
                                    <input type="text" name="name" value="{{ $report->name }}" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label for="email" style="padding: 5px">Email</label>
                                    <input type="text" name="email" value="{{ $report->email }}" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label for="mobile" style="padding: 5px">Mobile</label>
                                    <input type="text" name="mobile" value="{{ $report->mobile }}" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label for="date" style="padding: 5px">Date</label>
                                    <input type="text" name="date" value="{{ $report->date }}" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label for="time" style="padding: 5px">Time</label>
                                    <input type="text" name="time" value="{{ $report->time }}" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label for="location" style="padding: 5px">Location</label>
                                    <input type="text" name="location" value="{{ $report->location }}" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label for="type" style="padding: 5px">Type of Incident</label>
                                    <input type="text" name="type" value="{{ $report->type }}" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label for="description" style="padding: 5px">Description</label>
                                    {{-- <textarea type="text" name="description" value="{{ $report->description }}" class="form-control" placeholder="Input date" ></textarea> --}}
                                    <input type="text" name="description" value="{{ $report->description}}" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label for="image" style="padding: 5px">Image</label>
                                    <input type="file" name="image" value="{{asset('images/'. $report->image )}}" class="form-control" />
                                </div>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection