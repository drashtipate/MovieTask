
@extends('layouts.app')
@section('title', 'Dashboard|Movie')
@section('content')
<div class="px-4 mt-4">
    <h3 class="mt-4">Edit Movie</h3>
    <form class="mt-4" action="{{ url('/movies/update/'.$movie->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6">
                <!-- Movie Name -->
                <div class="form-group">
                    <label for="name">Movie Name <span style="color:red;">*</span></label>
                       <input type="text" class="form-control" id="name" name="name" value="{{ $movie->m_title }}">
                    
                </div>
                <!-- Country Name -->
                <div class="form-group">
                    <label for="country">Country <span style="color:red;">*</span></label>
                    <input type="text" class="form-control" id="country" name="country"  value="{{ $movie->country }}">
                   
                </div>
                 <!-- Watch URL -->
                <div class="form-group">
                    <label for="watch_url">Watch URL <span style="color:red;">*</span></label>
                    <input type="url" class="form-control" id="watch_url" name="watch_url" value="{{ $movie->watch_url }}" >
                   
                </div>
                 <!-- Genres -->
                <div class="form-group">
                    <label for="genres">Genres <span style="color:red;">*</span></label>
                    <!-- <input type="text" class="form-control" id="genres" name="genres" placeholder="Enter Genres" > -->
                    <select id="genres-dropdown" name="genres[]" class="form-control">
                        <option value="">-- Select Genres --</option>
                            @foreach($genres as $genre)
                                <!-- <option value="{{ $genre->id }}" @if(in_array($genre->id, $movieGenres)) selected @endif>{{ $genre->name }}</option> -->
                                <option value="{{ $genre->id }}" @if($movie->genres->contains($genre->id)) selected @endif>{{ $genre->name }}</option>
                            @endforeach
                    </select>
                    
                </div>
                <!-- <div class="form-group">
                    <label for="poster">Movie Poster <span style="color:red;">*</span></label>
                    <input type="file" class="form-control-file" id="poster" name="poster" accept="image/jpeg,image/png" >
                    <small class="form-text text-muted">Please upload file in these formats only (jpg, png, jpeg).</small>
                    
                </div> -->

                <!-- Current Poster -->
                <div class="form-group">
                    <label for="poster">Current Movie Poster</label><br>
                    <img src="{{ asset('posters/'.$movie->m_poster) }}" alt="Current Poster" style="max-width: 100px;">
                </div>
                <!-- New Poster -->
                <div class="form-group">
                    <label for="poster">Update Movie Poster <span style="color:red;">*</span></label>
                    <input type="file" class="form-control-file" id="poster" name="poster" accept="image/jpeg,image/png">
                    <small class="form-text text-muted">Please upload file in these formats only (jpg, png, jpeg).</small>
                </div>

                <!-- production -->
                <div class="form-group">
                    <label for="production">Production <span style="color:red;">*</span></label>
                    <input type="text" class="form-control" id="production" name="production" value="{{ $movie->Production }}" >
                    
                </div>
                <!-- description -->
                <div class="form-group">
                    <label for="description">Movie Short Description <span style="color:red;">*</span></label>
                    <textarea class="form-control" id="description" name="description" rows="2" >{{ $movie->m_short_desc}}</textarea>
                    
                </div>
            </div>
            <div class="col-md-6">
                <!-- duration -->
                <div class="form-group">
                    <label for="duration">Duration <span style="color:red;">*</span></label>
                    <input type="text" class="form-control" id="duration" name="duration" value="{{ $movie->Duration}}" >
                    
                </div>
                <!-- watch button -->
                <div class="form-group">
                    <label for="watch_button_title">Watch Button Title <span style="color:red;">*</span></label>
                    <input type="text" class="form-control" id="watch_button_title" name="watch_button_title"  value="{{ $movie->watch_btn_title}}">
                    
                </div>
                <!-- trailer url -->
                <div class="form-group">
                    <label for="trailer_url">Trailer URL</label>
                    <input type="url" class="form-control" id="trailer_url" name="trailer_url" value="{{ $movie->m_trailer_link}}">
                    
                </div>
                <!-- cast -->
                <div class="form-group">
                    <label for="cast">Cast <span style="color:red;">*</span></label>
                    <select id="cast-dropdown" name="casts[]" class="form-control">
                        <option value="">-- Select Cast --</option>
                        @foreach($casts as $cast)
                            <option value="{{ $cast->id }}" @if(in_array($cast->id, $movieCasts)) selected @endif>{{ $cast->name }}</option>
                        @endforeach
                    </select>
                </div>
                <!-- Current Video Poster -->
                <div class="form-group">
                    <label for="video_poster">Current Movie Video Poster</label><br>
                    <img src="{{ asset('video_posters/'.$movie->m_video_poster) }}" alt="Current Video Poster" style="max-width: 100px;">
                </div>
                <!-- New Video Poster -->
                <div class="form-group">
                    <label for="video_poster">Update Movie Video Poster <span style="color:red;">*</span></label>
                    <input type="file" class="form-control-file" id="video_poster" name="video_poster" accept="image/jpeg,image/png">
                    <small class="form-text text-muted">Please upload file in these formats only (jpg, png, jpeg).</small>
                    
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ url('/movie/view') }}" class="submit-back mx-2 mb-1">Back</a>
    </form>
</div>
@endsection

