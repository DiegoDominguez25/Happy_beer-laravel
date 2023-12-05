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
    public $sortField;
    public $sortAsc = true;

    protected $listeners = ['delete'];

    protected $queryString = ['searchlicor','categoriaFiltro','sortField'];

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

    public function sortBy($field)
    {
        if($this->sortField == $field){
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }
        $this->sortField = $field;
    }

    public function delete(Licor $licor)
    {
        $licor -> delete();
    }

    public function render()
    {
        $successMessage = session('success');

        $licors = Licor::query()
        ->when($this->categoriaFiltro, function ($query) {
            $query->where('categoria_id', $this->categoriaFiltro);
        })
        ->when($this->searchlicor, function ($query) {
            $query->where('nombre','like', '%'. $this->searchlicor .'%');
        })
        ->when($this->sortField, function ($query) {
            $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
        })
        ->with('categoria:id,nombre')
        ->paginate(15);
        return view('livewire.search',compact('licors'), ['successMessage' => $successMessage]);
    }
}
