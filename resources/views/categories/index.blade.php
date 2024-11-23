<x-layout>
    <x-slot name="headtitle">{{ $headtitle }}</x-slot>
    <div class="text-lg font-bold">
        <h1>Categories</h1>
    </div>
    <div class="px-4 py-6">
        <x-button-add>
            <x-slot:route>{{ route('categories.create') }}</x-slot:route>

            Add Category
        </x-button-add>
    </div>
    <div class="grid grid-cols-3 gap-4">
        @foreach ($categories as $category)
            <div class="bg-gray-100 p-4 rounded-md shadow-md flex justify-between items-center">
                <h2 class="text-lg font-semibold">{{ $category['name'] }}</h2>
                <div class="flex space-x-2">
                    <x-button-edit>
                        <x-slot:route>{{ route('categories.edit', $category->id) }}</x-slot:route>
                    </x-button-edit>
                    <x-button-delete>
                        <x-slot:route>{{ route('categories.destroy', $category->id) }}</x-slot:route>
                        <x-slot:item>category</x-slot:item>
                    </x-button-delete>
                </div>
            </div>
        @endforeach

    </div>
</x-layout>
