<x-layout>
    <x-slot name="headtitle">Add Book</x-slot>
    <div class="container mx-auto mt-10">
        <div class="max-w-md mx-auto bg-white p-5 rounded-md shadow-md">
            <h2 class="text-2xl font-bold mb-5">Add New Book</h2>
            <form action="{{ route('books.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                    <input type="text" name="title" id="title"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        required>
                </div>
                <div class="mb-4">
                    <label for="author" class="block text-sm font-medium text-gray-700">Author</label>
                    <input type="text" name="author" id="author"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        required>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Categories</label>
                    <div class="mt-2 space-y-2">
                        @foreach ($categories as $category)
                            <div class="flex items-center">
                                <input type="checkbox" name="categories[]" value="{{ $category->id }}"
                                    class="h-4 w-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                                <label for="category-{{ $category->id }}" class="ml-2 block text-sm text-gray-700">
                                    {{ $category->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="flex justify-end">
                    <a href="/books" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-700 mr-2">
                        Cancel
                    </a>
                    <button type="submit"
                        class="rounded-md bg-blue-900 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700 border border-blue-800 shadow-lg transition duration-300 ease-in-out transform hover:scale-105">
                        Add Book
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
