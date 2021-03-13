@extends('missing.layout')

@section('content')
    <section style="padding-top: 60px">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('missing.index') }}" style="margin-bottom: 5px"> Back</a>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            View Missing Person
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <img src="{{asset('images/'. $missing->image )}}" height="150px" width="150px" />
                            </div>
                            <div class="form-group">
                                Reported by: {{ $missing->reportedBy}} 
                            </div>
                            <div class="form-group">
                                Missing person name: {{ $missing->name}}
                            </div>
                            <div class="form-group">
                                Relationship: {{ $missing->relationship}}
                            </div>
                            <div class="form-group">
                                Mobile: {{ $missing->mobile}}
                            </div>
                            <div class="form-group">
                                Location: {{ $missing->location }}
                            </div>
                            <div class="form-group">
                                Time: {{ $missing->time }}
                            </div>
                            <div class="form-group">
                                Date: {{ $missing->date }}
                            </div>
                            <div class="form-group">
                                Status: {{ $missing->status }}
                            </div>
                            <br/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection