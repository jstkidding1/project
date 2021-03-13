@extends('incident.layout')

@section('content')
    <section style="padding-top: 60px">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('incident.index') }}" style="margin-bottom: 5px"> Back</a>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            Edit Incident Report
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
                            <form action="{{ route('incident.update', $incident->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="name" style="padding: 5px">Reported by</label>
                                    <input type="text" name="name" value="{{ $incident->name }}" class="form-control" placeholder="Input name" />
                                </div>
                                <br/>
                                <div class="form-group">
                                    <label for="date" style="padding: 5px">Time & Date of the incident</label>
                                    <input type="text" name="date" value="{{ $incident->date }}" class="form-control" id="datetimepicker4" />
                                </div>
                                <br/>
                                <div class="form-group">
                                    <label for="location" style="padding: 5px">Location of the complaint</label>
                                    <input type="text" name="location" value="{{ $incident->location }}" class="form-control" placeholder="Input location" />
                                </div>
                                <br/>
                                <div class="form-group">
                                    <label for="victim" style="padding: 5px">Victim name</label>
                                    <input type="text" name="victim" value="{{ $incident->victim }}" class="form-control" placeholder="Input victim" />
                                </div>
                                <br/>
                                <div class="form-group">
                                    <label for="description" style="padding: 5px">General Description of any injuries, property, or weapons involved in the incident</label>
                                    <textarea name="description" class="form-control" rows="5" placeholder="Input Description">{{ $incident->description }}</textarea>
                                </div>
                                <br/>
                                <div class="form-group">
                                    <label for="image" style="padding: 5px">Image</label>
                                    <input type="file" name="image" value="{{asset('images/'. $incident->image )}}" class="form-control" />
                                </div>
                                <br/>
                                <div class="form-group">
                                    <label for="status" style="padding: 5px">Status</label>
                                    <select name="status" id="status" value="{{ $incident->status }}">
                                        <option value="Pending">Pending</option>
                                        <option value="Cleared">Cleared</option>
                                    </select>
                                </div>
                                <br/>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="{{ asset('js/app.js') }}">
        $(function () {
                $('#datetimepicker4').datetimepicker();
            })
    </script>
@endsection