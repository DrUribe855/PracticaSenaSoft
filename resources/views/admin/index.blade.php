@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>
@stop

@section('css')
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
@stop

@section('js')
    <script src="{{ mix('/js/app.js') }}"> </script>
@stop