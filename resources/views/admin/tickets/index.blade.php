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
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Mensaje</th>
                        <th>Fecha</th>
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
                            <td>{{ $ticket->commerce_id }}</td>
                            <td>
                                @can('admin.tickets.index')
                                    <form action="{{ route('admin.tickets.destroy', $ticket) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-success btn-sm">
                                            Realizado
                                        </button>
                                    </form>
                                @endcan
                            </td>

                        </tr>
                    @endforeach
                </tbody>


            </table>
        </div>

    </div>
@stop
