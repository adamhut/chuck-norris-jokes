<?php
namespace Adamhut\ChuckNorrisJokes\Http\Controllers;

use Adamhut\ChuckNorrisJokes\Facades\ChuckNorris;


class ChuckNorrisController {
    
    public function __invoke()
    {
        $joke =  ChuckNorris::getRandomJoke();
        
        return view('chuck-norris::joke',[
            'joke' => $joke
        ]);
    }

}