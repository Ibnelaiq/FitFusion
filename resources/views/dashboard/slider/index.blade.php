<x-app-layout>

    <!-- Menu -->

    <!-- / Menu -->

    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">

        <!-- DataTable with Buttons -->
        <div class="card">
            <div class="card-datatable table-responsive pt-0">
                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                    <div class="card-header flex-column flex-md-row">
                        <div class="head-label text-center">
                            <h5 class="card-title mb-0"><span class="text-light"> Slider /</span> All</h5>
                        </div>
                        <div class="dt-action-buttons text-end pt-3 pt-md-0">
                            <div class="dt-buttons btn-group flex-wrap">
                                <a href="{{ route('slider.create') }}">
                                    <button
                                        class="btn btn-secondary create-new btn-primary" tabindex="0"
                                        aria-controls="DataTables_Table_0" type="button">
                                        <span><i
                                                class="ti ti-plus me-sm-1"></i> <span
                                                class="d-none d-sm-inline-block">Add New
                                                Record</span></span></button>
                                </a>
                            </div>
                        </div>
                    </div>

                    <table class="datatables-basic table dataTable no-footer dtr-column" id="DataTables_Table_0"
                        aria-describedby="DataTables_Table_0_info" style="width: 383px;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                    <tbody>
                <!-- Class Cards -->
                @foreach($sliders as $slider)

                <tr class="border-b dark:border-neutral-500">
                    <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $slider->id }}</td>
                    <td class="whitespace-nowrap px-6 py-4">
                        <img src="{{ $slider->url }}" width="100">


                    </td>
                    <td class="whitespace-nowrap px-6 py-4">
                        @if ($slider->status == 1)
                            <p class="badge badge-sm bg-success"> ACTIVE </p>
                        @else
                        <p class="badge badge-sm bg-danger"> INACTIVE </p>
                        @endif
                    </td>

                    <td class="whitespace-nowrap px-6 py-4">
                        @if ($slider->status == 1)
                            <a href="{{ route('slider.status', ['slider'=> $slider, 'flag' => 2]) }}">
                                <button type="button"
                                class="btn btn-sm btn-outline-danger">
                                Mark Inactive</button>
                            </a>
                        @else
                            <a href="{{ route('slider.status', ['slider'=> $slider, 'flag' => 1]) }}">
                                <button type="button"
                                class="btn btn-sm btn-outline-success"
                                >Mark Active</button>
                            </a>
                        @endif
                        <a href="{{ $slider->url }}" target="_blank">
                            <button type="button"
                            class="btn btn-sm btn-outline-secondary"
                            >View Image</button>
                        </a>


                    </td>

                {{-- </tr> --}}
                @endforeach

                        </tbody>
                    </table>
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
