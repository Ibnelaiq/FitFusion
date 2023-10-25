<x-app-layout>
    <div class="w-full mt-8">
        <div class="flex justify-center">
            <div class="w-2/3">
                <form action="{{ route('products.sale.search') }}" method="GET">
                    <div class="flex items-center border-b border-b-2 border-teal-500 py-2">
                        <input type="text" name="search" class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" placeholder="Search for a product">
                        <button type="submit" class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded">Search</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="mt-8 flex justify-center">
            <div class="w-2/3">
                <h2 class="text-3xl font-semibold mb-4">Search Results:</h2>
                <div class="grid grid-cols-1 gap-4">
                    @forelse ($products as $product)

                        <div class="bg-white rounded-lg shadow-lg p-4 flex flex-wrap justify-between items-center">
                            <h5 class="text-xl font-semibold">{{ $product->name }}</h5>



                            <a
                            @if ($product->stock() > 0)
                                href="{{ route('products.sale', ['product'=> $product, 'customer' => $customer]) }}"
                                class="bg-gray-800 hover:bg-gray-700 text-white py-2 px-4 rounded"
                            @else
                                class="bg-gray-500 hover:bg-gray-700 text-white py-2 px-4 rounded"
                            @endif
                                >Create Sale</a>

                            <div class="w-full">
                                <h5 class="text-xs text-gray-400 text-muted font-semibold">Current Stock: <b>{{ $product->stock() }}</b></h5>
                            </div>
                        </div>
                    @empty
                        <p class="text-gray-700 mt-4">No results found.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
