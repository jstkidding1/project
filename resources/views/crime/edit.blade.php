@extends('crime.layout')

@section('content')
    <section style="padding-top: 60px">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('crime.index') }}" style="margin-bottom: 5px"> Back</a>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            Edit Crime Report
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
                            <form action="{{ route('crime.update', $crime->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="name" style="padding: 5px">Name</label>
                                    <input type="text" name="name" value="{{ $crime->name }}" class="form-control" placeholder="Input name" />
                                </div>
                                <div class="form-group">
                                    <label for="occupation" style="padding: 5px">Occupation</label>
                                    <input type="text" name="occupation" value="{{ $crime->occupation }}" class="form-control" placeholder="Input occupation" />
                                </div>
                                <div class="form-group">
                                    <label for="sex" style="padding: 5px">Sex</label>
                                    <input type="text" name="sex" value="{{ $crime->sex }}" class="form-control" placeholder="Input sex" />
                                </div>
                                <div class="form-group">
                                    <label for="eyes" style="padding: 5px">Color of eyes</label>
                                    <input type="text" name="eyes" value="{{ $crime->eyes }}" class="form-control" placeholder="Input eyes" />
                                </div>
                                <div class="form-group">
                                    <label for="hair" style="padding: 5px">Hair color</label>
                                    <input type="text" name="hair" value="{{ $crime->hair }}" class="form-control" placeholder="Input hair" />
                                </div>
                                <div class="form-group">
                                    <label for="height" style="padding: 5px">Height</label>
                                    <input type="text" name="height" value="{{ $crime->height }}" class="form-control" placeholder="Input height" />
                                </div>
                                <div class="form-group">
                                    <label for="weight" style="padding: 5px">Weight</label>
                                    <input type="text" name="weight" value="{{ $crime->weight }}" class="form-control" placeholder="Input weight" />
                                </div>
                                <div class="form-group">
                                    <label for="date" style="padding: 5px">Date</label>
                                    <input type="text" name="date" value="{{ $crime->date }}" class="form-control" placeholder="Input date" />
                                </div>
                                <div class="form-group">
                                    <label for="time" style="padding: 5px">Time</label>
                                    <input type="text" name="time" value="{{ $crime->time }}" class="form-control" placeholder="Input time" />
                                </div>
                                <div class="form-group">
                                    <label for="location" style="padding: 5px">Location</label>
                                    <input type="text" name="location" value="{{ $crime->location }}" class="form-control" placeholder="Input location" />
                                </div>
                                <div class="form-group">
                                    <label for="bail" style="padding: 5px">Bail</label>
                                    <input type="text" name="bail" value="{{ $crime->bail }}" class="form-control" placeholder="Input bail" />
                                </div>
                                <div class="form-group">
                                    <label for="crime_type" style="padding: 5px">Crime Type</label>
                                    <input type="text" name="crime_type" value="{{ $crime->crime_type }}" class="form-control" placeholder="Input crime_type" />
                                </div>
                                <div class="form-group">
                                    <label for="description" style="padding: 5px">Description</label>
                                    <input type="text" name="description" value="{{ $crime->description }}" class="form-control" placeholder="Input description" />
                                </div>
                                <div class="form-group">
                                    <label for="image" style="padding: 5px">Image</label>
                                    <input type="file" name="image" value="{{asset('images/'. $crime->image )}}" class="form-control" />
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