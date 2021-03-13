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
                        Add a Police Officer
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
                        <form action="{{ route('police.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name" style="padding: 5px">Full Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Input Full Name" />
                            </div>
                            <br/>
                            <div class="form-group">
                                <label for="mobile" style="padding: 5px">Mobile Number</label>
                                <input type="text" name="mobile" class="form-control" placeholder="Input number" />
                            </div>
                            <br/>
                            <div class="form-group">
                                <label for="rank" style="padding: 5px">Rank</label>
                                <input type="text" name="rank" class="form-control" placeholder="Input Rank" />
                            </div>
                            <br/>
                            <div class="form-group">
                                <label for="status" style="padding: 5px">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="Stationary">Stationary</option>
                                    <option value="Deployed">Deployed</option>
                                </select>
                            </div>
                            <br/>
                            <div class="form-group">
                                <label for="image" style="padding: 5px">Profile Image</label>
                                <br/>
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