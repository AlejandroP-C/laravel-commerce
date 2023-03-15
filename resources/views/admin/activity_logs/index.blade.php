@extends('adminlte::page')

@section('title', 'Commerce Management')

@section('content_header')
  
    <h1>Listado de actividades de los usuarios</h1>

@stop

@section('content')
  
    @livewire('admin.logs-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
