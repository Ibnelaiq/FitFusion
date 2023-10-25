<x-app-layout>
    <div class="mt-4 p-6 max-w-[80%] mx-auto bg-white rounded shadow-md">
        <h2 class="text-2xl font-semibold mb-4">Classes:</h2>

        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                <table class="min-w-full text-left text-sm font-light">
                    <thead class="border-b font-medium dark:border-neutral-500">
                    <tr>
                        <th scope="col" class="px-6 py-4">#</th>
                        <th scope="col" class="px-6 py-4">Name</th>
                        <th scope="col" class="px-6 py-4">Description</th>
                        <th scope="col" class="px-6 py-4">Price</th>
                        <th scope="col" class="px-6 py-4">Duration  </th>
                        <th scope="col" class="px-6 py-4">Slots </th>
                        <th scope="col" class="px-6 py-4">Action </th>
                    </tr>
                    </thead>
                    <tbody>
                <!-- Class Cards -->
                @foreach($classes as $class)

                <tr class="border-b dark:border-neutral-500">
                    <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $class->id }}</td>
                    <td class="whitespace-nowrap px-6 py-4">{{ $class->name }}</td>
                    <td class="whitespace-nowrap px-6 py-4">{{ $class->description }}</td>
                    <td class="whitespace-nowrap px-6 py-4">${{ $class->price }}</td>
                    <td class="whitespace-nowrap px-6 py-4">{{ $class->duration }}</td>
                    <td class="whitespace-nowrap px-6 py-4">
                    @foreach ($class->timings as $timing)
<p>
    <span class="text-gray-200 text-sm">{{$timing->id}}</span>
                            <span
                            class="inline-block whitespace-nowrap rounded-full bg-green-100 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-success-700"
                            >{{ $timing->slot->start }}</span>
                            <span
                            class="inline-block whitespace-nowrap rounded-full bg-red-100 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-danger-700"
                            >{{ $timing->slot->end }}</span>
</p>
                    @endforeach
                    </td>

                    <td class="whitespace-nowrap px-6 py-4">
                        <a href="{{ route('classes.show', ['class'=> $class]) }}">
                            <button type="button" class="flex-shrink-0 bg-gray-500 hover:bg-gray-700 border-gray-500 hover:border-gray-700 text-sm border-4 text-white py-1 px-2 rounded">Detail</button>
                        </a>
                        <a href="{{ route('classes.edit', ['class'=> $class]) }}">
                        <button type="submit" class="flex-shrink-0 bg-gray-500 hover:bg-gray-700 border-gray-500 hover:border-gray-700 text-sm border-4 text-white py-1 px-2 rounded">Edit</button>
                        </a>

                        <a href="{{ route('classes.destroy', ['class'=> $class]) }}" class="delete-btn">
                            <button type="submit" class="flex-shrink-0 bg-gray-500 hover:bg-gray-700 border-gray-500 hover:border-gray-700 text-sm border-4 text-white py-1 px-2 rounded">Delete</button>
                        </a>
                    </td>

                </tr>
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
