<x-layouts.app :title="__('Categorías Financieras')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="grid auto-rows-min md:grid-cols-2 gap-4">
            <div class="relative overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <div class="flex h-full w-full flex-col items-center justify-center bg-black text-white">
                    <h2 class="text-xl font-semibold">Número de Categorías</h2>
                    <h1 class="text-2xl">
                        {{ $categories->count() }}
                    </h1>
                </div>
            </div>
            <div class="relative overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <flux:button variant="primary" href="{{ route('finance-categories.create') }}" class="w-full">Agregar Categoria</flux:button>
            </div>
        </div>
        <div class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
            <div class="mx-auto overflow-x-auto h-full bg-neutral-900 text-neutral-100 p-4">
                <h3>Registros de Categorias</h3>
                <table class="mx-auto text-center w-full divide-y divide-neutral-700 p-4 border-spacing-2">
                    <thead class="bg-neutral-800">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs uppercase tracking-wider text-neutral-300 font-semibold">
                                NOMBRE
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs  uppercase tracking-wider text-neutral-300 font-semibold">
                                DESCRIPCIÓN
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs uppercase tracking-wider text-neutral-300 font-semibold">
                                ACCIONES
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-neutral-700">
                        @foreach ($categories as $category)
                            <tr class="">
                                <td class="px-6 py-4 text-sm">

                                    <flux:link href="{{ route('finance-categories.show', $category) }}">{{ $category->name }}</flux:link>

                                </td>
                                <td class="px-6 py-4 text-sm">
                                    {{ $category->description }}
                                </td>
                                <td class="px-6 py-4 text-sm m-4">
                                    <div class="flex justify-center space-x-2">
                                        <flux:button href="{{ route('finance-categories.edit', $category) }}" variant="primary">
                                            <flux:icon.pencil-square variant="mini" />
                                        </flux:button>
                                        <form action="{{ route('finance-categories.destroy', $category) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <flux:button type="submit" variant="danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta categoría?')">
                                                <flux:icon.trash variant="mini" />
                                            </flux:button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layouts.app>
