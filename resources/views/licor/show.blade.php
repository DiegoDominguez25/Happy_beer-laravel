@extends('layouts.app')

@section('title','Happy_beer')

@section('content')
<a href="{{ route('licor.index') }}">Atrás</a>
<h1>{{ $licor->nombre }}</h1>
<p>{{ $licor->descripcion }}</p>
<p>{{ $licor->precio }} MX</p>
<p>{{ $licor->stock }}</p>
@endsection