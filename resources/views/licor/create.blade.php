@extends('layouts.template')

@section('title','Happy_beer')

@section('content')
<a href="{{ route('licor.index') }}">Atrás</a>
<form method="POST" action="{{ route('licor.store') }}">
    @csrf
    <label for="">Nombre:</label>
    <input type="text" name="nombre">
    @error('nombre')
        <p style="color: red;">{{ $message }}</p>
    @enderror

    <label for="">Descripcion:</label>
    <input type="text" name="descripcion">
    @error('descripcion')
        <p style="color: red;">{{ $message }}</p>
    @enderror

    <label for="">Precio:</label>
    <input type="number" name="precio">
    @error('precio')
        <p style="color: red;">{{ $message }}</p>
    @enderror

    <label for="">Stock:</label>
    <input type="number" name="stock">
    @error('stock')
        <p style="color: red;">{{ $message }}</p>
    @enderror

    <label for="">Seleccione la categoria</label>
    <select name="categoria_id" id="categoria_id">
        @foreach($categorias as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
            @endforeach
    </select>


    <input type="submit" value="Create">
</form>
@endsection
