<x-layouts.app :title="__('Registros Financieros')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="grid auto-rows-min grid-cols-3 gap-4">
            <div class="relative overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <div class="flex h-full w-full flex-col items-center justify-center bg-black text-white">
                    <h2 class="text-xl font-semibold">Número de Registros Financieros</h2>
                    <h1 class="text-2xl">
                        {{ $financeRegistries->count() }}
                    </h1>
                </div>
            </div>
            <div class="relative overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <div class="flex h-full w-full flex-col items-center justify-center bg-black text-white">
                    <h2 class="text-xl font-semibold" style="color: #46EDD5">Monto en Cuenta</h2>
                    <h1 class="text-2xl semibold" style="color: #46EDD5">
                         S/. {{ $balance }}
                    </h1>

                </div>
            </div>
            <div class="relative overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <flux:button variant="primary" href="{{ route('finance-registries.create') }}" class="w-full">Agregar Registro</flux:button>
            </div>
        </div>
        <div class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
            <div class="mx-auto overflow-x-auto h-full bg-neutral-900 text-neutral-100 p-4">
                <h3>Registros Financieros</h3>
                <table class="mx-auto text-center w-full divide-y divide-neutral-700 p-4 border-spacing-2">
                    <thead class="bg-neutral-800">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs uppercase tracking-wider text-neutral-300 font-semibold">
                                DESCRIPCIÓN
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs uppercase tracking-wider text-neutral-300 font-semibold">
                                TIPO
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs uppercase tracking-wider text-neutral-300 font-semibold">
                                MONTO
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs uppercase tracking-wider text-neutral-300 font-semibold">
                                CATEGORÍA
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs uppercase tracking-wider text-neutral-300 font-semibold">
                                ACCIONES
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-neutral-700">
                        @foreach ($financeRegistries as $registry)
                            <tr>
                                <td class="px-6 py-4 text-sm">
                                    {{ $registry->description }}
                                </td>
                                <td class="px-6 py-4 text-sm mx-auto text-center">
                                    @if ($registry->type === 'Ingreso')
                                        <flux:icon.arrow-down-circle variant="micro" class="text-center" style="color: #00C950"/>
                                    @elseif ($registry->type === 'Egreso')
                                        <flux:icon.arrow-up-circle variant="micro" class="text-center" style="color: #EC003F"/>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-sm">
                                    S/. {{ number_format($registry->amount, 2) }}
                                </td>
                                <td class="px-6 py-4 text-sm">
                                    {{ $registry->financeCategory->name }}
                                </td>
                                <td class="px-6 py-4 text-sm">
                                    <div class="flex justify-center space-x-2">
                                        <flux:button href="{{ route('finance-registries.edit', $registry) }}" variant="primary">
                                            <flux:icon.pencil-square variant="mini" />
                                        </flux:button>
                                        <form action="{{ route('finance-registries.destroy', $registry) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <flux:button type="submit" variant="danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este registro?')">
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
