
@extends('layouts.app')
@section('title', 'Dashboard|Movie')
@section('content')
<div class="px-4 mt-4">
    <h3 class="mt-4">Genres</h3>
    <form class="mt-4" action="{{ url('/genresstore') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="name">Genres Name <span style="color:red;">*</span></label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Genres Name" >
                    
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

