@extends('layouts.app')

@section('title','Happy_beer')


@section('content')
<a href="{{ route('licor.create') }}">Insertar nuevo licor</a>
<ul>
    @forelse ($licors as $licor)

        <li><a href="{{ route('licor.show', $licor->id) }}">{{ $licor->nombre }}</a> |
            <a href="">{{ $licor->categoria->nombre }}</a> |
            <a href="{{ route('licor.edit', $licor->id) }}">Editar</a> |
            <form method="POST" action="{{ route('licor.destroy', $licor->id) }}">
                @csrf
                @method('DELETE')
                <input type="submit" value="Borrar">
            </form>
        </li>
    @empty
        <p>No data.</p>
    @endforelse
</ul>
@endsection
