<?php

namespace App\Http\Livewire\Admin;

use App\Models\ActivityLogs;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class LogsIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {


        $registros = ActivityLogs::where('user_id', 'LIKE', '%' . $this->search)
            ->orWhere('action', 'LIKE', '%' . $this->search . '%')
            ->orWhere('description', 'LIKE', '%' . $this->search . '%')
            ->latest('id')
            ->paginate(10);

        $users = User::all();

        return view('livewire.admin.logs-index', compact('registros', 'users'));
    }
}
