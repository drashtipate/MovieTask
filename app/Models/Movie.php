<?php

namespace App\Models;

use App\Models\Cast;
use App\Models\Genre;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Movie extends Model
{
    use HasFactory;


    protected $fillable = [
        'm_title', 'm_short_desc', 'Production', 'country', 'Duration', 
        'm_poster', 'm_video_poster', 'watch_url', 'm_trailer_link', 
        'watch_btn_title', 'is_active'
    ];

    public function casts()
    {
        return $this->belongsToMany(Cast::class, 'movie_casts');
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'movie_genres');
    }

    // Accessor to format duration
    // public function getFormattedDurationAttribute()
    // {
    //     $hours = floor($this->Duration / 60);
    //     $minutes = $this->Duration % 60;
    //     return "{$hours}h {$minutes}min";
    // }
    
}
