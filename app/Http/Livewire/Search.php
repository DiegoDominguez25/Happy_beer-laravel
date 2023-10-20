<?php

namespace App\Http\Livewire;
use App\Models\Licor;
use App\Models\Categoria;
use Livewire\Component;

class Search extends Component
{

    public $searchlicor="";

    public function render()
    {
        $licors = Licor::where('nombre','like','%'. $this->searchlicor.'%')->with('categoria:id,nombre')->orderBy('nombre')->paginate(15);
        return view('livewire.search',compact('licors'));
    }
}
