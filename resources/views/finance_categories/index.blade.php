<x-layouts.app :title="__('Categorías Financieras')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">

            </div>
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">

            </div>
            <div class="relative aspect-video overflow-hidden rounded-xl">
                <div class="flex justify-end">
                    <flux:button variant="primary" href="{{ route('finance_categories.create') }}" class="w-full">Agregar Categoria</flux:button>
                </div>
            </div>
        </div>
        <div class="relative  h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
            <div class=" mx-auto overflow-x-auto h-full bg-neutral-900 text-neutral-100">
                <table class="mx-auto min-w-full divide-y divide-neutral-700 p-2">
                    <thead class="bg-neutral-800">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-neutral-300">
                                Nombre
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-neutral-300">
                                Descripción
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-neutral-300">
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-neutral-700">
                        @foreach ($categories as $category)
                            <tr>
                                <td class="px-6 py-4 text-sm">
                                    {{ $category->name }}
                                </td>
                                <td class="px-6 py-4 text-sm">
                                    {{ $category->description }}
                                </td>
                                <td class="px-6 py-4 text-sm">
                                    <div class="flex space-x-2">
                                        <flux:button variant="primary"><flux:icon.pencil-square variant="mini" /></flux:button>
                                        <flux:button variant="danger"><flux:icon.trash variant="mini" /></flux:button>

                                        {{-- <a href="{{-- route('finance_categories.edit', $category) " class="px-4 py-2 text-sm font-medium text-white bg-amber-300 rounded-lg hover:bg-amber-300">
                                            Editar
                                        </a>
                                        --}}

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
