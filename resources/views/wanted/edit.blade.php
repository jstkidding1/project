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
                            Edit Wanted Person
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
                            <form action="{{ route('wanted.update', $wanted->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="region" style="padding: 5px">Region</label>
                                            <input type="text" name="region" class="form-control" value="{{ $wanted->region }}" />
                                        </div>
                                        <div class="form-group">
                                            <label for="name" style="padding: 5px">Name</label>
                                            <input name="name" class="form-control" rows="3" value="{{ $wanted->name }}" />
                                        </div>
                                        <div class="form-group">
                                            <label for="alias" style="padding: 5px">Alias<small>(optional)</small></label>
                                            <input type="text" name="alias" class="form-control" value="{{ $wanted->alias }}" />
                                        </div>
                                        <div class="form-group">
                                            <label for="reward" style="padding: 5px">Reward</label>
                                            <input type="text" name="reward" class="form-control" value="{{ $wanted->reward }}" />
                                        </div>
                                        <br/>
                                        <div class="form-group">
                                            <label for="criminal_case" style="padding: 5px">Criminal Case No.</label>
                                            <input type="text" name="criminal_case" class="form-control" value="{{ $wanted->criminal_case }}" />
                                        </div>
                                        <br/>
                                        <div class="form-group">
                                            <label for="offense" style="padding: 5px">Offense</label>
                                            <input type="text" name="offense" class="form-control" value="{{ $wanted->offense }}" />
                                        </div>
                                        <br/>
                                        <div class="form-group">
                                            <label for="issuing_court" style="padding: 5px">Issuing Court</label>
                                            <input type="text" name="issuing_court" class="form-control" value="{{ $wanted->issuing_court }}" />
                                        </div>
                                        <br/>
                                    </div>
                                </div>
                                
                                <li class="divider"></li>
                                <h5><strong>PHYSICAL DESCRIPTION</strong></h5>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="sex" style="padding: 5px">A) Sex</label>
                                                <select name="sex" id="sex" class="form-control" value="{{ $wanted->sex }}">
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>
                                            <br/>
                                            <div class="form-group">
                                                <label for="height" style="padding: 5px">B) Height</label>
                                                <select name="height" id="height" class="form-control" value="{{ $wanted->height }}">
                                                    <option value="4'1">4'1</option>
                                                    <option value="4'2">4'2</option>
                                                    <option value="4'3">4'3</option>
                                                    <option value="4'4">4'4</option>
                                                    <option value="4'5">4'5</option>
                                                    <option value="4'6">4'6</option>
                                                    <option value="4'7">4'7</option>
                                                    <option value="4'8">4'8</option>
                                                    <option value="4'9">4'9</option>
                                                    <option value="4'10">4'10</option>
                                                    <option value="4'11">4'11</option>
                                                    <option value="5'0">5'0</option>
                                                    <option value="5'1">5'1</option>
                                                    <option value="5'2">5'2</option>
                                                    <option value="5'3">5'3</option>
                                                    <option value="5'4">5'4</option>
                                                    <option value="5'5">5'5</option>
                                                    <option value="5'6">5'6</option>
                                                    <option value="5'7">5'7</option>
                                                    <option value="5'8">5'8</option>
                                                    <option value="5'9">5'9</option>
                                                    <option value="5'10">5'10</option>
                                                    <option value="5'11">5'11</option>
                                                    <option value="6'0">6'0</option>
                                                    <option value="6'1">6'1</option>
                                                    <option value="6'2">6'2</option>
                                                    <option value="6'3">6'3</option>
                                                    <option value="6'4">6'4</option>
                                                    <option value="6'5">6'5</option>
                                                    <option value="6'6">6'6</option>
                                                    <option value="6'7">6'7</option>
                                                    <option value="6'8">6'8</option>
                                                    <option value="6'9">6'9</option>
                                                    <option value="6'10">6'10</option>
                                                    <option value="6'11">6'11</option>
                                                    <option value="7'0">7'0</option>
                                                </select>
                                            </div>
                                            <br/>
                                            <div class="form-group">
                                                <label for="weight" style="padding: 5px">C) Weight</label>
                                                <input type="text" name="weight" class="form-control" value="{{ $wanted->weight }}" />
                                            </div>
                                            <br/>
                                            <div class="form-group">
                                                <label for="hair" style="padding: 5px">D) Hair</label>
                                                <select name="hair" id="hair" class="form-control" value="{{ $wanted->hair }}">
                                                    <option value="Black">Black</option>
                                                    <option value="Brown">Brown</option>
                                                    <option value="Blond">Blond</option>
                                                    <option value="Auburn">Auburn</option>
                                                    <option value="Gray">Gray</option>
                                                    <option value="White">White</option>
                                                </select>
                                            </div>
                                            <br/>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="eye" style="padding: 5px">E) Eye</label>
                                                <select name="eye" id="eye" class="form-control" value="{{ $wanted->eye }}">
                                                    <option value="Brown">Brown</option>
                                                    <option value="Black">Black</option>
                                                    <option value="Green">Green</option>
                                                    <option value="Blue">Blue</option>
                                                    <option value="Gray">Gray</option>
                                                </select>
                                            </div>
                                            <br/>
                                            <div class="form-group">
                                                <label for="complexion" style="padding: 5px">F) Complexion</label>
                                                <select name="complexion" id="complexion" class="form-control" value="{{ $wanted->complexion }}">
                                                    <option value="Light">Light</option>
                                                    <option value="Fair">Fair</option>
                                                    <option value="Medium">Green</option>
                                                    <option value="Olive">Olive</option>
                                                    <option value="Tan brown">Tan brown</option>
                                                    <option value="Black brown">Black brown</option>
                                                </select>
                                            </div>
                                            <br/>
                                            <div class="form-group">
                                                <label for="other" style="padding: 5px">G) Other</label>
                                                <input type="text" name="other" class="form-control" value="{{ $wanted->other }}" />
                                            </div>
                                            <br/>
                                        </div>
                                    </div>
    
    
                                <li class="divider"></li>
                                <h5><strong>PERSONAL DATA</strong></h5>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="age" style="padding: 5px">A) Age</label>
                                                <input type="text" name="age" class="form-control" value="{{ $wanted->age }}" />
                                            </div>
                                            <br/>
                                            <div class="form-group">
                                                <label for="date_birth" style="padding: 5px">B) Date of birth</label>
                                                <input type="text" name="date_birth" class="form-control" value="{{ $wanted->date_birth }}" />
                                            </div>
                                            <br/>
                                            <div class="form-group">
                                                <label for="place_birth" style="padding: 5px">C) Place of birth</label>
                                                <input type="text" name="place_birth" class="form-control" value="{{ $wanted->place_birth }}" />
                                            </div>
                                            <br/>
                                            <div class="form-group">
                                                <label for="citizen" style="padding: 5px">D) Citizen</label>
                                                <input type="text" name="citizen" class="form-control" value="{{ $wanted->citizen }}" />
                                            </div>
                                            <br/>
                                        </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="father_name" style="padding: 5px">E) Father name</label>
                                            <input type="text" name="father_name" class="form-control" value="{{ $wanted->father_name }}" />
                                        </div>
                                        <br/>
                                        <div class="form-group">
                                            <label for="mother_name" style="padding: 5px">F) Mother name</label>
                                            <input type="text" name="mother_name" class="form-control" value="{{ $wanted->mother_name }}" />
                                        </div>
                                        <br/>
                                        <div class="form-group">
                                            <label for="address" style="padding: 5px">Address</label>
                                            <input type="text" name="address" class="form-control" value="{{ $wanted->address }}" />
                                        </div>
                                        <br/>
                                        <div class="form-group">
                                            <label for="civil_status" style="padding: 5px">Civil Status</label>
                                            <input type="text" name="civil_status" class="form-control" value="{{ $wanted->civil_status }}" />
                                        </div>
                                        <br/>
                                    </div>
                                </div>
    
                                <li class="divider"></li>
                                <h5><strong>EDUCATIONAL BACKGROUND</strong></h5>
                                <div class="form-group">
                                    <label for="elementary" style="padding: 5px">A) Elementary</label>
                                    <input type="text" class="form-control" name="elementary" value="{{ $wanted->elementary }}" />
                                </div>
                                <br/>
                                <div class="form-group">
                                    <label for="secondary" style="padding: 5px">B) Secondary</label>
                                    <input type="text" class="form-control" name="secondary" value="{{ $wanted->secondary }}" />
                                </div>
                                <div class="form-group">
                                    <label for="college" style="padding: 5px">C) College</label>
                                    <input type="text" class="form-control" name="college" value="{{ $wanted->college }}" />
                                </div>
                                <li class="divider"></li>

                                <div class="form-group">
                                    <label for="image" style="padding: 5px">Image</label>
                                    <input type="file" name="image" value="{{asset('images/'. $wanted->image )}}" class="form-control" />
                                </div>
                                <br/>
    
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" value="{{ $wanted->status }}">
                                        <option value="Pending">Pending</option>
                                        <option value="Finished">Finished</option>
                                    </select>
                                </div>
    
                                <br/>
                                <br/>
                                <button type="submit" class="btn btn-success">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection