@extends('report.layout')
  
@section('content')
<section style="padding-top: 60px">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('report.index') }}" style="margin-bottom: 5px"> Back</a>
                </div>
                <div class="card">
                    <div class="card-header">
                        Add Report
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
                        <form action="{{ route('report.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name" style="padding: 5px">Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Input name" />
                            </div>
                            <div class="form-group">
                                <label for="email" style="padding: 5px">Email</label>
                                <input type="text" name="email" class="form-control" placeholder="Input email" />
                            </div>
                            <div class="form-group">
                                <label for="mobile" style="padding: 5px">Mobile</label>
                                <input type="text" name="mobile" class="form-control" placeholder="Input mobile" />
                            </div>
                            <div class="form-group">
                                <label for="date" style="padding: 5px">Date of Report</label>
                                <input type="text" name="date" class="form-control" placeholder="Input date" />
                            </div>
                            <div class="form-group">
                                <label for="time" style="padding: 5px">Time</label>
                                <input type="text" name="time" class="form-control" placeholder="Input time" />
                            </div>
                            <div class="form-group">
                                <label for="location" style="padding: 5px">Location of Incident</label>
                                <input type="text" name="location" class="form-control" placeholder="Input location" />
                            </div>
                            <div class="form-group">
                                <label for="type" style="padding: 5px">Type on Incident</label>
                                <input type="text" name="type" class="form-control" placeholder="Input type" />
                            </div>
                            <div class="form-group">
                                <label for="description" style="padding: 5px">Description of Arrest</label>
                                <textarea type="text" name="description" class="form-control" placeholder="Input description"></textarea>
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