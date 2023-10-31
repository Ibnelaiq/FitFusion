<x-app-layout>

    <div class="mt-4 p-6 max-w-[80%] mx-auto bg-white rounded shadow-md">
        <h2 class="text-2xl font-semibold mb-4">Products:</h2>

        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                <table class="min-w-full text-left text-sm font-light">
                    <thead class="border-b font-medium dark:border-neutral-500">
                    <tr>
                        <th scope="col" class="px-6 py-4">#</th>
                        <th scope="col" class="px-6 py-4">View</th>
                        <th scope="col" class="px-6 py-4">Status</th>
                        <th scope="col" class="px-6 py-4">Action </th>
                    </tr>
                    </thead>
                    <tbody>
                <!-- Class Cards -->
                @foreach($sliders as $slider)

                <tr class="border-b dark:border-neutral-500">
                    <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $slider->id }}</td>
                    <td class="whitespace-nowrap px-6 py-4">
                        <a href="{{ $slider->url }}" target="_blank" class="text-green-700"> <b> View </b>  </a>
                    </td>
                    <td class="whitespace-nowrap px-6 py-4">
                        @if ($slider->status == 1)
                            <p class="text-green-500"> ACTIVE </p>
                        @else
                        <p class="text-red-500"> INACTIVE </p>
                        @endif
                    </td>

                    <td class="whitespace-nowrap px-6 py-4">
                        @if ($slider->status == 1)
                            <a href="{{ route('slider.status', ['slider'=> $slider, 'flag' => 2]) }}">
                                <button type="button" class="flex-shrink-0 bg-red-500 hover:bg-red-700 border-red-500 hover:border-red-700 text-sm border-4 text-white py-1 px-2 rounded">Inactive</button>
                            </a>
                        @else
                            <a href="{{ route('slider.status', ['slider'=> $slider, 'flag' => 1]) }}">
                                <button type="button" class="flex-shrink-0 bg-green-500 hover:bg-green-700 border-green-500 hover:border-green-700 text-sm border-4 text-white py-1 px-2 rounded">Active</button>
                            </a>
                        @endif


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
