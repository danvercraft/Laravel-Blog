<x-layouts.app :title="__('Editar Categoría Financiera')">
    <div class="max-w-2xl mx-auto p-4 rounded-lg shadow-md dark:bg-neutral-800">
        <h1 class="text-xl font-bold text-gray-900 dark:text-neutral-200 mb-4">{{ __('Editar Categoría Financiera') }}</h1>
        <form action="{{ route('finance-categories.update', $financeCategory->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium dark:text-neutral-300">{{ __('Nombre') }}</label>
                <input type="text" name="name" id="name" value="{{ old('name', $financeCategory->name) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-700 dark:border-neutral-600 dark:text-neutral-200" required>
            </div>
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium dark:text-neutral-300">{{ __('Descripción') }}</label>
                <textarea name="description" id="description" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-700 dark:border-neutral-600 dark:text-neutral-200">{{ old('description', $financeCategory->description) }}</textarea>
            </div>
            <div class="flex justify-end">
                <flux:button variant="primary" type="submit" class="w-full">Actualizar Categoria</flux:button>
            </div>
        </form>
    </div>
</x-layouts.app>
