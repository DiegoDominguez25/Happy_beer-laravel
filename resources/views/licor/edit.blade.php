@extends('layouts.app')

@section('content')
<a href="{{ route('licor.index') }}">Atrás</a>
<form method="POST" action="#">
    @csrf
    <label for="">Nombre:</label>
    <input type="text" name="nombre" value="{{ $licor->nombre }}">

    <label for="">Descripcion:</label>
    <input type="text" name="descripcion" value="{{ $licor->descripcion }}">

    <input type="submit" value="Update">
</form>
@endsection