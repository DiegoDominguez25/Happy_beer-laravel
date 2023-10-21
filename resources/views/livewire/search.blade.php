<div>

    <form>
        <div class="mt-10 flex">
            <label for="search-dropdown" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Your Email</label>
            <select wire:model="categoriaFiltro" id="dropdown-button"  class="flex-shrink-0 z-1 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-l-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600" type="button">
            <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
            </svg>

            <div id="dropdown" class="items-center z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                <option value="">Todos</option>
                @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}">
                    {{ $categoria->nombre }}
                </option>
                @endforeach
            </div>
        </select>
            <div class="relative w-full">
                <input wire:model="searchlicor" type="search" id="search-dropdown" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-r-lg border-l-gray-50 border-l-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-l-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="Buscar licor" required>
                <button type="submit" class="absolute top-0 right-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-r-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                    <span class="sr-only">Buscar</span>
                </button>
            </div>
        </div>
    </form>

    <label for="hs-select-label" class="mt-5 block text-sm font-medium mb-2 text-white">Ordenar por</label>
    <select wire:model="filtro" id="hs-select-label" class="py-3 px-4 pr-9 block w-min border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400">
    <option selected value="">Sin filtros</option>
    <option value="asc">A-Z</option>
    <option value="desc">Z-A</option>
    <option>3</option>
    </select>

<!-- component -->
    <table class="border rounded-lg min-w-full mt-5 border-collapse block md:table">
        <thead class="block md:table-header-group">
            <tr class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
                <th class="bg-gray-900 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Nombre</th>
                <th class="bg-gray-900 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Descripcion</th>
                <th class="bg-gray-900 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Precio</th>
                <th class="bg-gray-900 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Stock</th>
                <th class="bg-gray-900 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Categoria</th>
                <th class="bg-gray-900 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Acciones</th>
            </tr>
        </thead>
        <tbody class="block md:table-row-group">
            @forelse ($licors as $licor)

            <tr class="bg-gray-300 border border-grey-500 md:border-none block md:table-row">
                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Nombre</span>
                    {{ $licor->nombre }}
                </td>
                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Descripcion</span>
                    {{ $licor->descripcion }}
                </td>
                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Precio</span>
                    {{ $licor->precio }}
                </td>
                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Stock</span>
                    {{ $licor->stock }}
                </td>
                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Categoria</span>
                    {{ $licor->categoria->nombre }}
                </td>
                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                    <span class="inline-block w-1/3 md:hidden font-bold">Acciones</span>
                    <a href="{{ route('licor.edit', $licor->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 border border-blue-500 rounded ml-3">Editar</a>
                    <form method="POST" class="mt-3 ml-3" action="{{ route('licor.destroy', $licor->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" value="Delete" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 border border-red-500 rounded">Borrar</button>
                    </form>
                </td>
            </tr>

            @empty
            <p>No data.</p>

            @endforelse
        </tbody>
    </table>
    <div class="px-6 py-3">{{ $licors->links() }}</div>
</div>
