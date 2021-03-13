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
                            View incident
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <img src="{{asset('images/'. $incident->image )}}" height="150px" width="150px" />
                            </div>
                            <div class="form-group">
                                Reported By: {{ $incident->name}}
                            </div>
                            <div class="form-group">
                                Date: {{ $incident->date}}
                            </div>
                            <div class="form-group">
                                Location of the Incident: {{ $incident->location}}
                            </div>
                            <div class="form-group">
                                Name of victim: {{ $incident->victim}}
                            </div>
                            <div class="form-group">
                                Description: {{ $incident->description}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection