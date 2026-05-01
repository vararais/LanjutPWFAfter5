<x-app-layout>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Add New Product</h2>
                
                <form action="{{ route('product.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Product Name</label>
                        {{-- Hapus 'required', tambah value old(), dan tambah @error --}}
                        <input type="text" name="name" value="{{ old('name') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        @error('name') <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Kategori</label>
                        <select name="category_id" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            <option value="">-- Pilih Kategori --</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id') <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Quantity</label>
                        <input type="text" name="qty" value="{{ old('qty') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        @error('qty') <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Price</label>
                        <input type="text" name="price" value="{{ old('price') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        @error('price') <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div class="flex items-center justify-between">
                        <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Save Product</button>
                        <a href="{{ route('product.index') }}" class="inline-block align-baseline font-bold text-sm text-gray-500 hover:text-gray-800">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>