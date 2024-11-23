<x-layout>
    <x-slot name="headtitle">Edit Member</x-slot>
    <div class="container mx-auto mt-10">
        <div class="max-w-md mx-auto bg-white p-5 rounded-md shadow-md">
            <h2 class="text-2xl font-bold mb-5">Edit Member</h2>
            <form action="{{ route('members.update', $member->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="name" id="name" value="{{ $member->name }}"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        required>
                    @error('name')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror

                </div>
                <div class="flex justify-end">
                    <a href="/members" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-700 mr-2">
                        Cancel
                    </a>
                    <button type="submit"
                        class="rounded-md bg-blue-900 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700 border border-blue-800 shadow-lg transition duration-300 ease-in-out transform hover:scale-105">
                        Update Member
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
