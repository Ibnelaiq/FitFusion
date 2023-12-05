<x-app-layout>
    <div class="container-xxl flex-grow-1 container-p-y">

        <!-- DataTable with Buttons -->
        <div class="card">
            <div class="card-datatable table-responsive pt-0">
                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                    <div class="card-header flex-column flex-md-row">
                        <div class="head-label text-center">
                            <h5 class="card-title mb-0"><span class="text-light"> Customers /</span> Detail</h5>
                        </div>

                    </div>

                <div class="container">
        <p><strong>ID:</strong> {{ $customer->id }}</p>
        <p><strong>Name:</strong> {{ $customer->name }}</p>
        <p><strong>Surname:</strong> {{ $customer->surname }}</p>
        <p><strong>Phone Number:</strong> {{ $customer->phone_number }}</p>
        <p><strong>Passport or ID:</strong> {{ $customer->passport_or_id }}</p>
        <p><strong>Birth Date:</strong> {{ $customer->birth_date }}</p>
    </div>
</x-app-layout>
