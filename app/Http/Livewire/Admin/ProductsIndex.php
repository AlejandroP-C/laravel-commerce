<?php

namespace App\Http\Livewire\Admin;

use App\Models\Commerce;
use App\Models\Products;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class ProductsIndex extends Component
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


        //Relacion tabla muchos a muchos
        /** $products = DB::table('commerces')
            ->join('commerce_products', 'commerce_products.commerce_id', '=', 'commerces.id')
            ->join('products', 'commerce_products.products_id', '=', 'products.id')
            ->select('products.*')
            ->get();
         */
        $commerces = Commerce::where('user_id', auth()->user()->id)
            ->where('name', 'LIKE', '%' . $this->search . '%')
            ->paginate(1);

        return view('livewire.admin.products-index', compact('commerces'));
    }
}
