@extends('layouts.app')

@section('content')
<a href="{{ route('licor.index') }}">Atrás</a>
<h1>{{ $licor->nombre }}</h1>
<p>{{ $licor->descripcion }}</p>
<p>{{ $licor->precio }}</p>
@endsection