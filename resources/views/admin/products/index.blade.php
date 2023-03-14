@extends('adminlte::page')

@section('title', 'Commerce Management')

@section('content_header')
    @can('admin.roles.index')
        <a href="{{ route('admin.products.show', 2) }}" class="btn btn-secondary btn-sm float-right">Vista general de productos</a>
    @endcan
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
