
@extends('layouts.app')
@section('title', 'Dashboard|Movie')
@section('content')
<div class="mt-4 px-4">
    <h3 class="mt-4">Cast</h3>
    <form class="mt-4" action="{{ url('/caststore') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="name">Cast Name <span style="color:red;">*</span></label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter cast Name" >
                    
                    <span class="text-danger">
                        @error('name')
                            {{$message}}
                        @enderror
                    </span>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection

