<?php

namespace Adamhut\ChuckNorrisJokes\Tests;

use PHPUnit\Framework\TestCase;
use Adamhut\ChuckNorrisJokes\JokeFactory;

class JokeFactoryTest extends TestCase
{
    /** @test */
    public function it_returns_a_random_joke()
    {
        $jokes = new JokeFactory([
            'This is a joke',
        ]);

        $joke = $jokes->getRandomJoke();

        $this->assertSame('This is a joke', $joke);
    }

    /** @test */
    public function it_returns_a_predefined_joke()
    {
        $predefinedJokes = [
            'Chuck Norris counted to infinity... Twice',
            'Chuck Norris\' tears cure cancer. Too bad he has never cried.',
            'Chuck Norris does not wear a condom. Because there is no such thing as protection from Chuck Norris.',
            'If you can see Chuck Norris, he can see you. If you can\'t see Chuck Norris you may be only seconds away from death',
        ];

        $jokes = new JokeFactory();

        $joke = $jokes->getRandomJoke();
        $this->assertContains($joke, $predefinedJokes);
    }
}
