@extends('layouts.template')

@section('title','Happy_beer')

@section('content')
<div class="mt-10">
<a class="text-white" href="{{ route('licor.index') }}">Atrás
<svg class="h-8 w-8 text-white"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M9 13l-4 -4l4 -4m-4 4h11a4 4 0 0 1 0 8h-1" /></svg>
</a>
<div class='w-full gap-2 grid  grid-cols-3 mb-10'>
    <div></div>
    <div key={content} class="group relative rounded-lg overflow-hidden bg-white  hover:shadow-2xl ">

    <div class="h-40">
        <img
        src='https://lp-cms-production.imgix.net/2019-06/554369495_full.jpg'
        alt='City'
        class="h-40 w-full object-cover object-center "
        />
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

    <div></div>
    </div>
</div>
@endsection
