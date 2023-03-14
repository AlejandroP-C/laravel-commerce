@extends('adminlte::page')

@section('title', 'Coders Free')

@section('content_header')


    <h1>Lista de Tickets</h1>
   
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>
                {{ session('info') }}
            </strong>
        </div>
    @endif

    <div class="card">

        <div class="card-body">

            @can('admin.tickets.index')
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Mensaje</th>
                            <th>Fecha</th>
                            <th>Estado</th>
                            <th>Comercio</th>
                            <th colspan="2"></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($tickets as $ticket)
                            <tr>
                                <td>{{ $ticket->id }}</td>
                                <td>{{ $ticket->message }}</td>
                                <td>{{ $ticket->date }}</td>
                                @if ($ticket->status == 1)
                                    <td class="text-warning">Pendiente</td>
                                @else
                                    @if ($ticket->status == 2)
                                        <td class="text-primary">En curso</td>
                                    @else
                                        <td class="text-success">Completada</td>
                                    @endif
                                @endif
                                @foreach ($commerces as $commerce)
                                    @if ($ticket->commerce_id == $commerce->id)
                                        <td>{{ $commerce->name }}</td>
                                    @endif
                                @endforeach
                                <td width="10px">
                                    @can('admin.tickets.index')
                                        <a href="{{ route('admin.tickets.edit', $ticket) }}" class="btn btn-success btn-sm">
                                            Cambiar Estado
                                        </a>
                                    @endcan
                                </td>

                            </tr>
                        @endforeach
                    </tbody>


                </table>
            @else
                @if (isset($ticketsCommerce))
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Mensaje</th>
                                <th>Fecha</th>
                                <th>Estado</th>
                                <th>Comercio</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($ticketsCommerce as $ticket)
                                <tr>
                                    <td>{{ $ticket->id }}</td>
                                    <td>{{ $ticket->message }}</td>
                                    <td>{{ $ticket->date }}</td>
                                    @if ($ticket->status == 1)
                                        <td class="text-warning">Pendiente</td>
                                    @else
                                        @if ($ticket->status == 2)
                                            <td class="text-primary">En curso</td>
                                        @else
                                            <td class="text-success">Completada</td>
                                        @endif
                                    @endif
                                    @foreach ($commerces as $commerce)
                                        @if ($ticket->commerce_id == $commerce->id)
                                            <td>{{ $commerce->name }}</td>
                                        @endif
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>


                    </table>
                @endif
            @endcan
        </div>

    </div>
@stop
