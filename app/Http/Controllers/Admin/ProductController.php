<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Http\Requests\ProductsRequest;
use App\Models\Commerce;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.products.index');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $commerces = Commerce::where('user_id', auth()->user()->id)->get();

        return view('admin.products.create', compact('categories', 'commerces'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductsRequest $request, Commerce $com)
    {
        (int)$request->price;
        
        $product = Products::create($request->all());
        $product->original_price = $product->price;
        $product->update($request->all());

        if ($request->file('file')) {
            $url =  Storage::put('public/images', $request->file('file'));

            $product->images()->create([
                'url' => $url
            ]);
        }



        if ($request->categories) {
            $product->categories()->sync($request->categories);
            $product->commerces()->sync($request->commerces);
        }


        return redirect()->route('admin.products.edit', $product)->with('info', 'El producto se agregó con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Products $product)
    {
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Products $product)
    {
        $categories = Category::all();
        $commerces = Commerce::where('user_id', auth()->user()->id)->get();


        return view('admin.products.edit', compact('product', 'categories', 'commerces'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductsRequest $request, Products $product)
    {
        (int)$request->price;


        $product->original_price = $product->price;

        $product->update($request->all());


        $url =  Storage::put('public/images', $request->file('file'));

        if ($product->image) {
            Storage::delete($product->image->url);

            $product->image->update([
                'url' => $url
            ]);
        } else {
            $product->images()->create([
                'url' => $url
            ]);
        }

        if ($request->categories && $request->commerces) {
            $product->categories()->sync($request->categories);
            $product->commerces()->sync($request->commerces);
        }

        return redirect()->route('admin.products.edit', $product)->with('info', 'El producto se ha actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Products $product)
    {
        $product->delete();

        return redirect()->route('admin.products.index')->with('info', 'Producto eliminado correctamente.');
    }

    public function aplicarDescuento(Request $request)
    {
        $product = Products::find($request->id);

        if ($request->descuento != 0) {

            $descuento = $request->descuento;
            $precio_descuento = $product->price - ($product->price * $descuento);
            $product->price = $precio_descuento;
            $product->update($request->all());
            return redirect()->back()->with('info', 'Descuento aplicado correctamente.');
        } else {
            $product->price = $product->original_price;
            $product->update($request->all());
            return redirect()->back()->with('info', 'Precio restaurado correctamente.');
        }
    }
}
