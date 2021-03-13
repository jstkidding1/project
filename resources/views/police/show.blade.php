@extends('police.layout')

@section('content')
    <section style="padding-top: 60px">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('police.index') }}" style="margin-bottom: 5px"> Back</a>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            View Police Officer
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <img src="{{asset('images/'. $police->image )}}" height="150px" width="150px" />
                            </div>
                            <div class="form-group">
                                Name: {{ $police->name}} 
                            </div>
                            <div class="form-group">
                                Rank: {{ $police->rank}}
                            </div>
                            <div class="form-group">
                                Mobile Number: {{ $police->mobile}}
                            </div>
                            <div class="form-group">
                                Status: {{ $police->status}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection