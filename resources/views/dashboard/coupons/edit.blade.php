@push("pageCustomScript")
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css')}}">
<style>

    .select2-container{
        width: auto!important;
        flex: 1;
    }
</style>
@endpush

<x-app-layout>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-0"><span class="text-light"> Class /</span> Edit </h5>

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

            <!-- Video URL  -->
            <div class="mb-4">
                <label for="video_url" class="block text-sm font-medium text-gray-600">Video URL:</label>
                <input type="text" id="video_url" name="video_url" value="{{ $class->video_url }}" class="mt-1 p-2 w-full border rounded-md">
            </div>

            <!-- Class Rating -->
            <div class="mb-4">
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
        </form>
            </div>
            <hr>

            <div class="container">

                <form method="POST" action="{{ route('classesTimings.store', ['class' => $class]) }}">
                    @csrf
                    <div class="input-group">
                        <select id="rating" name="slot" class="form-control"  aria-describedby="add-class-timing" style="flex: 1;">
                            @foreach ($classesSlots as $slot)
                                <option value="{{ $slot->id}}" > {{ $slot->start }} - {{$slot->end}}</option>
                            @endforeach
                        </select>

                        <button type="submit"
                        class="btn btn-outline-primary waves-effect"
                        id="add-class-timing"
                        >Add Class Timings</button>
                    </div>
                </form>
            </div>

            <div class="container">
                <table class="table">
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
                            class="btn btn-outline-danger"
                            >Delete</button>
                        </a>
                    </td>
                </tr>
                @endforeach


            </tbody>
        </table>

            </div>

            <!-- Save Button -->
            <br>
    </div>

    <br> <br>

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

@push("pageCustomScript")
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script>
         $('#rating').select2();
    </script>
@endpush

</x-app-layout>
