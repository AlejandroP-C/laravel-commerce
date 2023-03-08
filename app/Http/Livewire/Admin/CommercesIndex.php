<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

use App\Models\Commerce;

use Livewire\WithPagination;

class CommercesIndex extends Component
{

    use WithPagination;
    
    protected $paginationtheme = "bootstrap";

    public $search;

    public function updatingSearch()
    {
        $this->search;
    }

    public function render()
    {

        $commerces = Commerce::where('name', 'LIKE', '%' . $this->search . '%')
                            ->latest('id')
                            ->paginate();

        return view('livewire.admin.commerces-index', compact('commerces'));
    }
}
