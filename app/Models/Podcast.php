<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Podcast extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'artwork_url',
        'rss_feed_url',
        'description',
        'language',
        'website_url',
    ];

    public function episodes()
    {
        return $this->hasMany(Episode::class);
    }

    public function latestEpisode()
    {
        return $this->hasOne(Episode::class)->latestOfMany();
    }
}
