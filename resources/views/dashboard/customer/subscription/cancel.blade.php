<x-app-layout>
    <div class="mt-8 p-6 max-w-6xl mx-auto bg-white rounded-lg shadow-md">

        <p class="text-lg font-semibold mb-4">Are you sure?</p>

        <div class="mb-4">
            <p class="text-gray-600">Expiry Date: {{ $membership->expiry_date }}</p>
            <p class="text-gray-600">This membership has {{ now()->diffInDays($membership->expiry_date) }} days left</p>
        </div>

        <form action="{{ route('customer.membership.cancel', ['membership' => $membership->id]) }}" method="POST">
            @csrf
            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded transition duration-300 ease-in-out">
                Yes, cancel
            </button>
        </form>

    </div>
</x-app-layout>
