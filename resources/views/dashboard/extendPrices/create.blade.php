<x-app-layout>

    <div class="container">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-0"><span class="text-light"> Slider /</span> Add </h5>

        <form method="POST" action="{{ route('slider.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-600">Title:</label>
                <input type="text" id="name" name="title" class="form-control {{ $errors->has('title') ? 'border-red-500' : 'border-gray-300' }}" required>
                @if($errors->has('name'))
                    <p class="text-red-500 text-sm mt-1">{{ $errors->first('title') }}</p>
                @endif
            </div>

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-600">Description:</label>
                <input type="text" id="description" name="description" class="form-control {{ $errors->has('description') ? 'border-red-500' : 'border-gray-300' }}" required>
                @if($errors->has('description'))
                    <p class="text-red-500 text-sm mt-1">{{ $errors->first('description') }}</p>
                @endif
            </div>

            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-600">Image:</label>
                <input type="file" id="image" name="image" class="form-control {{ $errors->has('image') ? 'border-red-500' : 'border-gray-300' }}">
                @if($errors->has('image'))
                    <p class="text-red-500 text-sm mt-1">{{ $errors->first('image') }}</p>
                @endif
            </div>


            <!-- Save Button -->
            <div class="mb-4">
                <button type="submit" class="btn btn-primary">Add Slider</button>
            </div>
        </form>
    </div>
</x-app-layout>
