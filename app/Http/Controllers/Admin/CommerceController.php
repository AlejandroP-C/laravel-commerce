<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Commerce;
use App\Http\Requests\CommerceRequest;
use Illuminate\Support\Facades\Storage;

class CommerceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.commerces.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $categories = Category::all();

        return view('admin.commerces.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommerceRequest $request)
    {

        $commerce = Commerce::create($request->all());


        $url =  Storage::put('public/images', $request->file('file'));

        $commerce->image()->create([
            'url' => $url
        ]);

        if ($request->categories) {
            $commerce->categories()->sync($request->categories);;
        }

        return redirect()->route('admin.commerces.edit', $commerce);
    }

    /**
     * Display the specified resource.
     */
    public function show(Commerce $commerce)
    {
        return view('admin.commerces.show', compact('commerce'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Commerce $commerce)
    {
        $categories = Category::all();

        return view('admin.commerces.edit', compact('commerce', 'categories'))->with('info', 'El comercio se creó con éxito');;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CommerceRequest $request, Commerce $commerce)
    {
        $commerce->update($request->all());


        $url =  Storage::put('public/images', $request->file('file'));

        if ($commerce->image) {
            Storage::delete($commerce->image->url);

            $commerce->image->update([
                'url' => $url
            ]);
        } else {
            $commerce->image()->create([
                'url' => $url
            ]);
        }

        if ($request->categories) {
            $commerce->categories()->sync($request->categories);
        }


        return redirect()->route('admin.commerces.edit', $commerce)->with('info', 'El comercio se actualizó con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Commerce $commerce)
    {
        $commerce->delete();
        return redirect()->route('admin.commerces.index')->with('info', 'El comercio se eliminó con éxito');
    }
}
