<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function detail(Products $product)
    {
        return view('products.detail', compact('product'));
    }

}
