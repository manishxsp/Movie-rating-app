<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\Http;

use Livewire\Component;

class SearchDropdown extends Component
{
	public $search ='';
    public function render()
    {

    	 $searchResults =[];

    	 if(strlen($this->search) > 2) 
    	 {
		 $searchResults = Http::get('https://api.themoviedb.org/3/search/movie?query='.$this->search.'&api_key=21f96a90f18b6406e17cc5aa2e176c72&language=en-US&page=1')
        ->json()['results'];
    	 }

        //dump($searchResults);

        return view('livewire.search-dropdown',[
        	'searchResults' => collect($searchResults)->take(7),
        ]);
    }
}
