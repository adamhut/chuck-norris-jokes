<?php

namespace Adamhut\ChuckNorrisJokes\Console;

use Illuminate\Console\Command;
use Adamhut\ChuckNorrisJokes\Facades\ChuckNorris;

class ChuckNorrisJoke extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'adamhut:chuck-norris ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Output a Chuck Norris Joke.';

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
     * @return mixed
     */
    public function handle()
    {
        $joke = ChuckNorris::getRandomJoke();
        $this->info($joke);
    }
}
