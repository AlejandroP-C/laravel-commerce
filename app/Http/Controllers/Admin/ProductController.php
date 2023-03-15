<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Http\Requests\ProductsRequest;
use App\Models\ActivityLogs;
use App\Models\Commerce;
use Illuminate\Support\Facades\Auth;
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

        $this->logActivity('Crear producto', 'Se creó un nuevo producto con el ID ' . $product->id);

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

        $product->original_price = (int)$request->price;

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

        $this->logActivity('Actualizar producto', 'Se actualizó un producto con el ID ' . $product->id);

        return redirect()->route('admin.products.edit', $product)->with('info', 'El producto se ha actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Products $product)
    {
        $allCommerces = Commerce::all();
        $commercesUser = Commerce::where('user_id', auth()->user()->id)->get();
        $val = 0;

        foreach ($allCommerces as $commerces) {
            if ($commerces->user_id != auth()->user()->id) {
                $productoExisteEnComercio = $commerces->products()->where('products_id', $product->id)->exists();
                if ($productoExisteEnComercio) {
                    $val++;
                }
            }
        }

        if ($val != 0) {
            foreach ($commercesUser as $commerce) {
                $commerce->products()->detach($product->id);
            }
        } else {
            $product->delete();
        }

        $this->logActivity('Eliminar producto', 'Se eliminó un producto con el ID ' . $product->id);

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

            $this->logActivity('Aplicar descuento', 'Se realizó un descuento de un producto con el ID ' . $product->id);


            return redirect()->back()->with('info', 'Descuento aplicado correctamente.');
        } else {
            $product->price = $product->original_price;
            $product->update($request->all());

            $this->logActivity('Retirar descuento', 'Se retiró el descuento del producto con el ID ' . $product->id);

            return redirect()->back()->with('info', 'Precio restaurado correctamente.');
        }
    }

    private function logActivity($action, $description)
    {
        // Crear un nuevo registro de actividad
        $activityLog = new ActivityLogs();
        $activityLog->user_id = Auth::user()->id; // Registrar el ID del usuario que realizó la acción
        $activityLog->action = $action;
        $activityLog->description = $description;
        $activityLog->save();
    }
}
