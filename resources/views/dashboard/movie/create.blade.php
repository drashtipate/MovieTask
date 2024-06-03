
@extends('layouts.app')
@section('title', 'Dashboard|Movie')
@section('content')
<div class="px-4 mt-4">
    <h3 class="mt-4">Add Movie</h3>
    <form class="mt-4" action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Movie Name <span style="color:red;">*</span></label>
                       <input type="text" class="form-control" id="name" name="name" placeholder="Enter Movie Name" value="{{ old('name') }}">
                    <span class="text-danger">
                        @error('name')
                            {{$message}}
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label for="country">Country <span style="color:red;">*</span></label>
                    <input type="text" class="form-control" id="country" name="country" placeholder="Enter Country" value="{{ old('country') }}">
                    <span class="text-danger">
                        @error('country')
                            {{$message}}
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label for="watch_url">Watch URL <span style="color:red;">*</span></label>
                    <input type="url" class="form-control" id="watch_url" name="watch_url" placeholder="Enter Movie Watch URL" >
                    <span class="text-danger">
                        @error('watch_url')
                            {{$message}}
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label for="genres">Genres <span style="color:red;">*</span></label>
                    <!-- <input type="text" class="form-control" id="genres" name="genres" placeholder="Enter Genres" > -->
                    <select id="genres-dropdown" name="genres[]" class="form-control">
                        <option value="">-- Select Genres --</option>
                            @foreach($genres as $genre)
                                <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                            @endforeach
                    </select>
                    
                    <span class="text-danger">
                        @error('genres')
                            {{$message}}
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label for="poster">Movie Poster <span style="color:red;">*</span></label>
                    <input type="file" class="form-control-file" id="poster" name="poster" accept="image/jpeg,image/png" >
                    <small class="form-text text-muted">Please upload file in these formats only (jpg, png, jpeg).</small>
                    <span class="text-danger">
                        @error('poster')
                            {{$message}}
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label for="production">Production <span style="color:red;">*</span></label>
                    <input type="text" class="form-control" id="production" name="production" placeholder="Enter Movie Production" >
                    <span class="text-danger">
                        @error('production')
                            {{$message}}
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label for="description">Movie Short Description <span style="color:red;">*</span></label>
                    <textarea class="form-control" id="description" name="description" placeholder="Enter Movie Short Description" rows="2" ></textarea>
                    <span class="text-danger">
                        @error('description')
                            {{$message}}
                        @enderror
                    </span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="duration">Duration <span style="color:red;">*</span></label>
                    <input type="text" class="form-control" id="duration" name="duration" placeholder="Enter Movie Duration" >
                    <span class="text-danger">
                        @error('duration')
                            {{$message}}
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label for="watch_button_title">Watch Button Title <span style="color:red;">*</span></label>
                    <input type="text" class="form-control" id="watch_button_title" name="watch_button_title" placeholder="Enter Movie Play Button Title" value="{{ old('watch_button_title') }}">
                    <span class="text-danger">
                        @error('watch_button_title')
                            {{$message}}
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label for="trailer_url">Trailer URL</label>
                    <input type="url" class="form-control" id="trailer_url" name="trailer_url" placeholder="Enter Movie Trailer Link">
                    <span class="text-danger">
                        @error('trailer_url')
                            {{$message}}
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label for="cast">Cast <span style="color:red;">*</span></label>
                    <!-- <input type="text" class="form-control" id="cast" name="cast" placeholder="Enter Cast" > -->
                    <select id="cast-dropdown" name="casts[]" class="form-control">
                        <option value="">-- Select Cast --</option>
                            @foreach($casts as $cast)
                                <option value="{{ $cast->id }}">{{ $cast->name }}</option>
                            @endforeach
                    </select>
                    <span class="text-danger">
                        @error('casts')
                            {{$message}}
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label for="video_poster">Movie Video Poster <span style="color:red;">*</span></label>
                    <input type="file" class="form-control-file" id="video_poster" name="video_poster" accept="image/jpeg,image/png" >
                    <span class="text-danger">
                        @error('video_poster')
                            {{$message}}
                        @enderror
                    </span>
                    <small class="form-text text-muted">Please upload file in these formats only (jpg, png, jpeg).</small>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection

