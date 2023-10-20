@extends('layouts.template')

@section('title','Happy_beer')


@section('content')
<a href="{{ route('licor.create') }}">Insertar nuevo licor</a>

@livewire('search')
@livewire('categoria')

@endsection
