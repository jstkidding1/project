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
                        Add Missing Person
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
                        <form action="{{ route('missing.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="reportedBy" style="padding: 5px">Reported By</label>
                                <input type="text" name="reportedBy" class="form-control" placeholder="Input repoted by" />
                            </div>
                            <div class="form-group">
                                <label for="name" style="padding: 5px">Name</label>
                                <input name="name" class="form-control" rows="3" placeholder="Input Name" />
                            </div>
                            <div class="form-group">
                                <label for="relationship" style="padding: 5px">Relationship</label>
                                <input type="text" name="relationship" class="form-control" placeholder="Input relationship" />
                            </div>
                            <div class="form-group">
                                <label for="mobile" style="padding: 5px">Mobile</label>
                                <input type="text" name="mobile" class="form-control" placeholder="Input mobile" />
                            </div>
                            <br/>
                            <div class="form-group">
                                <label for="location" style="padding: 5px">Location</label>
                                <input type="text" name="location" class="form-control" placeholder="Input Location" />
                            </div>
                            <br/>
                            <div class="form-group">
                                <label for="time" style="padding: 5px">Time</label>
                                <input type="text" name="time" class="form-control" placeholder="Input time" />
                            </div>
                            <br/>
                            <div class="form-group">
                                <label for="date" style="padding: 5px">Date</label>
                                <input type="text" name="date" class="form-control" placeholder="Input date" />
                            </div>
                            <br/>
                            <div class="form-group">
                                <label for="description" style="padding: 5px">Description</label>
                                <textarea name="description" id="description" rows="5" class="form-control"></textarea>
                            </div>
                            <br/>
                            <div class="form-group">
                                <label for="status" style="padding: 5px">Status</label>
                                <select name="status" id="status">
                                    <option value="Pending">Pending</option>
                                    <option value="Complete">Complete</option>
                                </select>
                            </div>
                            <br/>
                            <div class="form-group">
                                <label for="image" style="padding: 5px">Image</label>
                                <input type="file" name="image" />
                            </div>
                            <br/>
                            <button type="submit" class="btn btn-success">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection