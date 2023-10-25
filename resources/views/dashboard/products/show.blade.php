<x-app-layout>
    <div class="mt-4 p-6 max-w-2xl mx-auto bg-white rounded shadow-md">
        <h2 class="text-2xl font-semibold mb-4">Product Detail:</h2>

        <img src="{{ asset("/storage/".$product->image_url) }}" style="float:right"/>
        <p><strong>Product:</strong> {{ $product->name }}</p>
        <p><strong>CURRENT STOCK:</strong> {{ $product->stock() }}</p>

        <p><strong>Duration:</strong> {{ $product->description }}</p>
        <p><strong>Created At:</strong> {{ $product->created_at }}</p>


        <table class="min-w-full text-left text-sm font-light">
            <thead class="border-b font-medium dark:border-neutral-500">
            <tr>
                <th scope="col" class="px-6 py-4 text-center">#</th>
                <th scope="col" class="px-6 py-4 text-center">Quantity</th>
                <th scope="col" class="px-6 py-4 text-center">Customer</th>
                <th scope="col" class="px-6 py-4 text-center">Created At</th>
            </tr>
            </thead>
            <tbody>


        @foreach ($product->stockHistory as $history)

        <tr class="border-b-2 p-4" >


            <td class="p-4 text-center"> {{ $history->id }} </td>
            <td class="p-4 text-center {{ $history->quantity > 0 ? 'text-green-500' : 'text-red-500' }}">
                {{ $history->quantity > 0 ? "+" : "" }} {{ $history->quantity }}
            </td>
            <td class="p-4 text-center">
                @if ($history->customer)
                    {{ $history->customer->surname . " " . $history->customer->name  }}
                @else
                    <span class="text-gray-500"> No Customer Added</span>
                @endif
            </td>

            <td class="p-4 text-center"> {{ $history->created_at }} </td>

        </tr>
        @endforeach


    </tbody>
</table>
    </div>

</x-app-layout>
`
