<x-app-layout>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h2 class="text-2xl font-bold mb-6">Add Category</h2>
                <form action="{{ route('category.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Category Name</label>
                        <input type="text" name="name" class="shadow border rounded w-full py-2 px-3 text-gray-700">
                    </div>
                    <button type="submit" class="bg-indigo-600 text-white font-bold py-2 px-4 rounded">Save Category</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>