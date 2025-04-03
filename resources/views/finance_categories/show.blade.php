<x-layouts.app :title="__('Detalle de Categoria')">
    <div class="max-w-4xl mx-auto p-6 rounded-lg shadow-md dark:bg-neutral-800">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold text-gray-900 dark:text-neutral-200">{{ __('Detalle de Categoría Financiera') }}</h1>
            <flux:button variant="filled" href="{{ route('finance-categories.index') }}" class="text-sm">
                {{ __('Volver a la lista') }}
            </flux:button>
        </div>
        <div class="bg-white dark:bg-neutral-700 rounded-lg shadow p-6">
            <h2 class="text-xl font-semibold text-gray-800 dark:text-neutral-100 mb-4">
                {{ $financeCategory->name ?? __('Nombre no disponible') }}
            </h2>
            <p class="text-gray-600 dark:text-neutral-300 mb-4">
                {{ $financeCategory->description ?? __('Sin descripción disponible.') }}
            </p>
            <div class="flex justify-between items-center mt-6">
                <span class="text-sm text-gray-500 dark:text-neutral-400">
                    {{ __('Última actualización:') }} {{ $financeCategory->updated_at ? $financeCategory->updated_at->format('d/m/Y H:i') : __('No disponible') }}
                </span>
                <flux:button variant="primary" href="{{ route('finance-categories.edit', $financeCategory->id) }}">
                    {{ __('Editar Categoría') }}
                </flux:button>
            </div>
        </div>
    </div>
</x-layouts.app>
