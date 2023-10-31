<x-app-layout>
    <div class="mt-4 p-6 max-w-[80%] mx-auto bg-white rounded shadow-md">

        <h2 class="text-2xl font-semibold mb-4">Add New Workout</h2>

        <form method="POST" action="{{ route('workouts.store') }}" enctype="multipart/form-data">
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
                <label for="price" class="block text-sm font-medium text-gray-600">Video URL:</label>
                <input type="text" id="price" name="video_url" class="mt-1 p-2 w-full border rounded-md {{ $errors->has('video_url') ? 'border-red-500' : 'border-gray-300' }}" required>
                @if($errors->has('video_url'))
                    <p class="text-red-500 text-sm mt-1">{{ $errors->first('video_url') }}</p>
                @endif
            </div>

            <div class="mb-4">
                <label for="dropdownF" class="block text-sm font-medium text-gray-600">Dropdown F:</label>
                <select id="dropdownF" name="dropdownF" class="mt-1 p-2 w-full border rounded-md {{ $errors->has('dropdownF') ? 'border-red-500' : 'border-gray-300' }}" required>
                    <option value="" disabled selected>Select Option</option>
                    @for ($i = 1; $i <= 25; $i++)
                        <option value="F{{ $i }}">F{{ $i }}</option>
                    @endfor
                </select>
                @if($errors->has('dropdownF'))
                    <p class="text-red-500 text-sm mt-1">{{ $errors->first('dropdownF') }}</p>
                @endif
            </div>

            <div class="mb-4">
                <label for="dropdownB" class="block text-sm font-medium text-gray-600">Dropdown B:</label>
                <select id="dropdownB" name="dropdownB" class="mt-1 p-2 w-full border rounded-md {{ $errors->has('dropdownB') ? 'border-red-500' : 'border-gray-300' }}" required>
                    <option value="" disabled selected>Select Option</option>
                    @for ($i = 1; $i <= 20; $i++)
                        <option value="B{{ $i }}">B{{ $i }}</option>
                    @endfor
                </select>
                @if($errors->has('dropdownB'))
                    <p class="text-red-500 text-sm mt-1">{{ $errors->first('dropdownB') }}</p>
                @endif
            </div>

            <!-- Image Upload -->
            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-600">Image:</label>
                <input type="file" id="image" name="image_url" class="mt-1 p-2 w-full border rounded-md {{ $errors->has('image_url') ? 'border-red-500' : 'border-gray-300' }}" required>
                @if($errors->has('image_url'))
                    <p class="text-red-500 text-sm mt-1">{{ $errors->first('image_url') }}</p>
                @endif
            </div>

            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-600">Detail Images:</label>
                <input type="file" id="image" name="details_images[]" multiple class="mt-1 p-2 w-full border rounded-md {{ $errors->has('details_images') ? 'border-red-500' : 'border-gray-300' }}" required>
                @if($errors->has('image_url'))
                    <p class="text-red-500 text-sm mt-1">{{ $errors->first('details_images') }}</p>
                @endif
            </div>

            <!-- Save Button -->
            <div class="mb-4">
                <button type="submit" class="bg-gray-500 hover:bg-gray-700 text-white py-2 px-4 rounded transition duration-300">Add Workout</button>
            </div>
        </form>
    </div>
</x-app-layout>
