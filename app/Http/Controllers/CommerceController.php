<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Commerce;
use Illuminate\Http\Request;

class CommerceController extends Controller
{

    public function index()
    {

        $commerces = Commerce::all();

        return view('commerces.index', compact('commerces'));
    }

    public function show(Commerce $commerce)
    {

        $products = $commerce->products()->get();

        return view('commerces.show', compact('commerce', 'products'));
    }

    public function category(Category $category)
    {

        $commerces = $category->commerces()->get();

        return view('commerces.category', compact('commerces', 'category'));
    }
}
