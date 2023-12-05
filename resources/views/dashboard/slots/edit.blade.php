<x-app-layout>

                <div class="container">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mb-0"><span class="text-light"> Slot /</span> Edit </h5>

                    <form method="POST" action="{{ route('slots.update', ['slot' => $slot]) }}">
                        @csrf
                        @method('PUT')

                        <!--  Name -->
                        <div class="mb-4">
                            <label for="name">Start:</label>
                            <input type="text" id="name" name="start" value="{{ $slot->start }}" class="mt-1 p-2 w-full border rounded-md">
                        </div>

                        <div class="mb-4">
                            <label for="name">End:</label>
                            <input type="text" id="name" name="end" value="{{ $slot->end }}" class="mt-1 p-2 w-full border rounded-md">
                        </div>

                        <!-- Class Rating -->
                        <div class="mb-4">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                        </div>
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
