<x-app-layout>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Product Details</h2>
                
                <div class="mb-4">
                    <p class="text-sm font-bold text-gray-600 uppercase">Name</p>
                    <p class="text-lg text-gray-900">{{ $product->name }}</p>
                </div>
                <div class="mb-4">
                    <p class="text-sm font-bold text-gray-600 uppercase">Quantity</p>
                    <p class="text-lg text-gray-900">{{ $product->qty }}</p>
                </div>
                <div class="mb-6">
                    <p class="text-sm font-bold text-gray-600 uppercase">Price</p>
                    <p class="text-lg text-gray-900">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                </div>
                
                {{-- AREA TOMBOL SEJAJAR --}}
                <div class="flex space-x-3 mt-6">
                    <a href="{{ route('product.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">Back to List</a>

                    {{-- Memanggil Component Edit & Delete. --}}
                    {{-- Tetap dibungkus @can agar policy keamanan Modul 5 tetap jalan! --}}
                    @can('update', $product)
                        <x-edit-button url="{{ route('product.edit', $product->id) }}" />
                    @endcan

                    @can('delete', $product)
                        <x-delete-button url="{{ route('product.delete', $product->id) }}" />
                    @endcan
                </div>

            </div>
        </div>
    </div>
</x-app-layout>