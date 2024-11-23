<x-layout>
    <x-slot name="headtitle">Add Category</x-slot>
    <div class="container mx-auto mt-10">
        <div class="max-w-md mx-auto bg-white p-5 rounded-md shadow-md">
            <h2 class="text-2xl font-bold mb-5">Add New Category</h2>
            <form action="{{ route('categories.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="name" id="name"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        required>
                </div>
                <div class="flex justify-end">
                    <button type="submit"
                        class="rounded-md bg-blue-900 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700 border border-blue-800 shadow-lg transition duration-300 ease-in-out transform hover:scale-105">
                        Add Category
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
