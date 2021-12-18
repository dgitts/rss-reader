<?php

namespace App\Http\Traits;

use App\Models\Episode;
use App\Models\Podcast;
use Illuminate\Support\Facades\Log;

trait PodcastParserTrait {
    /**
     * Parse podcast feed
     * @param $podcastFeed
     * @return bool
     */
    public function parsePodcast($podcastFeed) {
        $feed = \FeedReader::read($podcastFeed);

        // Check for unavailable podcasts
        $unavailablePodcastStrings = ['podcast deleted', '404', 'cURL error'];
        if (! stripos_arr($feed->get_title(), $unavailablePodcastStrings) &&
            ! stripos_arr($feed->error, $unavailablePodcastStrings)) {
            // Save/update Podcast
            $podcast = Podcast::updateOrCreate(
                ['title' => $feed->get_title(), 'website_url' => $feed->get_permalink(),],
                [
                    'artwork_url' => $feed->get_image_url(),
                    'rss_feed_url' => $feed->subscribe_feed(),
                    'description' => $feed->get_description(),
                    'language' => $feed->get_language(),
                ]
            );

            // Save/update Podcast Episodes
            foreach ($feed->get_items() as $item) {
                $episode = Episode::updateOrCreate(
                    ['title' => $item->get_title(), 'episode_url' => $item->get_permalink(),],
                    [
                        'description' => $item->get_description(),
                        'audio_url' => $item->get_enclosure()->get_link(),
                        'podcast_id' => $podcast->id,
                    ]
                );
            }
            return true;
        }
        Log::error('Unable to parse podcast feed', ['feed_error' => $feed->error, 'feed_url' => $podcastFeed]);
        return false;
    }
}
