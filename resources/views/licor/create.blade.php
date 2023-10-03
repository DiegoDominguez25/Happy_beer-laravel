@extends('layouts.app')

@section('content')
<a href="{{ route('licor.index') }}">Atrás</a>
<form method="POST" action="{{ route('licor.store') }}">
    @csrf
    <label for="">Nombre:</label>
    <input type="text" name="nombre">

    <label for="">Descripcion:</label>
    <input type="text" name="descripcion">

    <input type="submit" value="Create">
</form>
@endsection