<x-app-layout>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-0"><span class="text-light"> Slot /</span> Add </h5>

        <form method="POST" action="{{ route('slots.store') }}">
            @csrf

            <!-- Name -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-600">Start:</label>
                <input type="text" id="name" name="start" class="form-control {{ $errors->has('start') ? 'border-red-500' : 'border-gray-300' }}" required>
                @if($errors->has('start'))
                    <p class="text-red-500 text-sm mt-1">{{ $errors->first('start') }}</p>
                @endif
            </div>

            <!-- Description -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-600">End:</label>
                <input type="text" id="name" name="end" class="form-control {{ $errors->has('End') ? 'border-red-500' : 'border-gray-300' }}" required>
                @if($errors->has('start'))
                    <p class="text-red-500 text-sm mt-1">{{ $errors->first('end') }}</p>
                @endif
            </div>


            <!-- Save Button -->
            <div class="mb-4">
                <button type="submit" class="btn btn-primary">Add Slot</button>
            </div>
        </form>
    </div>
</x-app-layout>

