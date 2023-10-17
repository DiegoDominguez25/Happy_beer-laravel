@extends('layouts.app')

@section('title','Happy_beer')

@section('content')
<a href="{{ route('licor.index') }}">Atrás</a>
<h1>Nombre: {{ $licor->nombre }}</h1>
<p>Descripción: {{ $licor->descripcion }}</p>
<p>Precio: {{ $licor->precio }} MX</p>
<p>Stock: {{ $licor->stock }}</p>
@endsection
