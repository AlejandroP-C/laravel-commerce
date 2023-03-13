<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Commerce;
use App\Models\Tickets;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tickets = Tickets::all();
        $commerces = Category::all();

        return view('admin.tickets.index', compact('tickets', 'commerces'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tickets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required',
            'date' => 'required'
        ]);

        $commerces = Commerce::where('user_id', auth()->user()->id)->first();
        if (isset($commerces->id)) {

            Tickets::create([
                'message' => $request->message,
                'date' => $request->date,
                'commerce_id' => $commerces->id
            ]);
            return redirect()->route('admin.home')->with('info', 'El ticket se solicitó con exito');
        } else {
            return redirect()->route('admin.home')->with('info', 'Necesitas crear un comercio antes de solicitar un ticket');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Tickets $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tickets $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tickets $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tickets $ticket)
    {
        $ticket->delete();

        return redirect()->route('admin.tickets.index')->with('info', 'Se ha completado la revisión del ticket');
    }
}
