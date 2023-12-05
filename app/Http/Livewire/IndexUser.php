<?php

namespace App\Http\Livewire;

use App\Models\Licor;
use App\Models\Categoria;
use Livewire\Component;
use Livewire\WithPagination;

class IndexUser extends Component
{
    public $searchlicor="";

    use withPagination;

    public function updatingSearchLicor()
    {
        $this->resetPage();
    }

    public function render()
    {
        $licors = Licor::query()
        ->when($this->searchlicor, function ($query) {
            $query->where('nombre','like', '%'. $this->searchlicor.'%');
        })
        ->with('categoria:id,nombre')
        ->with('archivo')
        ->orderBy('nombre')
        ->paginate(16);
        return view('livewire.index-user', compact('licors'));
    }
}
