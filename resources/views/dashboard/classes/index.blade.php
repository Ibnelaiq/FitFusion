<x-app-layout>
    <div class="container-xxl flex-grow-1 container-p-y">

        <!-- DataTable with Buttons -->
        <div class="card">
            <div class="card-datatable table-responsive pt-0">
                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                    <div class="card-header flex-column flex-md-row">
                        <div class="head-label text-center">
                            <h5 class="card-title mb-0"><span class="text-light"> Classes /</span> All</h5>
                        </div>
                        <div class="dt-action-buttons text-end pt-3 pt-md-0">
                            <!-- Add New Class Button -->
                            <div class="dt-buttons btn-group flex-wrap">
                                <a href="{{ route('classes.create') }}">
                                    <button class="btn btn-secondary create-new btn-primary" tabindex="0"
                                            aria-controls="DataTables_Table_0" type="button">
                                        <span><i class="ti ti-plus me-sm-1"></i> <span
                                                class="d-none d-sm-inline-block">Add New Record</span></span>
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Classes Table -->
                    <table class="min-w-full text-left text-sm font-light datatables-basic table dataTable no-footer dtr-column"
                           id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" style="width: 100%;">
                        <thead class="border-b font-medium dark:border-neutral-500">
                        <tr>
                            <th scope="col" class="px-6 py-4">#</th>
                            <th scope="col" class="px-6 py-4">Name</th>
                            <th scope="col" class="px-6 py-4">Description</th>
                            <th scope="col" class="px-6 py-4">Price</th>
                            <th scope="col" class="px-6 py-4">Duration</th>
                            <th scope="col" class="px-6 py-4">Status</th>
                            <th scope="col" class="px-6 py-4">Slots</th>
                            <th scope="col" class="px-6 py-4">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <!-- Class Cards -->
                        @foreach($classes as $class)
                            <tr class="border-b dark:border-neutral-500">
                                <td class=" font-medium">{{ $class->id }}</td>
                                <td class="">{{ $class->name }}</td>
                                <td class="">{{ $class->description }}</td>
                                <td class="">${{ $class->price }}</td>
                                <td class="">{{ $class->duration }}</td>
                                <td>
                                    <p class=" badge {{$class->status == 1 ? "bg-label-success" : "bg-label-danger"}}"</p>
                                    {{ $class->status == 1 ? "Active" : "Inactive"}}
                                </td>
                                <td class="">
                                    @foreach ($class->timings as $timing)
                                        <p class="badge badge-sm bg-label-primary">
                                            <span>
                                                {{ $timing->slot->start }}
                                                -
                                            </span>
                                            <span>
                                                {{ $timing->slot->end }}
                                            </span>
                                        </p>
                                    @endforeach
                                </td>

                                <td class="whitespace-nowrap px-6 py-4">
                                    <!-- Detail Button -->
                                    <a href="{{ route('classes.show', ['class'=> $class]) }}">
                                        <button type="button" class="btn btn-sm btn-outline-primary">Detail</button>
                                    </a>

                                    <!-- Edit Button -->
                                    <a href="{{ route('classes.edit', ['class'=> $class]) }}">
                                        <button type="submit" class="btn btn-sm btn-outline-secondary">Edit</button>
                                    </a>

                                    <!-- Delete Button -->
                                    <a href="{{ route('classes.destroy', ['class'=> $class]) }}" class="delete-btn">
                                        <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                    </a>

                                    @if ($class->status == 1)
                                        <!-- Inactive Button -->
                                        <a href="{{ route('classes.inactive', ['class'=> $class]) }}">
                                            <button type="submit" class="btn btn-sm btn-outline-danger">Mark Inactive</button>
                                        </a>
                                    @else
                                        <!-- Active Button -->
                                        <a href="{{ route('classes.active', ['class'=> $class]) }}">
                                            <button type="submit" class="btn btn-sm btn-outline-success">Mark Active</button>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--/ DataTable with Buttons -->

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
                                 'Gym Class has been deleted.',
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

