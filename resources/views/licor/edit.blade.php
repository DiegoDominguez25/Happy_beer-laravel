@extends('layouts.app')

@section('content')
<a href="{{ route('licor.index') }}">Atrás</a>
<form method="POST" action="{{ route('licor.update', $licor->id) }}">
    @method('PUT')
    @csrf
    <label for="">Nombre:</label>
    <input type="text" name="nombre" value="{{ $licor->nombre }}">
    @error('nombre')
        <p style="color: red;">{{ $message }}</p>
    @enderror

    <label for="">Descripcion:</label>
    <input type="text" name="descripcion" value="{{ $licor->descripcion }}">
    @error('descripcion')
        <p style="color: red;">{{ $message }}</p>
    @enderror

    <label for="">Precio:</label>
    <input type="text" name="precio" value="{{ $licor->precio }}">
    @error('precio')
        <p style="color: red;">{{ $message }}</p>
    @enderror

    <input type="submit" value="Update">
</form>
@endsection