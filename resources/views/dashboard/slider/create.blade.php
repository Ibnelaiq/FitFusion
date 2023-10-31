<x-app-layout>
    <div class="mt-4 p-6 max-w-[80%] mx-auto bg-white rounded shadow-md">

        <h2 class="text-2xl font-semibold mb-4">Add New Product</h2>

        <form method="POST" action="{{ route('slider.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-600">Image:</label>
                <input type="file" id="image" name="image" class="mt-1 p-2 w-full border rounded-md {{ $errors->has('image') ? 'border-red-500' : 'border-gray-300' }}">
                @if($errors->has('image'))
                    <p class="text-red-500 text-sm mt-1">{{ $errors->first('image') }}</p>
                @endif
            </div>


            <!-- Save Button -->
            <div class="mb-4">
                <button type="submit" class="bg-gray-500 hover:bg-gray-700 text-white py-2 px-4 rounded transition duration-300">Add Slider</button>
            </div>
        </form>
    </div>
</x-app-layout>
