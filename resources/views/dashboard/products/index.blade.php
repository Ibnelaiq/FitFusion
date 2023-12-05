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
                                    <h5 class="card-title mb-0"><span class="text-light"> Products /</span> All</h5>
                                </div>
                                <div class="dt-action-buttons text-end pt-3 pt-md-0">
                                    <div class="dt-buttons btn-group flex-wrap">
                                        <a href="{{ route('products.create') }}">
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
                                        <th>Current Stock</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->stock() }}</td>
                                        <td>

                                            <a href="{{ route('products.show', ['product'=> $product]) }}">
                                                <button type="button" class="btn btn-sm btn-outline-primary">Details</button>
                                            </a>
                                            <a href="{{ route('products.edit', ['product'=> $product]) }}">
                                                <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                            </a>
                                            <a href="{{ route('products.destroy', ['product'=> $product]) }}" class="delete-btn">
                                                <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                            </a>
                                        </td>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Modal to add new record -->
                <div class="offcanvas offcanvas-end" id="add-new-record">
                    <div class="offcanvas-header border-bottom">
                        <h5 class="offcanvas-title" id="exampleModalLabel">New Record</h5>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </div>
                </div>
                <!--/ DataTable with Buttons -->

                <hr class="my-5">

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
                                 'Product has been deleted.',
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


