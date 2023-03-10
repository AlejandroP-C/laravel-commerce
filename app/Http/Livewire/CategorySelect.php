<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class CategorySelect extends Component
{
    public function render()
    {

        $categories = Category::all();

        return view('livewire.category-select', compact('categories'));
    }
}
