@extends('wanted.layout')

@section('content')
    <section style="padding-top: 60px">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('wanted.index') }}" style="margin-bottom: 5px"> Back</a>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            View Wanted Person
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <img src="{{asset('images/'. $wanted->image )}}" height="150px" width="150px" />
                            </div>
                            <div class="form-group">
                                Name: {{ $wanted->name}} 
                            </div>
                            <div class="form-group">
                                Region: {{ $wanted->region }}
                            </div>
                            <div class="form-group">
                                Name: {{ $wanted->name }}
                            </div>
                            <div class="form-group">
                                Alias: {{ $wanted->alias }}
                            </div>
                            <div class="form-group">
                                Reward: {{ $wanted->reward }}
                            </div>
                            <br/>
                            <div class="form-group">
                                Criminal Case No.: {{ $wanted->criminal_case }}
                            </div>
                            <br/>
                            <div class="form-group">
                                Offense: {{ $wanted->offense }}
                            </div>
                            <br/>
                            <div class="form-group">
                                Issuing Court: {{ $wanted->issuing_court }}
                            </div>
                            <br/>

                            <li class="divider"></li>
                            <h5><strong>PHYSICAL DESCRIPTION</strong></h5>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            Sex: {{ $wanted->sex }}
                                        </div>
                                        <br/>
                                        <div class="form-group">
                                            Height: {{ $wanted->height }}
                                        </div>
                                        <br/>
                                        <div class="form-group">
                                            Weight: {{ $wanted->weight }}
                                        </div>
                                        <br/>
                                        <div class="form-group">
                                            Hair Color: {{ $wanted->hair }}
                                        </div>
                                        <br/>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            Eye Color: {{ $wanted->eye }}
                                        </div>
                                        <br/>
                                        <div class="form-group">
                                            Complexion: {{ $wanted->complexion }}
                                        </div>
                                        <br/>
                                        <div class="form-group">
                                            Other: {{ $wanted->other }}
                                        </div>
                                        <br/>
                                    </div>
                                </div>


                            <li class="divider"></li>
                            <h5><strong>PERSONAL DATA</strong></h5>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            Age: {{ $wanted->age }}
                                        </div>
                                        <br/>
                                        <div class="form-group">
                                            Date of Birth: {{ $wanted->date_birth }}
                                        </div>
                                        <br/>
                                        <div class="form-group">
                                            Place of Birth: {{ $wanted->place_birth }}
                                        </div>
                                        <br/>
                                        <div class="form-group">
                                            Citizen: {{ $wanted->citizen }}
                                        </div>
                                        <br/>
                                    </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        Father name: {{ $wanted->father_name }}
                                    </div>
                                    <br/>
                                    <div class="form-group">
                                        Mother name: {{ $wanted->mother_name }}
                                    </div>
                                    <br/>
                                    <div class="form-group">
                                        Address: {{ $wanted->address }}
                                    </div>
                                    <br/>
                                    <div class="form-group">
                                        Civil Status: {{ $wanted->civil_status }}
                                    </div>
                                    <br/>
                                </div>
                            </div>

                            <li class="divider"></li>
                            <h5><strong>EDUCATIONAL BACKGROUND</strong></h5>
                            <div class="form-group">
                                Elementary: {{ $wanted->elementary }}
                            </div>
                            <br/>
                            <div class="form-group">
                                Secondary: {{ $wanted->secondary }}
                            </div>
                            <div class="form-group">
                                College: {{ $wanted->college }}
                            </div>
                            <li class="divider"></li>

                            <div class="form-group">
                                Status: {{ $wanted->status }}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection