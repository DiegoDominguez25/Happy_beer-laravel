<div>

    <form>
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            </div>
            <input wire:model="searchlicor" type="text" id="default-search" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Mockups, Logos..." required />

        </div>
    </form>
    <ul>
        @forelse ($licors as $licor)

            <li><a href="{{ route('licor.show', $licor->id) }}">{{ $licor->nombre }}</a> |
                <a>{{ $licor->categoria->nombre }}</a> |
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
        <div class="px-6 py-3">{{ $licors->links() }}</div>
    </ul>
</div>
