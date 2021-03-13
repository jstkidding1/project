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
                        Add a Crime Report
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
                        <form action="{{ route('crime.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name" style="padding: 5px">Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Input name" />
                            </div>
                            <div class="form-group">
                                <label for="occupation" style="padding: 5px">Occupation</label>
                                <input type="text" name="occupation" class="form-control" placeholder="Input occupation" />
                            </div>
                            <div class="form-group">
                                <label for="sex" style="padding: 5px">Sex</label>
                                {{-- <input type="text" name="sex" class="form-control" placeholder="Input sex" /> --}}
                                <select name="sex" id="sex" class="form-control">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="eyes" style="padding: 5px">Color of eyes</label>
                                {{-- <input type="text" name="eyes" class="form-control" placeholder="Input eyes" /> --}}
                                <select name="eyes" id="eyes" class="form-control">
                                    <option value="Brown">Brown</option>
                                    <option value="Black">Black</option>
                                    <option value="Green">Green</option>
                                    <option value="Blue">Blue</option>
                                    <option value="Gray">Gray</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="hair" style="padding: 5px">Color of hair</label>
                                {{-- <input type="text" name="hair" class="form-control" placeholder="Input hair" /> --}}
                                <select name="hair" id="hair" class="form-control">
                                    <option value="Black">Black</option>
                                    <option value="Brown">Brown</option>
                                    <option value="Blond">Blond</option>
                                    <option value="Auburn">Auburn</option>
                                    <option value="Gray">Gray</option>
                                    <option value="White">White</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="height" style="padding: 5px">Height</label>
                                {{-- <input type="text" name="height" class="form-control" placeholder="Input height" /> --}}
                                <select name="height" id="height" class="form-control">
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
                            <div class="form-group">
                                <label for="weight" style="padding: 5px">Weight</label>
                                <input type="text" name="weight" class="form-control" placeholder="Input weight" />
                            </div>
                            <div class="form-group">
                                <label for="date" style="padding: 5px">Date Of Arrest</label>
                                <input type="text" name="date" class="form-control" placeholder="Input date" />
                            </div>
                            <div class="form-group">
                                <label for="time" style="padding: 5px">Time Of Arrest</label>
                                <input type="text" name="time" class="form-control" placeholder="Input time" />
                            </div>
                            <div class="form-group">
                                <label for="location" style="padding: 5px">Location Of Convict</label>
                                <input type="text" name="location" class="form-control" placeholder="Input location" />
                            </div>
                            <div class="form-group">
                                <label for="crime_type" style="padding: 5px">Type of Crime</label>
                                <select name="crime_type" id="crime_type" class="form-control">
                                    <option value="Antisocial Behaviour">Antisocial Behaviour</option>
                                    <option value="Arson">Arson</option>
                                    <option value="Burglary">Burglary</option>
                                    <option value="Child Abuse">Child Abuse</option>
                                    <option value="Crime Aborad">Crime Aborad</option>
                                    <option value="Cyber Crime & Online Fraud">Cyber Crime & Online Fraud</option>
                                    <option value="Domestic Abuse">Domestic Abuse</option>
                                    <option value="Fraud">Fraud</option>
                                    <option value="Hate Crime">Hate Crime</option>
                                    <option value="Image-based Sexual Abuse">Image-based Sexual Abuse</option>
                                    <option value="Modern Slavery">Modern Slavery</option>
                                    <option value="Murder or Manslaugther">Murder or Manslaugther</option>
                                    <option value="Rape and Sexual Assault">Rape and Sexual Assault</option>
                                    <option value="Robbery">Robbery</option>
                                    <option value="Sexual Harassment">Sexual Harassment</option>
                                    <option value="Stalking and Harassment">Stalking and Harassment</option>
                                    <option value="Terrorism">Terrorism</option>
                                    <option value="Violent Crime">Violent Crime</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="bail" style="padding: 5px">Bail</label>
                                <input type="text" name="bail" class="form-control" placeholder="Input bail" />
                            </div>
                            <div class="form-group">
                                <label for="description" style="padding: 5px">Description</label>
                                <textarea type="description" name="description" rows="5" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="image" style="padding: 5px">Image</label>
                                <input type="file" name="image" class="form-control" placeholder="Input image" />
                            </div>
                            <button type="submit" class="btn btn-success">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection