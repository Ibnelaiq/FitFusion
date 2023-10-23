<x-app-layout>
    <div class="flex flex-row gap-5 p-10">
        <a href="{{ route('customer.searchPayment') }}">
            <div class="flex-1 bg-red-600 text-center p-4">
                <i class="fa-solid fa-cash-register text-white text-4xl"></i>
                <p class="text-white text-2xl">Confirm Customer Payment</p>
            </div>
        </a>
        <a href="{{ route('customer.searchDetails') }}">
            <div class="flex-1 bg-red-600 text-center p-4">
                <i class="fa-solid fa-user text-white text-4xl"></i>
                <p class="text-white text-2xl">User Details</p>
            </div>
        </a>
        <div class="flex-1 bg-red-600 text-center p-4">
            <i class="fa-solid fa-cash-register text-white text-4xl"></i>
            <p class="text-white text-2xl">Confirm Payment</p>
        </div>
        <div class="flex-1 bg-red-600 text-center p-4">
            <i class="fa-solid fa-cash-register text-white text-4xl"></i>
            <p class="text-white text-2xl">Confirm Payment</p>
        </div>
        <div class="flex-1 bg-red-600 text-center p-4">
            <i class="fa-solid fa-cash-register text-white text-4xl"></i>
            <p class="text-white text-2xl">Confirm Payment</p>
        </div>
    </div>
</x-app-layout>
