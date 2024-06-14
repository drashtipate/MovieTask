<?php

namespace App\Http\Controllers\Auth;


use Log;
use App\Models\Cast;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    //
    public function createmovie(Request $request)
    {
        $genres = Genre::all();
        $casts = Cast::all();
        return view('dashboard.movie.create', compact('genres', 'casts'));
    }

    public function store(Request $request)
    {
        // Log::info('Store Method Called');
        // \Log::info($request->all()); // Log all request data
        
         $request->validate([
            'name' => 'required|string|max:255',
            'duration' => 'required|string',
            'country' => 'required|string|max:255',
            'watch_button_title' => 'required|string|max:255',
            'watch_url' => 'required|url',
            'trailer_url' => 'required|url',
            'genres' => 'required|array',
            'genres.*' => 'exists:genres,id',
            'casts' => 'required|array',
            'casts.*' => 'exists:casts,id',
            'poster' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'video_poster' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            // 'video_poster' => 'required|image|mimes:jpeg,png,jpg,mp4,mov,ogg|max:20480',
            'production' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
        ]);

        // \Log::info('Validation Passed');
        // \Log::info($validatedData); // Log validated data

        $movie = new Movie();
        $movie->m_title = $request->name;
        $movie->Duration = $request->duration;
        $movie->country = $request->country;
        $movie->watch_btn_title = $request->watch_button_title;
        $movie->watch_url = $request->watch_url;
        $movie->m_trailer_link = $request->trailer_url;
        $movie->Production = $request->production;
        $movie->m_short_desc = $request->description;

        if ($request->hasFile('poster')) {
            $posterName = time() . '.' . $request->poster->extension();
            $request->poster->move(public_path('posters'), $posterName);
            $movie->m_poster = $posterName;
        }

        if ($request->hasFile('video_poster')) {
            $videoposterName = time() . '.' . $request->video_poster->extension();
            $request->video_poster->move(public_path('video_posters'), $videoposterName);
            $movie->m_video_poster = $videoposterName;
        }

        $movie->save();

        // Sync genres
        // $movie->genres()->sync($validatedData['genres']);
        // $movie->casts()->sync($validatedData['cast']);
        $movie->casts()->attach($request->casts);
        $movie->genres()->attach($request->genres);

        return redirect('/movie/view')->with('success', 'Movie created successfully.');
    }

    public function moviesview()
    {
        // $movies = Movie::all()->map(function($movie) {
        //     $movie->formatted_duration = $this->formatDuration($movie->duration);
        //     return $movie;
        // });
        $movies = Movie::all();
        $genres = Genre::all();
        $casts = Cast::all();
        return view('dashboard.movie.viewmovie', compact('movies','genres','casts'));
    }

    // private function formatDuration($duration)
    // {
    //     $hours = floor($duration / 60);
    //     $minutes = $duration % 60;
    //     return "{$hours}h {$minutes}min";
    // }

    public function movieedit($id)
    {
        $movie = Movie::find($id);
        $genres = Genre::all(); // Assuming you have a Genre model to fetch genres
        $casts = Cast::all(); // Assuming you have a Cast model to fetch casts
        $movieGenres = $movie->genres->pluck('id')->toArray(); // Assuming your Movie model has a genres relationship
        $movieCasts = $movie->casts->pluck('id')->toArray(); // Assuming your Movie model has a casts relationship
        return view('dashboard.movie.editmovie',compact('movie','genres','casts','movieGenres','movieCasts'));
    }

    public function movieupdate(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'watch_url' => 'required|url',
            'genres' => 'required|array',
            'genres.*' => 'exists:genres,id',
            'poster' => 'image|mimes:jpeg,png,jpg|max:2048',
            'production' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'duration' => 'required|string',
            'watch_button_title' => 'required|string|max:255',
            'trailer_url' => 'url',
            'casts' => 'required|array',
            'casts.*' => 'exists:casts,id',
            'video_poster' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Update the movie details
        $movie = Movie::findOrFail($id);
        $movie->m_title = $request->name;
        $movie->Duration = $request->duration;
        $movie->country = $request->country;
        $movie->watch_btn_title = $request->watch_button_title;
        $movie->watch_url = $request->watch_url;
        $movie->m_trailer_link = $request->trailer_url;
        $movie->Production = $request->production;
        $movie->m_short_desc = $request->description;

        // Handle file uploads (poster and video poster)
        if ($request->hasFile('poster')) {
            $posterName = time() . '.' . $request->poster->extension();
            $request->poster->move(public_path('posters'), $posterName);
            $movie->m_poster = $posterName;
        }

        if ($request->hasFile('video_poster')) {
            $videoPosterName = time() . '.' . $request->video_poster->extension();
            $request->video_poster->move(public_path('video_posters'), $videoPosterName);
            $movie->m_video_poster = $videoPosterName;
        }

        // Save the movie
        $movie->save();

        // Sync genres and casts
        $movie->genres()->sync($request->genres);
        $movie->casts()->sync($request->casts);

        // Redirect back with success message
        return redirect('/movie/view')->with('success', 'Movie updated successfully.');
    }

    public function moviedelete($id)
    {
        $movies = Movie::find($id);
        $movies->delete();
        return redirect('/movie/view')->with("success", "Movie deleted successfully!");
    }


    public function genres()
    {
        return view('dashboard.movie.genres');
    }

    public function genresstore(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $genres = new Genre();
        $genres->name = $request->name;
        $genres->save();
        return redirect('/genres')->with('success', 'Genres created successfully.');

    }

    public function genresview()
    {
        $genres = Genre::all();
        return view('dashboard.movie.viewgenres', compact('genres'));
    }

    public function genresedit($id)
    {
        $genres = Genre::find($id);
        return view('dashboard.movie.editgenres',compact('genres'));
    }

    public function genresupdate(Request $request, $id)
    {
        $genres = Genre::find($id);
        $genres->name = $request->name;
        $genres->update();
            
        return redirect('/genres/view')->with("success", "Movie Genres Update successfully !");
    
    }

    public function genresdelete($id)
    {
        $genres = Genre::find($id);
        $genres->delete();
        return redirect('/genres/view')->with("success", "Movie genres deleted successfully!");
    }

    public function cast()
    {
        return view('dashboard.movie.cast');
    }

    public function caststore(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $cast = new Cast();
        $cast->name = $request->name;
        $cast->save();
        return redirect('/cast')->with('success', 'Cast created successfully.');

    }

    public function castview()
    {
        $casts = Cast::all();
        return view('dashboard.movie.viewcast', compact('casts'));
    }

    public function castedit($id)
    {
        $casts = Cast::find($id);
        return view('dashboard.movie.editcast',compact('casts'));
    }

    public function castupdate(Request $request, $id)
    {
        $casts = Cast::find($id);
        $casts->name = $request->name;
        $casts->update();
            
        return redirect('/cast/view')->with("success", "Movie Cast Update successfully !");
    
    }

    public function castdelete($id)
    {
        $casts = Cast::find($id);
        $casts->delete();
        return redirect('/cast/view')->with("success", "Movie Casts deleted successfully!");
    }

    
}
