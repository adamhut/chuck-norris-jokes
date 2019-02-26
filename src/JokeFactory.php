<?php

namespace Adamhut\ChuckNorrisJokes;

use GuzzleHttp\Client;

class JokeFactory
{
    // protected $jokes = [
    //     'Chuck Norris counted to infinity... Twice',
    //     'Chuck Norris\' tears cure cancer. Too bad he has never cried.',
    //     'Chuck Norris does not wear a condom. Because there is no such thing as protection from Chuck Norris.',
    //     'If you can see Chuck Norris, he can see you. If you can\'t see Chuck Norris you may be only seconds away from death',
    // ];
    const  API_ENDPOINT = 'http://api.icndb.com/jokes/random';

    protected $client;

    public function __construct(Client $client = null)
    {
        $this->client = $client ?? new Client();
    }

    public function getRandomJoke()
    {
        $response = $this->client->request('GET', self::API_ENDPOINT);

        $t = $response->getBody()->getContents();

        $joke = json_decode($t);

        return $joke->value->joke;
        //var_dump( $response->getBody());
    }

    public function getRandomJokes($amount = 1)
    {
        $jokes = [];
        foreach (range(0, $amount) as $i) {
            $jokes[] = $this->getRandomJoke();
        }

        return $jokes;
    }
}
