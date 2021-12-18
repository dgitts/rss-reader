<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PodcastFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->text,
            'artwork_url' => $this->faker->url(),
            'rss_feed_url' => $this->faker->url(),
            'description' => $this->faker->paragraph(),
            'language' => 'en',
            'website_url' => $this->faker->url(),
        ];
    }
}
