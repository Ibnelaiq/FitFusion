<x-app-layout>
    <div class="mt-4 p-6 max-w-2xl mx-auto bg-white rounded shadow-md">
        <h2 class="text-2xl font-semibold mb-4">Customer Detail:</h2>
        <p><strong>ID:</strong> {{ $customer->id }}</p>
        <p><strong>Name:</strong> {{ $customer->name }}</p>
        <p><strong>Surname:</strong> {{ $customer->surname }}</p>
        <p><strong>Phone Number:</strong> {{ $customer->phone_number }}</p>
        <p><strong>Passport or ID:</strong> {{ $customer->passport_or_id }}</p>
        <p><strong>Birth Date:</strong> {{ $customer->birth_date }}</p>

        <form action="{{ route('customer.payment', ['customer' => $customer->id]) }}" method="post" class="mt-6">
            @csrf
            <label for="code" class="block text-sm font-medium text-gray-600">Enter 5-Digit Code:</label>
            <input type="text" id="code" name="code" class="mt-1 p-2 block w-full rounded-md border {{ $errors->has('code') ? 'border-red-500' : 'border-gray-300' }} focus:outline-none focus:ring focus:ring-indigo-200" required>
            @if($errors->has('code'))
                <p class="text-red-500 text-sm mt-1">{{ $errors->first('code') }}</p>
            @endif
            <button type="submit" class="mt-4 py-2 px-4 bg-gray-800 hover:bg-gray-700 text-white rounded-md transition duration-300">Submit</button>
        </form>
    </div>
</x-app-layout>
