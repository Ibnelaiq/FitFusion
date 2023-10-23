<x-app-layout>
    <div class="w-full mt-8">
        <div class="flex justify-center">
            <div class="w-2/3">
                <form action="{{ route('customer.searchDetails') }}" method="GET">
                    <div class="flex items-center border-b border-b-2 border-gray-500 py-2">
                        <input type="date" name="birth_date" class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" placeholder="Search by birth date">
                        <input type="text" name="name" class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" placeholder="Search by name">
                        <input type="text" name="surname" class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" placeholder="Search by surname">
                        <input type="text" name="passport_or_id" class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" placeholder="Search by passport or ID">
                        <input type="text" name="phone_number" class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" placeholder="Search by phone number">

                        <button type="submit" class="flex-shrink-0 bg-gray-500 hover:bg-gray-700 border-gray-500 hover:border-gray-700 text-sm border-4 text-white py-1 px-2 rounded">Search</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="mt-8 flex justify-center">
            <div class="w-2/3">
                <h2 class="text-3xl font-semibold mb-4">Search Results:</h2>
                <div class="grid grid-cols-1 gap-4">
                    @forelse ($customers as $customer)

                        <div class="bg-white rounded-lg shadow-lg p-4 flex flex-wrap justify-between items-center">
                            <h5 class="text-xl font-semibold">{{ $customer->name }}</h5>
                            <div>
                                <a href="{{ route('customer.details', ['customer'=> $customer->id]) }}" class="bg-gray-800 hover:bg-gray-700 text-white py-2 px-4 rounded">Show Details</a>
                                <a href="{{ route('customer.subscription', ['customer'=> $customer->id]) }}" class="bg-gray-800 hover:bg-gray-700 text-white py-2 px-4 rounded">Subscriptions</a>
                                <a href="{{ route('customer.membership.create', ['customer'=> $customer->id]) }}" class="bg-gray-800 hover:bg-gray-700 text-white py-2 px-4 rounded">Add New Subscription</a>
                            </div>

                            <div class="w-full">
                                <h5 class="text-xs text-gray-400 text-muted font-semibold">Passport Or ID: <b>{{ $customer->passport_or_id }}</b></h5>
                                <h5 class="text-xs text-gray-400 font-semibold">Phone: {{ $customer->phone_number }}</h5>
                            </div>
                        </div>
                    @empty
                        <p class="text-gray-700 mt-4">No results found.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
