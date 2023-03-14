@extends('adminlte::page')

@section('title', 'Coders Free')

@section('content_header')


    <h1>Actualizar el estado del Ticket</h1>
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

            {!! Form::model($ticket, [
                'route' => ['admin.tickets.update', $ticket],
                'autocomplete' => 'off',
                'method' => 'put',
            ]) !!}

            <div class="form-group">
                {!! Form::label('message', 'Mensaje:') !!}
                {!! Form::textarea('message', null, ['class' => 'form-control', 'readonly']) !!}

                @error('message')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                {!! Form::label('date', 'Fecha') !!}
                {!! Form::date('date', date('Y-m-d'), ['readonly']) !!}

                @error('date')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">

                <label for="status">Estado</label>

                <select name="status" id="status" class="form-control">
                    <option value="1" selected>
                        Pendiente
                    </option>
                    <option value="2">
                        En curso
                    </option>
                    <option value="3">
                        Completada
                    </option>
                </select>
            </div>


            {!! Form::submit('Actualizar estado del ticket', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>

@stop
