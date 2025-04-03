<x-layouts.app :title="__('Agregar Categoría Financiera')">
    <div class="max-w-2xl mx-auto p-4 rounded-lg shadow-md dark:bg-neutral-800">

        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold text-gray-900 dark:text-neutral-200">{{ __('Agregar Categoría Financiera') }}</h1>
            <flux:button variant="filled" href="{{ route('finance-categories.index') }}" class="text-sm">
                {{ __('Volver a la lista') }}
            </flux:button>
        </div>

        <div class="bg-white dark:bg-neutral-700 rounded-lg shadow p-6">
            <form action="{{ route('finance-categories.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium  dark:text-neutral-300">{{ __('Nombre') }}</label>
                    <input type="text" name="name" id="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-700 dark:border-neutral-600 dark:text-neutral-200" required>
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium dark:text-neutral-300">{{ __('Descripción') }}</label>
                    <textarea name="description" id="description" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-700 dark:border-neutral-600 dark:text-neutral-200"></textarea>
                </div>
                <div class="flex justify-end">
                    <flux:button variant="primary" type="submit" class="w-full">Guardar Categoria</flux:button>
                </div>
            </form>
        </div>

    </div>
</x-layouts.app>
