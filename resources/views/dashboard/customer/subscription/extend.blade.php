<x-app-layout>
    <div class="mt-8 p-6 max-w-6xl mx-auto bg-white rounded-lg shadow-md">

        <!-- Display Previous Expiry Date -->
        <p class="text-gray-700 mb-4">Current Expiry Date: {{ $membership->expiry_date }}</p>

        <!-- Form for Extending Membership -->
        <form action="{{ route('customer.membership.extend', ['membership' => $membership->id]) }}" method="POST" class="mb-4">
            @csrf

            <!-- Number of Days to Extend -->
            <label for="daysToExtend" class="block text-gray-700 font-semibold mb-2">Number of Days to Extend:</label>
            <input type="number" id="daysToExtend" name="days_to_extend" class="border border-gray-300 rounded-md p-2 w-full {{ $errors->has('days_to_extend') ? 'border-red-500' : 'border-gray-300' }}" value="30" oninput="calculateNewExpiryDate(this.value)">
            @if($errors->has('days_to_extend'))
                <p class="text-red-500 text-sm mt-1">{{ $errors->first('days_to_extend') }}</p>
            @endif
            <!-- Updated Expiry Date (Displayed by JavaScript) -->
            <p class="text-gray-700 mt-2" id="updatedExpiryDate">Updated Expiry Date: </p>

            <!-- Submit Button -->
            <button type="submit" class="bg-gray-500 hover:bg-gray-700 text-white py-2 px-4 mt-4 rounded transition duration-300 ease-in-out">
                Extend
            </button>
        </form>

    </div>

    <!-- JavaScript Function to Calculate Updated Expiry Date -->
    <script>

    function calculateNewExpiryDate(daysToExtend) {
            const initialDaysToExtend = parseInt(daysToExtend) || 0; // Ensure it's a valid number
            const previousExpiryDate = new Date("{{ $membership->expiry_date }}");
            const millisecondsInDay = 24 * 60 * 60 * 1000;
            const newExpiryDate = new Date(previousExpiryDate.getTime() + (initialDaysToExtend * millisecondsInDay));

            // Format newExpiryDate as desired (e.g., MM/DD/YYYY)
            // const formattedNewExpiryDate = `${newExpiryDate.getMonth() + 1}/${newExpiryDate.getDate()}/${newExpiryDate.getFullYear()}`;
            const formattedNewExpiryDate = `${newExpiryDate.getFullYear()}-${newExpiryDate.getMonth() + 1}-${newExpiryDate.getDate()}`;

            // Display updated expiry date
            document.getElementById("updatedExpiryDate").innerText = `Updated Expiry Date: ${formattedNewExpiryDate}`;
        }

        // Calculate and display the initial expiry date on page load
        calculateNewExpiryDate(document.getElementById("daysToExtend").value);
    </script>
</x-app-layout>
