<?php

namespace App\Http\Livewire\Admin;

use App\Models\Products;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class ProductsGeneral extends Component
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


        $products = Products::where('total_votes', ">=", 0)
            ->where('title', 'LIKE', '%' . $this->search . '%')
            ->latest('total_votes')
            ->paginate(10);


        return view('livewire.admin.products-general', compact('products'));
    }
}
