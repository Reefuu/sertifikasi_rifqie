<x-layout>
    <x-slot name="headtitle">{{ $category->name }} - Books</x-slot>
    <div class="text-lg font-bold">
        <h1>Category: {{ $category->name }}</h1>
    </div>
    <div class="px-4 py-6">
        <h2 class="text-xl font-semibold">Books in this Category</h2>
        <div class="grid grid-cols-3 gap-4">
            @foreach ($category->books as $book)
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
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
