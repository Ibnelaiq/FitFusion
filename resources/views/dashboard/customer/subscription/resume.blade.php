<x-app-layout>
    <div class="mt-8 p-6 max-w-6xl mx-auto bg-white rounded-lg shadow-md">
        <form action="{{ route('customer.membership.resume', ['membership' => $membership->id]) }}" method="POST">
            @csrf
            <p class="text-lg font-semibold mb-4">Un Pause Membership</p>

            <div class="mb-4">
                <label for="pause_date" class="block text-sm font-medium text-gray-600 mb-2">Un Pause Membership For:</label>
                {{ $membership->balance_days}} Days
                @error('pause_date')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"  class="bg-green-800 hover:bg-green-700 text-white py-2 px-4 rounded">
                Unpause Membership
            </button>
        </form>
    </div>


    <script>
        function calculateDays() {
            // Get the pause date from the input field
            var pauseDateInput = document.getElementById("pause_date").value;

            // Convert the pause date string to a JavaScript Date object
            var pauseDate = new Date(pauseDateInput);

            // Get the membership's expiry date from your backend or set it in JavaScript
            // For example, if expiryDate is a string in the format 'YYYY-MM-DD':
            var expiryDate = new Date("{{ $membership->expiry_date }}");

            // Calculate the difference in milliseconds between pause date and expiry date
            var timeDifference = expiryDate.getTime() - pauseDate.getTime();

            // Calculate the number of days
            var daysDifference = Math.ceil(timeDifference / (1000 * 3600 * 24));

            // Display the number of days
            var daysSavedMessage = document.getElementById("daysSavedMessage");
            daysSavedMessage.innerText = "Number of days saved: " + daysDifference;
        }

        calculateDays();

    </script>
</x-app-layout>
