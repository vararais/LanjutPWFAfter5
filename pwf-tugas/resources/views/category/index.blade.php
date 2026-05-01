<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold">Category List</h2>
                    <a href="{{ route('category.create') }}" class="px-4 py-2 bg-indigo-600 text-white rounded-md">+ Add Category</a>
                </div>

                <table class="min-w-full divide-y divide-gray-200 border">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left">NAME</th>
                            <th class="px-6 py-3 text-left">TOTAL PRODUCT</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($categories as $cat)
                        <tr>
                            <td class="px-6 py-4">{{ $cat->name }}</td>
                            <td class="px-6 py-4">{{ $cat->products_count }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>