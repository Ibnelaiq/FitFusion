<x-app-layout>
    <div class="container-xxl flex-grow-1 container-p-y">

        <!-- DataTable with Buttons -->
        <div class="card">
            <div class="card-datatable table-responsive pt-0">
                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                    <div class="card-header flex-column flex-md-row">
                        <div class="head-label text-center">
                            <h5 class="card-title mb-0"><span class="text-light"> Coupons /</span> All</h5>
                        </div>
                        <div class="dt-action-buttons text-end pt-3 pt-md-0">
                            <!-- Add New Class Button -->
                            <div class="dt-buttons btn-group flex-wrap">
                                <a href="{{ route('coupons.create') }}">
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
                            <th scope="col" class="px-6 py-4">Code</th>
                            <th scope="col" class="px-6 py-4">Discount Detail</th>
                            <th scope="col" class="px-6 py-4">Duration Detail</th>
                            <th scope="col" class="px-6 py-4">Usage Detail</th>
                            <th scope="col" class="px-6 py-4">Created At</th>
                            <th scope="col" class="px-6 py-4">Last Used At</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($coupons as $copuon)
                            <tr class="border-b dark:border-neutral-500">
                                <td class="font-medium">{{ $copuon->id }}</td>
                                <td class="font-medium">{{ $copuon->code }}</td>
                                <td class="font-medium">{{ $copuon->discount_type() }}</td>
                                <td class="font-medium">${{ $copuon->discount_amount}}</td>
                                <td class="font-medium">
                                    {!! $copuon->usage_detail() !!}
                                </td>
                                <td> {{$copuon->created_at}}</td>
                                <td> {{$copuon->last_used_at ?: "Not Used Yet"}}</td>
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

