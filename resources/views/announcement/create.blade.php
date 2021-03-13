@extends('announcement.layout')
  
@section('content')
<section style="padding-top: 60px">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('announcement.index') }}" style="margin-bottom: 5px"> Back</a>
                </div>
                <div class="card">
                    <div class="card-header">
                        Add an Announcement
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
                        <form action="{{ route('announcement.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="title" style="padding: 5px">Title</label>
                                <input type="text" name="title" class="form-control" placeholder="Input Title" />
                            </div>
                            <div class="form-group">
                                <label for="shortTitle" style="padding: 5px">Short Text</label>
                                <textarea name="shortTitle" class="form-control" rows="3" placeholder="Input Short Text"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="date" style="padding: 5px">Date</label>
                                <input type="text" name="date" class="form-control" placeholder="Input date" />
                            </div>
                            <div class="form-group">
                                <label for="time" style="padding: 5px">Time</label>
                                <input type="text" name="time" class="form-control" placeholder="Input time" />
                            </div>
                            <br/>
                            <div class="form-group">
                                <label for="subject" style="padding: 5px">Subject</label>
                                <input type="text" class="form-control" name="subject" />
                            </div>
                            <br/>
                            <div class="form-group">
                                <label for="description" style="padding: 5px">Description</label>
                                <textarea name="description" class="form-control" rows="5" placeholder="Input Description"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="image" style="padding: 5px">Image</label>
                                <input type="file" class="form-control" name="image" />
                            </div>
                            <br/>
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