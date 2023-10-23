<x-app-layout>
    <div class="mt-4 p-6 max-w-2xl mx-auto bg-white rounded shadow-md">
        <h2 class="text-2xl font-semibold mb-4">Customer Detail:</h2>
        <p><strong>ID:</strong> {{ $customer->id }}</p>
        <p><strong>Name:</strong> {{ $customer->name }}</p>
        <p><strong>Surname:</strong> {{ $customer->surname }}</p>
        <p><strong>Phone Number:</strong> {{ $customer->phone_number }}</p>
        <p><strong>Passport or ID:</strong> {{ $customer->passport_or_id }}</p>
        <p><strong>Birth Date:</strong> {{ $customer->birth_date }}</p>
    </div>
</x-app-layout>
