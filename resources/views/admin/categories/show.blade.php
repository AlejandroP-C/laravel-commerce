@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <a href="{{ route('admin.categories.index') }}" class="btn btn-primary float-right">Atras</a>
    <h1>Detalles de la categoría <strong>{{ $category->name }}</strong></h1>
@stop

@section('content')
    <div class="card">
        <h1 class="text-center h3">Comercios que contienen la categoria <strong>{{ $category->name }}</strong></h1>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Licencia</th>
                        <th>Descripción</th>
                        <th>Ubicación</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($category->commerces as $commerce)
                        <tr>
                            <td>{{ $commerce->id }}</td>
                            <td>{{ $commerce->name }}</td>
                            <td>{{ $commerce->license }}</td>
                            <td>{!! $commerce->description !!}</td>
                            <td>{{ $commerce->location }}</td>
                        </tr>
                    @endforeach
                </tbody>


            </table>
        </div>

    </div>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
