@extends('adminlte::page')

@section('title', 'Coders Free')

@section('content_header')
    <h1>Crear nuevo ticket</h1>
@stop

@section('content')

    <div class="card">

        <div class="card-body">

            {!! Form::open(['route' => 'admin.tickets.store']) !!}

            <div class="form-group">

                {!! Form::label('message', 'Mensaje:') !!}

                {!! Form::textarea('message', null, ['class' => 'form-control']) !!}


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

            {!! Form::submit('Solicitar ticket', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}

        </div>
    </div>

@stop
