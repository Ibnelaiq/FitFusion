<x-app-layout>

    <!-- Menu -->

    <!-- / Menu -->

    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">

        <!-- DataTable with Buttons -->
        <div class="card">
                    <div class="card-header flex-column flex-md-row">
                        <div class="head-label">
                            <h5 class="card-title mb-0"><span class="text-light"> Extend Prices /</span> All</h5>
                        </div>
                    </div>
                    <!-- Class Cards -->
                    <div class="container">
                        <div class="col-12">
                            <div class="row pb-2">

                                @foreach ($prices as $price)
                                    <div class="col-md mb-md-0 mb-2">
                                        <div class="form-check custom-option custom-option-icon">
                                            <label class="form-check-label custom-option-content"
                                                for="customRadioBuilder">
                                                <span class="custom-option-body">
                                                    <span class="custom-option-title">
                                                        {{ $price->duration}}
                                                    </span>
                                                    <p class="m-0">Price: {{ $price->price }}</p>
                                                </span>
                                            </label>
                                            <div class="d-flex justify-center py-2">
                                                <button class="btn btn-xs btn-outline-secondary"> Edit </button>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    </div>
    </div>
</x-app-layout>

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
                                        'Slot has been deleted.',
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
