<?php 
namespace Adamhut\ChuckNorrisJokes;


class JokeFactory{

    protected $jokes = [
        'Chuck Norris counted to infinity... Twice',
        'Chuck Norris\' tears cure cancer. Too bad he has never cried.',
        'Chuck Norris does not wear a condom. Because there is no such thing as protection from Chuck Norris.',
        'If you can see Chuck Norris, he can see you. If you can\'t see Chuck Norris you may be only seconds away from death'
    ];

    public function __construct(array $jokes = null)
    {
        if($jokes)
        {
            $this->jokes = $jokes;
        }
    }

    public function getRandomJoke()
    {
        return $this->jokes[array_rand($this->jokes)];
    }

}