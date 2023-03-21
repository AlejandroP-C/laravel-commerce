<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

use App\Models\Commerce;
use App\Models\User;
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
        $commerces2 = Commerce::where('user_id', auth()->user()->id)
            ->where('name', 'LIKE', '%' . $this->search . '%')
            ->latest('id')
            ->paginate();
        $users = User::all();
        return view('livewire.admin.commerces-index', compact('commerces', 'commerces2', 'users'));
    }
}
