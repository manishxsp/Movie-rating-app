<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;

class MoviesViewModel extends ViewModel
{

	public $popularMovies;
	public $genres;
	public $nowPlayingMovies;

    public function _construct($popularMovies,$genres,$nowPlayingMovies)
    {
        $this->popularMovies = $popularMovies;
        $this->genres = $genres;
        $this->$nowPlayingMovies = $nowPlayingMovies;
    }

    public function popularMovies()
    {
    	return collect($this->popularMovies)->dump();
    }

    public function genres()
    {
    	return $this->genres;
    }

    public function nowPlayingMovies()
    {
    	return $this->nowPlayingMovies;
    } 
}
