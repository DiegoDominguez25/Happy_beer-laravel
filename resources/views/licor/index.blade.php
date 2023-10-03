@extends('layouts.app')

@section('content')
<a href="{{ route('licor.create') }}">Insertar nuevo licor</a>
<ul>
    @forelse ($licors as $licor)

        <li><a href="#">{{ $licor->nombre }}</a> | <a href="{{ route('licor.edit', $licor->id) }}">Editar</a> | <a href="">Borrar</a> </li>
        
    @empty
        <p>No data.</p>
    @endforelse
</ul>
@endsection