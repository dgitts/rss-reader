<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Episode extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'audio_url',
        'episode_url',
        'podcast_id',
    ];

    public function podcast()
    {
        return $this->belongsTo(Podcast::class);
    }
}
