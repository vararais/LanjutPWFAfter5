<form action="{{ $url }}" method="POST" class="inline">
    @csrf
    @method('DELETE')
    <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700" onclick="return confirm('Are you sure you want to delete this?')">
        Delete
    </button>
</form>