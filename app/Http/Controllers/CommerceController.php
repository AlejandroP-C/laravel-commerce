<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CommerceController extends Controller
{
    public function category(Category $category)
    {

        $commerces = $category->commerces()->get();

        return view('welcome', compact('commerces', 'category'));
    }
}
