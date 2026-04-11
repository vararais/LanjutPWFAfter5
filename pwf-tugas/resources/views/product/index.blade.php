<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                {{-- HEADER & TOMBOL ATAS --}}
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-800">Products</h2>
                    <div class="flex space-x-3">
                        {{-- Ini Gate Modul 5: Cuma Admin yang bisa lihat tombol Export --}}
                        @can('export-product')
                            <a href="#" class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">Export Data</a>
                        @endcan
                        
                        {{-- Tombol Add Product: Semua bisa lihat --}}
                        <a href="{{ route('product.create') }}" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">Add Product</a>
                    </div>
                </div>

                {{-- PESAN SUKSES --}}
                @if(session('success'))
                    <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-md">
                        {{ session('success') }}
                    </div>
                @endif

                {{-- TABEL PRODUK --}}
                <table class="min-w-full divide-y divide-gray-200 border">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Quantity</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Price</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($products as $product)
                            <tr>
                                <td class="px-6 py-4">{{ $product->name }}</td>
                                <td class="px-6 py-4">{{ $product->qty }}</td>
                                <td class="px-6 py-4">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                                <td class="px-6 py-4 flex space-x-3">
                                    
                                    {{-- Tombol View: Semua bisa lihat --}}
                                    <a href="{{ route('product.show', $product->id) }}" class="text-blue-600 hover:text-blue-900">View</a>
                                    
                                    {{-- Ini Policy Modul 5: Tombol Edit/Delete cuma muncul untuk Admin ATAU pembuat produk tersebut --}}
                                    @can('update', $product)
                                        <a href="{{ route('product.edit', $product->id) }}" class="text-yellow-600 hover:text-yellow-900">Edit</a>
                                    @endcan

                                    @can('delete', $product)
                                        <form action="{{ route('product.delete', $product->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Are you sure you want to delete this?')">Delete</button>
                                        </form>
                                    @endcan
                                    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>