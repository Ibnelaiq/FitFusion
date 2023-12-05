<x-app-layout>
    <div class="container-xxl flex-grow-1 container-p-y">

        <!-- DataTable with Buttons -->
        <div class="card">
            <div class="card-datatable table-responsive pt-0">
                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                    <div class="card-header flex-column flex-md-row">
                        <div class="head-label text-center">
                            <h5 class="card-title mb-0"><span class="text-light"> Customers /</span> All</h5>
                        </div>

                    </div>

                <div class="container">

                    <form action="{{ route('customer.searchDetails') }}" method="GET">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
                            <input type="date" name="birth_date" class="form-control" placeholder="Search by birth date">
                            <input type="text" name="name" class="form-control" placeholder="Search by name">
                            <input type="text" name="surname" class="form-control" placeholder="Search by surname">
                            <input type="text" name="passport_or_id" class="form-control" placeholder="Search by passport or ID">
                            <input type="text" name="phone_number" class="form-control" placeholder="Search by phone number">
                            <button type="submit" class="btn btn-primary waves-effect">Search</button>

                        </div>
                    </form>

                    <hr>
                    <br>
                    <div class="col-12">
                        <ul class="list-group">
                            @forelse ($customers as $customer)
                                <li class="list-group-item d-flex justify-content-between flex-column flex-sm-row">
                                <div class="offer">
                                  <p class="mb-0 fw-bold">{{ $customer->name }}</p>
                                  <p class="mb-0"> <small>Passport Or ID: <b>{{ $customer->passport_or_id }}</b> </small> </p>
                                  <p class="mb-0"> <small>Phone: <b>{{ $customer->phone_number }}</b> </small> </p>
                                </div>
                                <div class="apply mt-3 mt-sm-0">
                                <a href="{{ route('customer.details', ['customer'=> $customer->id]) }}" class="btn btn-xs btn-outline-primary waves-effect">Show Details</a>
                                <a href="{{ route('customer.subscription', ['customer'=> $customer->id]) }}" class="btn btn-xs btn-outline-primary waves-effect">Subscriptions</a>
                                <a href="{{ route('customer.membership.create', ['customer'=> $customer->id]) }}" class="btn btn-xs btn-outline-primary waves-effect">Add New Subscription</a>

                                <a href="{{ route('products.sale.search', ['customer'=> $customer->id]) }}" class="btn btn-xs btn-outline-primary waves-effect">Create Sale</a>
                            </div>
                              </li>
                            @empty
                            <p class="text-gray-700 mt-4">No results found.</p>
                            @endforelse
                        </ul>
                      </div>
                </div>

        {{-- <div class="mt-8 flex justify-center">
            <div class="w-2/3">
                <div class="grid grid-cols-1 gap-4">
                    @forelse ($customers as $customer)

                        <div class="bg-white rounded-lg shadow-lg p-4 flex flex-wrap justify-between items-center">
                            <h5 class="text-xl font-semibold">{{ $customer->name }}</h5>
                            <div>
                                <a href="{{ route('customer.details', ['customer'=> $customer->id]) }}" class="bg-gray-800 hover:bg-gray-700 text-white py-2 px-4 rounded">Show Details</a>
                                <a href="{{ route('customer.subscription', ['customer'=> $customer->id]) }}" class="bg-gray-800 hover:bg-gray-700 text-white py-2 px-4 rounded">Subscriptions</a>
                                <a href="{{ route('customer.membership.create', ['customer'=> $customer->id]) }}" class="bg-gray-800 hover:bg-gray-700 text-white py-2 px-4 rounded">Add New Subscription</a>

                                <a href="{{ route('products.sale.search', ['customer'=> $customer->id]) }}" class="bg-gray-800 hover:bg-gray-700 text-white py-2 px-4 rounded">Create Sale</a>
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
        </div> --}}
    </div>

</x-app-layout>
