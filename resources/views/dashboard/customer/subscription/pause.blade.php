    <x-app-layout>

        <div class="container">

            <div class="card mb-4">

                <h5 class="card-header">Pause Customer's Subscription</h5>
                <div class="container">

                    <form action="{{ route('customer.membership.pause', ['membership' => $membership->id]) }}"
                        method="POST">
                        @csrf

                        <div class="mb-4">
                            <label for="pause_date" class="block text-sm font-medium text-gray-600 mb-2">Pause Membership
                                From:</label>
                            <input type="date" id="pause_date" name="pause_date"
                                class="form-control @error('pause_date') border-red-500 @enderror"
                                value="{{ now()->toDateString() }}" min="{{ now()->toDateString() }}"
                                max="{{ $membership->expiry_date->toDateString() }}" required oninput="calculateDays()">
                            @error('pause_date')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="reason" class="block text-sm font-medium text-gray-600 mb-2">Reason for
                                Pause:</label>
                            <textarea id="reason" name="reason" rows="4"
                                class="border-gray-300 rounded-md p-2 w-full @error('reason') border-red-500 @enderror" required></textarea>
                            @error('reason')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <label id="daysSavedMessage" class="block text-sm font-medium text-gray-600 mb-2"></label>


                        <button type="submit" class="btn btn-primary">
                            Pause Membership
                        </button>

                </div>
                </form>

                <br>

                <br>

            </div>
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
