<form action="{{ $route }}" method="POST"
    onsubmit="return confirm('Are you sure you want to delete this {{ $item }}?');">
    @csrf
    @method('DELETE')
    <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded-md hover:bg-red-700">
        Delete
    </button>
</form>
