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
        $commerces = Commerce::all();

        $commerces_user = Commerce::where('user_id', auth()->user()->id)->first();
        $users = Commerce::all();

        if (isset($commerces_user)) {
            $ticketsCommerce = Tickets::where('commerce_id', $commerces_user->id)->get();
            return view('admin.tickets.index', compact('tickets', 'commerces', 'ticketsCommerce'));
        } else {
            return view('admin.tickets.index', compact('tickets', 'commerces', 'users'));
        }
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
        return view('admin.tickets.edit', compact('ticket'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tickets $ticket)
    {
        $ticket->update($request->all());

        return redirect()->route('admin.tickets.edit', $ticket)->with('info', 'El producto se ha actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tickets $ticket2)
    {
        $ticketsCompletados = Tickets::where('status', 3)->get();

        foreach ($ticketsCompletados as $ticket) {
            $ticket->delete();
        }
        return redirect()->route('admin.tickets.index')->with('info', 'Se ha completado la revisión del ticket');
    }

    
}
