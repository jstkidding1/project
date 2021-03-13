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
                            View crime
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <img src="{{asset('images/'. $crime->image )}}" height="150px" width="150px" />
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        NAME: {{ $crime->name}}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        OCCUPATION: {{ $crime->occupation}}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        SEX: {{ $crime->sex}}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        COLOR OF EYES: {{ $crime->eyes}}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        COLOR OF HAIR: {{ $crime->hair}}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        COLOR OF HAIR: {{ $crime->hair}}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        HEIGHT: {{ $crime->height}}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        WEIGHT: {{ $crime->weight}}
                                    </div> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        DATE OF ARREST: {{ $crime->date}}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        TIME OF ARREST: {{ $crime->time}}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        LOCATION OF THE CRIME HAPPEND: {{ $crime->location}}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        TYPE OF CRIME: {{ $crime->crime_type}}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        DESCRIPTION: {{ $crime->description}}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        BAIL: {{ $crime->bail}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection