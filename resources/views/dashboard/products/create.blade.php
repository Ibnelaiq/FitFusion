<x-app-layout>
    <div class="mt-4 p-6 max-w-[80%] mx-auto bg-white rounded shadow-md">

        <h2 class="text-2xl font-semibold mb-4">Add New Product</h2>

        <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
            @csrf

            <!-- Name -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-600">Name:</label>
                <input type="text" id="name" name="name" class="mt-1 p-2 w-full border rounded-md {{ $errors->has('name') ? 'border-red-500' : 'border-gray-300' }}" required>
                @if($errors->has('start'))
                    <p class="text-red-500 text-sm mt-1">{{ $errors->first('name') }}</p>
                @endif
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-600">Description:</label>
                <textarea id="description" name="description" class="mt-1 p-2 w-full border rounded-md {{ $errors->has('description') ? 'border-red-500' : 'border-gray-300' }}" required></textarea>
                @if($errors->has('description'))
                    <p class="text-red-500 text-sm mt-1">{{ $errors->first('description') }}</p>
                @endif
            </div>

            <!-- Description -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-600">Starting Stock:</label>
                <input type="number" id="name" name="starting_stock" class="mt-1 p-2 w-full border rounded-md {{ $errors->has('starting_stock') ? 'border-red-500' : 'border-gray-300' }}" required>
                @if($errors->has('starting_stock'))
                    <p class="text-red-500 text-sm mt-1">{{ $errors->first('starting_stock') }}</p>
                @endif
            </div>

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-600">Normal Price:</label>
                <input type="number" id="name" name="normal_price" class="mt-1 p-2 w-full border rounded-md {{ $errors->has('normal_price') ? 'border-red-500' : 'border-gray-300' }}" required>
                @if($errors->has('starting_stock'))
                    <p class="text-red-500 text-sm mt-1">{{ $errors->first('normal_price') }}</p>
                @endif
            </div>

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-600">Sale Price:</label>
                <input type="number" id="name" value="0" name="sale_price" class="mt-1 p-2 w-full border rounded-md {{ $errors->has('sale_price') ? 'border-red-500' : 'border-gray-300' }}">
                @if($errors->has('sale_price'))
                    <p class="text-red-500 text-sm mt-1">{{ $errors->first('sale_price') }}</p>
                @endif
            </div>

            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-600">Image:</label>
                <input type="file" id="image" name="image" class="mt-1 p-2 w-full border rounded-md {{ $errors->has('image') ? 'border-red-500' : 'border-gray-300' }}">
                @if($errors->has('image'))
                    <p class="text-red-500 text-sm mt-1">{{ $errors->first('image') }}</p>
                @endif
            </div>


            <!-- Save Button -->
            <div class="mb-4">
                <button type="submit" class="bg-gray-500 hover:bg-gray-700 text-white py-2 px-4 rounded transition duration-300">Add Slot</button>
            </div>
        </form>
    </div>
</x-app-layout>
