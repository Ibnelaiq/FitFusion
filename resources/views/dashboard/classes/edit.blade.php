<x-app-layout>
    <div class="mt-4 p-6 max-w-[80%] mx-auto bg-white rounded shadow-md">

        <h2 class="text-2xl font-semibold mb-4">Edit Class: {{ $class->name }}</h2>

        <form method="POST" action="{{ route('classes.update', ['class' => $class]) }}">
            @csrf
            @method('PUT')

            <!--  Name -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-600">Name:</label>
                <input type="text" id="name" name="name" value="{{ $class->name }}" class="mt-1 p-2 w-full border rounded-md">
            </div>

            <!-- Class Description -->
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-600">Description:</label>
                <textarea id="description" name="description" class="mt-1 p-2 w-full border rounded-md">{{ $class->description }}</textarea>
            </div>

            <!-- Class Price -->
            <div class="mb-4">
                <label for="price" class="block text-sm font-medium text-gray-600">Price:</label>
                <input type="number" id="price" name="price" value="{{ $class->price }}" class="mt-1 p-2 w-full border rounded-md">
            </div>

            <!-- Class Duration -->
            <div class="mb-4">
                <label for="duration" class="block text-sm font-medium text-gray-600">Duration:</label>
                <input type="text" id="duration" name="duration" value="{{ $class->duration }}" class="mt-1 p-2 w-full border rounded-md">
            </div>

            <!-- Class Rating -->
            <div class="mb-4">
                <label for="rating" class="block text-sm font-medium text-gray-600">Rating:</label>

            </div>
            <div class="mb-4">
                <button type="submit" class="bg-gray-500 hover:bg-gray-700 text-white py-2 px-4 rounded transition duration-300">Save Changes</button>

        </form>
            </div>

            <div class="w-100 mb-4">

                <form method="POST" class="flex" action="{{ route('classesTimings.store', ['class' => $class]) }}">
                    @csrf
                    <select id="rating" name="slot" class="flex mt-1 p-2 w-full border rounded-md">
                        @foreach ($classesSlots as $slot)
                            <option value="{{ $slot->id}}" > {{ $slot->start }} - {{$slot->end}}</option>
                        @endforeach
                    </select>

                    <button type="submit" class="w-1/3 bg-gray-500 hover:bg-gray-700 text-white py-2 px-4 rounded transition duration-300">Add Slot</button>
                </form>
            </div>

            <table class="min-w-full text-left text-sm font-light">
                <thead class="border-b font-medium dark:border-neutral-500">
                <tr>
                    <th scope="col" class="px-6 py-4">#</th>
                    <th scope="col" class="px-6 py-4">Slot Start</th>
                    <th scope="col" class="px-6 py-4">Slot End  </th>
                    <th scope="col" class="px-6 py-4">Action</th>
                </tr>
                </thead>
                <tbody>


            @foreach ($class->timings as $timing)
            <tr class="border-b-2 p-16" >
                <td> {{ $timing->id }} </td>
                <td> {{ $timing->slot->start }} </td>
                <td> {{ $timing->slot->end }} </td>
                <td>
                    <a href="{{ route('classesTimings.destroy', ['classesTiming'=>$timing]) }}" class="delete-btn">
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
