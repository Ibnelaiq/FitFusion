<x-app-layout>
    <div class="mt-8 p-6 max-w-6xl mx-auto bg-white rounded-lg shadow-md">
        <form action="{{ route('customer.membership.create', ['customer' => $customer->id]) }}" method="POST">
            @csrf
            <p class="text-lg font-semibold mb-4">Create New Membership</p>

            <div class="mb-4">
                <label for="membership_type" class="block text-sm font-medium text-gray-600 mb-2">Membership Duration:</label>
                <select id="membership_duration" name="membership_duration" class="border-gray-300 rounded-md p-2 w-full" required>
                    <option selected disabled value="">Select</option>
                    <option value="1">1 Day</option>
                    <option value="3">3 Days</option>
                    <option value="7">7 Days</option>
                    <option value="10">10 Days</option>
                    <option value="15">15 Days</option>
                    <option value="30">1 Month</option>
                </select>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-600 mb-2">Expiry Date:</label>
                <span id="expiryDateSpan"></span>
            </div>

            <!-- Add more fields for membership details if necessary -->

            <button type="submit" class="bg-slate-500 hover:bg-slate-700 text-white py-2 px-4 rounded">
                Create Membership
            </button>
        </form>
        <script>
            document.getElementById("membership_duration").addEventListener("change", function() {
                var selectedDuration = parseInt(this.value);
                var currentDate = new Date();
                var expiryDate = new Date();
                expiryDate.setDate(currentDate.getDate() + selectedDuration); // Adding selected days to the current date

                // Format expiryDate to 'YYYY-MM-DD' format for display
                var formattedExpiryDate = expiryDate.toISOString().split('T')[0];
                document.getElementById("expiryDateSpan").textContent = formattedExpiryDate;
            });
        </script>
    </div>
</x-app-layout>
