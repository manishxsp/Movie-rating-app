<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\ViewModels\MoviesViewModel;


class MoviesController extends Controller
{ 
    
    public function index()
    {
        $popularMovies = Http::get('https://api.themoviedb.org/3/movie/popular?api_key=21f96a90f18b6406e17cc5aa2e176c72&language=en-US&page=1')
        ->json()['results'];


        $genresArray = Http::get('https://api.themoviedb.org/3/genre/movie/list?api_key=21f96a90f18b6406e17cc5aa2e176c72&language=en-US&page=1')
        ->json()['genres'];

        $genres= collect($genresArray)->mapWithKeys(function ($genre){
            return [$genre['id'] => $genre['name']];
        });

         $nowPlayingMovies = Http::get('https://api.themoviedb.org/3/movie/now_playing?api_key=21f96a90f18b6406e17cc5aa2e176c72&language=en-US&page=1')
        ->json()['results'];

      return view('movies.index',[
            'popularMovies'=>$popularMovies,
            'genres' => $genres,
            'nowPlayingMovies' => $nowPlayingMovies,
        ]); 
        //dump($popularMovies);

        /*  $viewModel = new MoviesViewModel(
            $popularMovies,
            $nowPlayingMovies,
            $genres,
             );

        return view('movies.index',$viewModel);*/

    }


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }




    public function show($id)
    {
        $movies = Http::get('https://api.themoviedb.org/3/movie/'.$id.'?append_to_response=credits,images,videos&api_key=21f96a90f18b6406e17cc5aa2e176c72&language=en-US&')
        ->json();

     // dump($movies);
       
       return view('movies.show',[
            'movies'=> $movies, 
            ]);     
        
    }

    /**
     *  
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
