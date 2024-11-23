<x-layout>
    <x-slot name="headtitle">{{ $headtitle }}</x-slot>
    <div class="text-lg font-bold">
        <h1>Books</h1>
    </div>
    <div class="px-4 py-6">
        <x-button-add>
            <x-slot:route>{{ route('books.create') }}</x-slot:route>
            Add Book
        </x-button-add>
    </div>
    <div class="grid grid-cols-3 gap-4">
        @foreach ($books as $book)
            <div class="bg-gray-100 p-4 rounded-md shadow-md flex flex-col justify-between">
                <div>
                    <h2 class="text-lg font-semibold">{{ $book->title }}</h2>
                    <h3 class="text-md">by: {{ $book->author }}</h3>
                    <div class="mt-2">
                        <h4 class="text-sm font-medium text-gray-700">Categories:</h4>
                        <ul class="list-disc list-inside">
                            @foreach ($book->categories as $category)
                                <li class="text-sm text-gray-600">{{ $category->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="flex space-x-2 mt-4">
                    <x-button-edit>
                        <x-slot:route>{{ route('books.edit', $book->id) }}</x-slot:route>
                    </x-button-edit>
                    <x-button-delete>
                        <x-slot:route>{{ route('books.destroy', $book->id) }}</x-slot:route>
                        <x-slot:item>book</x-slot:item>
                    </x-button-delete>
                </div>
            </div>
        @endforeach
    </div>
</x-layout>
