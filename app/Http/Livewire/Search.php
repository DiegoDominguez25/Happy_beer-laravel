<?php

namespace App\Http\Livewire;
use App\Models\Licor;
use App\Models\Categoria;
use Livewire\Component;

class Search extends Component
{

    public $searchlicor="";
    public $categorias;
    public $categoriaFiltro;

    public function mount()
    {
        $this->categorias = Categoria::all();
    }

    public function render()
    {
        $licors = Licor::query()
            ->when($this->categoriaFiltro, function ($query) {
            $query->where('categoria_id', $this->categoriaFiltro);
        })
        ->when($this->searchlicor, function ($query) {
            $query->where('nombre','like', '%'. $this->searchlicor .'%');
        })
        ->with('categoria:id,nombre')
        ->orderBy('nombre')
        ->paginate(15);
        return view('livewire.search',compact('licors'));
    }
}
