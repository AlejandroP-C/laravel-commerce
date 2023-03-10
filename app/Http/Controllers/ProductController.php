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

    public function update(Request $request, Products $product)
    {

        $product->update($request->all());

        $product->update(['votes_valoration' => $product->votes_valoration + $request->input('rating')]);
        $product->update(['total_votes' => $product->total_votes + 1]);

        return redirect()->route('products.detail', $product);

    }

}
