<?php

namespace Adamhut\ChuckNorrisJokes\Tests;

use Orchestra\Testbench\TestCase;
use Illuminate\Support\Facades\Artisan;
use Adamhut\ChuckNorrisJokes\Facades\ChuckNorris;
use Adamhut\ChuckNorrisJokes\ChuckNorrisJokesServiceProvider;

class LaravelTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            ChuckNorrisJokesServiceProvider::class,
        ];
    }

    protected function getPackageAliases($app)
    {
        return [
            'ChuckNorris' => Adamhut\ChuckNorrisJokes\Facades\ChuckNorris::class,
        ];
    }

    /** @test */
    public function the_console_command_returns_a_joke()
    {
        $this->withoutMockingConsoleOutput();

        ChuckNorris::shouldReceive('getRandomJoke')
            ->once()
            ->andReturn('Some Joke');

        $this->artisan('adamhut:chuck-norris');

        $output = Artisan::output();

        $this->assertSame('Some Joke'.PHP_EOL, $output);
    }

    /** @test */
    public function the_route_can_be_access()
    {
        ChuckNorris::shouldReceive('getRandomJoke')
            ->once()
            ->andReturn('Some Joke');

        $response = $this->get('/chuck-norris')
            ->assertViewIs('chuck-norris::joke')
            ->assertViewHas('joke', 'Some Joke')
            ->assertStatus(200);
    }
}
