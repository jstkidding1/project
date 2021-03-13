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
                        Add an Incident Report
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
                        <form action="{{ route('incident.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name" style="padding: 5px">Reported by</label>
                                <input type="text" name="name" class="form-control" placeholder="Input name" />
                            </div>
                            <div class="form-group">
                                <label for="date" style="padding: 5px">Time & Date of the incident</label>
                                <input type="text" name="date" class="form-control" placeholder="Date & Time" />
                            </div>
                            <div class="form-group">
                                <label for="location" style="padding: 5px">Location</label>
                                <input type="text" name="location" class="form-control" placeholder="Input location" />
                            </div>
                            <div class="form-group">
                                <label for="victim" style="padding: 5px">Name of victim</label>
                                <input type="text" name="victim" class="form-control" placeholder="Input victim" />
                            </div>
                            <div class="form-group">
                                <label for="image" style="padding: 5px">Image</label>
                                <br/>
                                <input type="file" name="image" />
                            </div>
                            <div class="form-group">
                                <label for="description" style="padding: 5px">Description of any Injuries, Damage of Property or Weapons Involved in the Incident</label>
                                <textarea type="text" name="description" class="form-control" rows="5" placeholder="Input description"></textarea>
                            </div>
                            <div class="form-group">
                                <select name="status" id="status">
                                    <option value="Pending" class="danger">Pending</option>
                                    <option value="Pending" class="success">Cleared</option>
                                </select>
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