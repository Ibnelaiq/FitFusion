<x-app-layout>
    <div class="mt-4 p-6 max-w-[80%] mx-auto bg-white rounded shadow-md">

        <h2 class="text-2xl font-semibold mb-4">Add New Slot</h2>

        <form method="POST" action="{{ route('slots.store') }}">
            @csrf

            <!-- Name -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-600">Start:</label>
                <input type="text" id="name" name="start" class="mt-1 p-2 w-full border rounded-md {{ $errors->has('start') ? 'border-red-500' : 'border-gray-300' }}" required>
                @if($errors->has('start'))
                    <p class="text-red-500 text-sm mt-1">{{ $errors->first('start') }}</p>
                @endif
            </div>

            <!-- Description -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-600">End:</label>
                <input type="text" id="name" name="end" class="mt-1 p-2 w-full border rounded-md {{ $errors->has('End') ? 'border-red-500' : 'border-gray-300' }}" required>
                @if($errors->has('start'))
                    <p class="text-red-500 text-sm mt-1">{{ $errors->first('end') }}</p>
                @endif
            </div>


            <!-- Save Button -->
            <div class="mb-4">
                <button type="submit" class="bg-gray-500 hover:bg-gray-700 text-white py-2 px-4 rounded transition duration-300">Add Slot</button>
            </div>
        </form>
    </div>
</x-app-layout>
