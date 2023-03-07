<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Commerce;
use App\Models\Products;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index(){
        $categories = Category::all();
        $products = Products::whereRaw('votes_valoration/total_votes >= ?', [3])
        ->oldest('price')
        ->paginate(4);
        $commerces = Commerce::where('status', 2)
        ->paginate(6);

        return view('welcome', compact('categories', 'products', 'commerces'));
    }
}
