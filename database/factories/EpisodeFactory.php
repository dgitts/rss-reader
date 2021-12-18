<?php

namespace Database\Factories;

use App\Models\Podcast;
use Illuminate\Database\Eloquent\Factories\Factory;

class EpisodeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->text(),
            'description' => $this->faker->paragraph(),
            'audio_url' => $this->faker->url(),
            'episode_url' => $this->faker->url(),
            'podcast_id' => function () {
                return Podcast::factory()->create()->id;
            },
        ];
    }
}
