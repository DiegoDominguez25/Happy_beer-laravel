@extends('layouts.template')

@section('title','Happy_beer')

@section('content')

<div class="min-h-screen p-6 bg-black-100 flex items-center justify-center">
    <div class="container max-w-screen-lg mx-auto">
        <div>
        <form method="POST" action="{{ route('licor.store') }}" enctype="multipart/form-data">
            @csrf
            <h2 class="font-semibold text-xl text-white">Añadir licor</h2>
            <p class="text-gray-300 mb-6">Happy beer.</p>

            <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
            <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
                <div class="text-gray-600">
                <p class="font-medium text-lg">LICOR</p>
                <p>Por favor llena todos los campos.</p>
                </div>

                <div class="lg:col-span-2">
                <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                <div class="md:col-span-5">
                <label for="nombre">Nombre</label>
                <input name="nombre" type="text" id="nombre" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{ old('nombre') }}" />
                    @error('nombre')
                        <p style="color: red;">{{ $message }}</p>
                    @enderror
                </div>

                    <div class="md:col-span-5">
                    <label for="descripcion">Descripcion</label>
                    <input type="text" name="descripcion" id="descripcion" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{ old('descripcion') }}" placeholder="Descripcion del producto" />
                        @error('descripcion')
                            <p style="color: red;">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="md:col-span-1">
                    <label for="precio">Precio</label>
                    <input type="number" name="precio" id="precio" class="transition-all flex items-center h-10 border mt-1 rounded px-4 w-full bg-gray-50" placeholder="" value="{{ old('precio') }}" />
                        @error('precio')
                            <p style="color: red;">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="md:col-span-1">
                        <label for="stock">Stock</label>
                        <input type="number" name="stock" id="stock" class="transition-all flex items-center h-10 border mt-1 rounded px-4 w-full bg-gray-50" placeholder="" value="{{ old('stock') }}" />
                            @error('stock')
                                <p style="color: red;">{{ $message }}</p>
                            @enderror
                        </div>

                    <div class="md:col-span-1">
                        <label for="categoria_id" class="block text-sm font-medium text-gray-900 dark:text-gray-400">Categoria</label>
                        <select type="text" name="categoria_id" id="categoria_id" class="transition-all flex items-center h-10 border mt-1 rounded px-4 w-full bg-white" placeholder="">
                            @foreach($categorias as $categoria)
                                <option  value="{{ $categoria->id }}" @selected(old('categoria_id') == $categoria->id /* $categoria->id == $licor->categoria_id ? 'selected' : '' */)>
                                    {{ $categoria->nombre }}
                                </option>
                            @endforeach
                        </select>
                        </div>

                    <div class="md:col-span-5 text-left">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Subir archivo</label>
                        <input type="file" name="archivo" accept="image/*" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file">
                    </div>
                    <div class="md:col-span-5 text-right">
                    <div class="inline-flex items-end">
                        <button type="submit" value="Create" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Guardar</button>
                    </div>
                    </div>

                </div>
                </div>
            </div>
            </div>
        </form>
      </div>

      <a href="https://www.buymeacoffee.com/dgauderman" target="_blank" class="md:absolute bottom-0 right-0 p-4 float-right">
        <img src="https://www.buymeacoffee.com/assets/img/guidelines/logo-mark-3.svg" alt="Buy Me A Coffee" class="transition-all rounded-full w-14 -rotate-45 hover:shadow-sm shadow-lg ring hover:ring-4 ring-white">
      </a>
    </div>
  </div>

@endsection
