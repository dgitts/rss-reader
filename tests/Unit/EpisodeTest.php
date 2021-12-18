<?php

namespace Tests\Unit;

use App\Models\Episode;
use App\Models\Podcast;
use PHPUnit\Framework\TestCase;

class EpisodeTest extends TestCase
{
    /** @test */
    public function test_podcast_relationship()
    {
        $episode = Episode::factory()->has(Podcast::factory())->create();
        $this->assertTrue($episode->podcast);
    }
}
