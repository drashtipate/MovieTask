
@extends('layouts.app')
@section('title', 'Dashboard|Movie')
@section('content')
<div class="px-4 mt-4">
    <h3 class="mt-4">Edit Cast</h3>
    <form class="mt-4" action="{{ url('/cast/update/'.$casts->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="name">Cast Name <span style="color:red;">*</span></label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$casts->name}}">

                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary ">Update</button>
        <a href="{{ url('/cast/view') }}" class="submit-back mx-2 mb-1">Back</a>
    </form>
</div>
@endsection

