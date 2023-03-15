<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Commerce;
use App\Http\Requests\CommerceRequest;
use App\Models\ActivityLogs;
use Illuminate\Support\Facades\Auth;
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

        $this->logActivity('Crear comercio', 'Se creó un nuevo comercio con el ID ' . $commerce->id);
        
        $url =  Storage::put('public/images', $request->file('file'));

        $commerce->image()->create([
            'url' => $url
        ]);

        if ($request->categories) {
            $commerce->categories()->sync($request->categories);;
        }

        return redirect()->route('admin.commerces.edit', $commerce)->with('info', 'El comercio se creó con éxito');;
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

        return view('admin.commerces.edit', compact('commerce', 'categories'))->with('info', 'El comercio se actualizó con éxito');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CommerceRequest $request, Commerce $commerce)
    {
        $commerce->update($request->all());
        
        $this->logActivity('Actualizar comercio', 'Se actualizó un comercio con el ID ' . $commerce->id);


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

        $this->logActivity('Eliminar comercio', 'Se eliminó un comercio con el ID ' . $commerce->id);

        return redirect()->route('admin.commerces.index')->with('info', 'El comercio se eliminó con éxito');
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
