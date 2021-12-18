<?php

namespace App\Console\Commands;

use App\Http\Traits\PodcastParserTrait;
use Illuminate\Console\Command;

class ParsePodcasts extends Command
{
    use PodcastParserTrait;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parse:podcast {podcast}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parse podcast and save episodes';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $response = $this->parsePodcast($this->argument('podcast'));
        if ($response) {
            $this->info('Podcast parsed successfully!');
        } else {
            $this->error('Unable to parse podcast. Please check logs.');
        }
    }
}
