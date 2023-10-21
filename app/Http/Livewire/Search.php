<?php

namespace App\Http\Livewire;
use App\Models\Licor;
use App\Models\Categoria;
use Livewire\Component;
use Livewire\WithPagination;
class Search extends Component
{
    use withPagination;

    public $searchlicor="";
    public $categorias;
    public $categoriaFiltro;
    public $filtro;
    public $createdfiltro;

    public function mount()
    {
        $this->categorias = Categoria::all();
    }

    public function updatingSearchLicor()
    {
        $this->resetPage();
    }

    public function updatingCategoriaFiltro()
    {
        $this->resetPage();
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
        ->when($this->filtro, function ($query) {
            $query->orderBy( 'nombre', $this->filtro);
        })
        ->with('categoria:id,nombre')
        ->paginate(15);
        return view('livewire.search',compact('licors'));
    }
}
