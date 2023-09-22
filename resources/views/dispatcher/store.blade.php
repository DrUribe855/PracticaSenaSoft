@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
    <div id="app">
        <store></store>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
@stop

@section('js')
    <script src="{{ mix('/js/app.js') }}"> </script>
@stop