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
                            Edit Announcement
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
                            <form action="{{ route('announcement.update', $announcement->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="title" style="padding: 5px">Title</label>
                                    <input type="text" name="title" value="{{ $announcement->title}}" class="form-control" required="true" aria-required="true"/>
                                </div>
                                <br/>
                                <div class="form-group">
                                    <label for="shortTitle" style="padding: 5px">Short Title</label>
                                    <input type="text" name="shortTitle" value="{{ $announcement->shortTitle}}" class="form-control" required="true" aria-required="true"/>
                                </div>
                                <br/>
                                <div class="form-group">
                                    <label for="date" style="padding: 5px">Date</label>
                                    <input type="text" name="date" value="{{ $announcement->date}}" class="form-control" required="true" aria-required="true"/>
                                </div>
                                <br/>
                                <div class="form-group">
                                    <label for="time" style="padding: 5px">Time</label>
                                    <input type="text" name="time" value="{{ $announcement->time}}" class="form-control" required="true" aria-required="true"/>
                                </div>
                                <br/>
                                <div class="form-group">
                                    <label for="subject" style="padding: 5px">Subject</label>
                                    <input type="text" name="subject" value="{{ $announcement->subject}}" class="form-control" required="true" aria-required="true"/>
                                </div>
                                <br/>
                                <div class="form-group">
                                    <label for="description" style="padding: 5px">Description</label>
                                    <textarea name="description" class="form-control" rows="5">{{ $announcement->description }}</textarea>
                                </div>
                                <br/>
                                <div class="form-group">
                                    <label for="image" style="padding: 5px">Image</label>
                                    <input type="file" name="image" value="{{asset('images/'. $announcement->image )}}" class="form-control" />
                                </div>
                                <br/>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection