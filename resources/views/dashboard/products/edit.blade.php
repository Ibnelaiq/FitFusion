<x-app-layout>

            <div class="container">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-0"><span class="text-light"> Products /</span> Edit</h5>


                        <form method="POST" action="{{ route('products.update', ['product' => $product]) }}">
                            @csrf
                            @method('PUT')

                            <!--  Name -->
                            <div class="mb-4">
                                <label for="name" class="block text-sm font-medium text-gray-600">Name:</label>
                                <input type="text" id="name" name="name" value="{{ $product->name }}"
                                    class="mt-1 p-2 w-full border rounded-md" required>
                            </div>

                            <!-- Class Description -->
                            <div class="mb-4">
                                <label for="description"
                                    class="block text-sm font-medium text-gray-600">Description:</label>
                                <textarea id="description" name="description" class="mt-1 p-2 w-full border rounded-md">{{ $product->description }}</textarea>
                            </div>

                            <div class="mb-4">
                                <button type="submit"
                                    class="btn btn-primary">Save
                                    Changes</button>

                        </form>
                    </div>
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
                                                ).then(function() {
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
