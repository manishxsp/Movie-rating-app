@extends('layouts.main')

@section('content')

    <div class="container mx-auto px-4 py-16">
       
        <div class="popular-actors">
            <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Popular actors</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
            @foreach ($popularActors as $actors)
            <div class="actor mt-8 md-8">
                <a href="#">
                    <img src="{{ 'https://image.tmdb.org/t/p/w235_and_h235_face'.$actors['profile_path'] }}"
                    alt="profile_image" class="hover:opacity-75 transition ease-in-out duration-150">
                </a>
                <div class="mt-2">
                    <a href="#" class="text-lg hover:text-gray-300">{{ $actors['name'] }}</a>
                    <div class="text-sm truncate text-gray-400">{{ collect($actors['known_for'])->where('media_type','movie')->pluck('title')->union(collect($actors['known_for'])->where('media_type','movie')->pluck('title'))->implode(',') }}</div>
                    
                </div>
            </div>
            @endforeach
        </div>
        <div class="flex justify-between mt-16">
            <a href="#">Previous</a>
            <a href="#">Next</a>
            
        </div>

        </div> 

@endsection

