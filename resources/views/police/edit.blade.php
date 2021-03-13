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
                            Edit Police Officer
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
                            <form action="{{ route('police.update', $police->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="name" style="padding: 5px">Name</label>
                                    <input type="text" name="name" value="{{ $police->name }}" class="form-control" readonly/>
                                </div>
                                <br/>
                                <div class="form-group">
                                    <label for="mobile" style="padding: 5px">Mobile Number</label>
                                    <input type="text" name="mobile" value="{{ $police->mobile }}" class="form-control"/>
                                </div>
                                <br/>
                                <div class="form-group">
                                    <label for="rank" style="padding: 5px">Rank</label>
                                    <input type="text" name="rank" value="{{ $police->rank }}" class="form-control"/>
                                </div>
                                <br/>
                                <div class="form-group">
                                    <label for="status" style="padding: 5px">Status</label>
                                    <select name="status" id="status" value="{{ $police->status }}" class="form-control">
                                        <option value="Stationary">Stationary</option>
                                        <option value="Deployed">Deployed</option>
                                    </select>
                                </div>
                                <br/>
                                <div class="form-group">
                                    <label for="image" style="padding: 5px">Image</label>
                                    <input type="file" name="image" value="{{asset('images/'. $police->image )}}" class="form-control" />
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