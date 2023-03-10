@extends('adminlte::page')

@section('title', 'Commerce Management')

@section('content_header')
    <a href="{{ route('admin.products.create') }}" class="btn btn-secondary float-right">Añadir producto</a>
    <h1>Listado de productos</h1>
@stop

@section('content')
@if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif
    @livewire('admin.products-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
