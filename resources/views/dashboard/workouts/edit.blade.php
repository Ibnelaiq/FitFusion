<x-app-layout>
    <div class="mt-4 p-6 max-w-[80%] mx-auto bg-white rounded shadow-md">

        <h2 class="text-2xl font-semibold mb-4">Edit Workout: {{ $workout->name }}</h2>

        <form method="POST" action="{{ route('workouts.update', ['workout' => $workout]) }}">
            @csrf
            @method('PUT')

            <!--  Name -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-600">Name:</label>
                <input type="text" id="name" name="name" value="{{ $workout->name }}" class="mt-1 p-2 w-full border rounded-md">
            </div>

            <!-- Class Description -->
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-600">Description:</label>
                <textarea id="description" name="description" class="mt-1 p-2 w-full border rounded-md">{{ $workout->description }}</textarea>
            </div>

            <!-- Class Price -->
            <div class="mb-4">
                <label for="price" class="block text-sm font-medium text-gray-600">Video URL:</label>
                <input type="text" id="price" name="video_url" value="{{ $workout->video_url }}" class="mt-1 p-2 w-full border rounded-md">
            </div>

            <!-- Class Duration -->

            <div class="mb-4">
                <button type="submit" class="bg-gray-500 hover:bg-gray-700 text-white py-2 px-4 rounded transition duration-300">Save Changes</button>

        </form>
            </div>

            <div class="w-100 mb-4">

                <form method="POST" class="flex" action="{{ route('workoutsMuscles.store', ['workouts' => $workout]) }}">
                    @csrf

                    <div class="mb-4 flex-1">
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

                    <div class="mb-4 flex-1">
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
                    <div class="flex-1">
                        <button type="submit" class="w-1/3 bg-gray-500 hover:bg-gray-700 text-white py-2 px-4 rounded transition duration-300">Add Muscle</button>
                    </div>
                </form>
            </div>

            <table class="min-w-full text-left text-sm font-light">
                <thead class="border-b font-medium dark:border-neutral-500">
                <tr>
                    <th scope="col" class="px-6 py-4">#</th>
                    <th scope="col" class="px-6 py-4">Code</th>
                    <th scope="col" class="px-6 py-4">Action</th>
                </tr>
                </thead>
                <tbody>


            @foreach ($workout->activatedMuscles as $muscles)
            <tr class="border-b-2 p-16" >
                <td> {{ $muscles->id }} </td>
                <td> {{ $muscles->code }} </td>
                <td>
                    <a href="{{ route('workoutsMuscles.destroy', ['workoutsMuscle'=>$muscles]) }}" class="delete-btn">
                        <button
                        class="bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded transition duration-300 "
                        >Delete</button>
                    </a>
                </td>
            </tr>
            @endforeach


        </tbody>
    </table>

            <!-- Save Button -->

    </div>

    <script>
       document.addEventListener('DOMContentLoaded', function() {
        // Find all elements with class 'delete-btn'
        var deleteButtons = document.querySelectorAll('.delete-btn');

        // Attach event listener to each delete button
        deleteButtons.forEach(function(button) {
            button.addEventListener('click', function(event) {
                event.preventDefault(); // Prevent the link from being followed immediately

                // Display SweetAlert prompt
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'You won\'t be able to revert this!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#6b7280',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    // If user confirms, perform AJAX request to delete the item
                    if (result.isConfirmed) {
                        fetch(button.href, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}', // Laravel CSRF token
                                'Content-Type': 'application/json',
                                'Accept': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            // Handle the response data, e.g., show a success message
                            if (data.success) {
                                Swal.fire(
                                    'Deleted!',
                                    'Class Slot has been deleted.',
                                    'success'
                                ).then(function(){
                                    window.location.reload();
                                });

                                // You can also update the UI here if needed
                            } else {
                                Swal.fire(
                                    'Error!',
                                    'Something went wrong.',
                                    'error'
                                );
                            }
                        })
                        .catch(error => {
                            // Handle errors, e.g., show an error message
                            Swal.fire(
                                'Error!',
                                'Something went wrong.',
                                'error'
                            );
                        });
                    }
                });
            });
        });
    });
    </script>


</x-app-layout>
