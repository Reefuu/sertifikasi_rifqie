<x-layout>
    <x-slot name="headtitle">{{ $headtitle }}</x-slot>
    <div class="text-lg font-bold">
        <h1>Library</h1>
    </div>

    <!-- Books Available to Borrow -->
    <div class="px-4 py-6">
        <h2 class="text-xl font-semibold">Books Available to Borrow</h2>
        <div class="grid grid-cols-3 gap-4">
            @foreach ($books as $book)
                @if (is_null($book->member_id))
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
                            <form action="{{ route('members.borrow', $book->id) }}" method="POST">
                                @csrf
                                <select name="member_id"
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                    required>
                                    <option value="">Select Member</option>
                                    @foreach ($members as $member)
                                        <option value="{{ $member->id }}">{{ $member->name }}</option>
                                    @endforeach
                                </select>
                                <button type="submit"
                                    class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-700 mt-2">
                                    Borrow
                                </button>
                            </form>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>

    <!-- Books Unavailable to Borrow -->
    <div class="px-4 py-6">
        <h2 class="text-xl font-semibold">Books Currently Borrowed</h2>
        <div class="grid grid-cols-3 gap-4">
            @foreach ($books as $book)
                @if (!is_null($book->member_id))
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
                            <div class="mt-2">
                                <h4 class="text-sm font-medium text-gray-700">Borrowed by:</h4>
                                <p class="text-sm text-gray-600">{{ $book->member->name }}</p>
                            </div>
                        </div>
                        <div class="flex space-x-2 mt-4">
                            <form action="{{ route('members.return', $book->id) }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-700">
                                    Return
                                </button>
                            </form>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</x-layout>
