@extends('layouts.template')

@section('title','Happy_beer')

@section('content')
<div class="mt-10">
    <div class="w-15">
        <a class="text-white" href="{{ route('licor.index') }}">Atrás
        <svg class="h-8 w-8 text-white"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M9 13l-4 -4l4 -4m-4 4h11a4 4 0 0 1 0 8h-1" /></svg>
        </a>
    </div>

@if($licor->archivo)
<div class="grid justify-center mt-5 mb-20">
    <div key={content} class="group relative rounded-lg overflow-hidden bg-white  hover:shadow-2xl">

    <div class="h-40">
        <img src="{{ asset('storage/'. $licor->archivo->ruta) }}" alt="Archivo del Licor" class="h-40 w-full object-cover object-center ">
    </div>

    <div class="h-1/2 p-4 ">
            <h3 class="mb-2 text-base font-semibold text-blue-800">
            <a href='' class="hover:underline">
                {{ $licor->nombre }}
            </a>
            </h3>
            <p class="text-sm font-bold text-orange-500">
                {{ $licor->descripcion }}
            </p>
            <div class='flex flex-row justify-between text-xs mt-2'>
            <p>
                {{ $licor->precio }}
            </p>
            <p>
                {{ $licor->categoria->nombre }}
            </p>
        </div>
        </div>
    </div>
    </div>
</div>

@else
<div class="grid justify-center my-5">
        <div class=" block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $licor->nombre }}</h5>
            <p class="font-normal text-gray-700 dark:text-gray-400">{{ $licor->descripcion }}</p>
            <p class="font-normal text-gray-700 dark:text-gray-400">${{ $licor->precio }}</p>
            <p class="font-normal text-gray-700 dark:text-gray-400">{{ $licor->categoria->nombre }}</p>
    </div>
</div>
@endif

@endsection
