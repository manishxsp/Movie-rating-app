<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class TvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $popularTv = Http::get('https://api.themoviedb.org/3/tv/popular?api_key=21f96a90f18b6406e17cc5aa2e176c72&language=en-US')
        ->json()['results'];

         $topRatedTv = Http::get('https://api.themoviedb.org/3/tv/top_rated?api_key=21f96a90f18b6406e17cc5aa2e176c72&language=en-US')
        ->json()['results'];


        $genresArray = Http::get('https://api.themoviedb.org/3/genre/tv/list?api_key=21f96a90f18b6406e17cc5aa2e176c72&language=en-US&page=1')
        ->json()['genres'];

        $genres= collect($genresArray)->mapWithKeys(function ($genre){
            return [$genre['id'] => $genre['name']];
        });


        dump('popularTv');



       return view('tv.index',[
            'popularTv'=>$popularTv,
            'genres' => $genres,
            'topRatedTv' => $topRatedTv,
        ]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
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
