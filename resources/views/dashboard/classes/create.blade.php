<x-app-layout>
    <div class="mt-4 p-6 max-w-[80%] mx-auto bg-white rounded shadow-md">

        <h2 class="text-2xl font-semibold mb-4">Add New Class</h2>

        <form method="POST" action="{{ route('classes.store') }}" enctype="multipart/form-data">
            @csrf

            <!-- Name -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-600">Name:</label>
                <input type="text" id="name" name="name" class="mt-1 p-2 w-full border rounded-md {{ $errors->has('name') ? 'border-red-500' : 'border-gray-300' }}" required>
                @if($errors->has('name'))
                    <p class="text-red-500 text-sm mt-1">{{ $errors->first('name') }}</p>
                @endif
            </div>

            <!-- Description -->
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-600">Description:</label>
                <textarea id="description" name="description" class="mt-1 p-2 w-full border rounded-md {{ $errors->has('description') ? 'border-red-500' : 'border-gray-300' }}" required></textarea>
                @if($errors->has('description'))
                    <p class="text-red-500 text-sm mt-1">{{ $errors->first('description') }}</p>
                @endif
            </div>

            <!-- Price -->
            <div class="mb-4">
                <label for="price" class="block text-sm font-medium text-gray-600">Price:</label>
                <input type="number" id="price" name="price" class="mt-1 p-2 w-full border rounded-md {{ $errors->has('price') ? 'border-red-500' : 'border-gray-300' }}" required>
                @if($errors->has('price'))
                    <p class="text-red-500 text-sm mt-1">{{ $errors->first('price') }}</p>
                @endif
            </div>

            <!-- Duration -->
            <div class="mb-4">
                <label for="duration" class="block text-sm font-medium text-gray-600">Duration:</label>
                <input type="text" id="duration" name="duration" class="mt-1 p-2 w-full border rounded-md {{ $errors->has('duration') ? 'border-red-500' : 'border-gray-300' }}" required>
                @if($errors->has('duration'))
                    <p class="text-red-500 text-sm mt-1">{{ $errors->first('duration') }}</p>
                @endif
            </div>
            <div class="mb-4">
                <label for="video_url" class="block text-sm font-medium text-gray-600">Video Url:</label>
                <input type="text" id="video_url" name="video_url" class="mt-1 p-2 w-full border rounded-md {{ $errors->has('video_url') ? 'border-red-500' : 'border-gray-300' }}" required>
                @if($errors->has('video_url'))
                    <p class="text-red-500 text-sm mt-1">{{ $errors->first('video_url') }}</p>
                @endif
            </div>

            <div class="mb-4 hidden">
                <label for="rating" class="block text-sm font-medium text-gray-600">Rating:</label>
                <select id="rating" name="rating" class="mt-1 p-2 w-full border rounded-md {{ $errors->has('rating') ? 'border-red-500' : 'border-gray-300' }}" required>
                    {{-- <option value="" disabled selected>Select Rating</option> --}}
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5" selected>5</option>
                </select>
                @if($errors->has('rating'))
                    <p class="text-red-500 text-sm mt-1">{{ $errors->first('rating') }}</p>
                @endif
            </div>

            <!-- Image Upload -->
            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-600">Image:</label>
                <input type="file" id="image" name="image" class="mt-1 p-2 w-full border rounded-md {{ $errors->has('image') ? 'border-red-500' : 'border-gray-300' }}" required>
                @if($errors->has('image'))
                    <p class="text-red-500 text-sm mt-1">{{ $errors->first('image') }}</p>
                @endif
            </div>

            <!-- Save Button -->
            <div class="mb-4">
                <button type="submit" class="bg-gray-500 hover:bg-gray-700 text-white py-2 px-4 rounded transition duration-300">Add Class</button>
            </div>
        </form>
    </div>
</x-app-layout>
