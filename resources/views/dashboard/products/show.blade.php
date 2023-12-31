<x-app-layout>



        <div class="container-xxl flex-grow-1 container-p-y">
            <h5 class="card-title mb-0"><span class="text-light"> Products /</span> Detail</h5>

            <div class="row">
                <!-- Categories -->
                <div class="col-xl-3 col-lg-4 col-md-4 mb-lg-0 mb-4">
<hr>
                    <div class="nav nav-pills flex-column" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <button class="nav-link active" id="details-tab" data-bs-toggle="pill" data-bs-target="#details" type="button" role="tab" aria-controls="details" aria-selected="true">Product Details</button>
                        <button class="nav-link" id="stock-tab" data-bs-toggle="pill" data-bs-target="#stock" type="button" role="tab" aria-controls="stock" aria-selected="false">Product Stock</button>
                    </div>
                </div>
                <!-- /Categories -->

                <!-- Article list -->
                <div class="col-xl-9 col-lg-8 col-md-8">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="details" role="tabpanel" aria-labelledby="details-tab">
                            <div class="card mb-4 overflow-hidden">
                                <div class="card-body">
                                    <h4 class="d-flex align-items-center">
                                        <span class="badge bg-label-secondary p-2 rounded me-3">
                                            <i class="ti ti-box ti-md"></i>
                                        </span>
                                        {{ $product->name }}
                                    </h4>
                                    <img src="{{ asset("/storage/".$product->image_url) }}" class="img-fluid float-md-end" alt="{{ $product->name }}"/>

                                    <ul class="list-unstyled my-4">
                                        <li class="mb-3">
                                            <div class="d-flex">
                                                <p><strong>Current Stock:</strong> {{ $product->stock() }}</p>
                                            </div>
                                        </li>
                                        <li class="mb-3">
                                            <div class="d-flex">
                                                <p><strong>Product Description:</strong> {{ $product->description }}</p>
                                            </div>
                                        </li>
                                        <li class="mb-3">
                                            <div class="d-flex">
                                                <p><strong>Created:</strong> {{ $product->created_at }}</p>
                                            </div>
                                        </li>
                                    </ul>

                                    <a class="btn btn-label-primary" href="{{ route('products.index') }}">
                                        <i class="ti ti-chevron-left scaleX-n1-rtl me-1 me-1"></i>
                                        <span class="align-middle">Back</span>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="stock" role="tabpanel" aria-labelledby="stock-tab">
                            <div class="card mb-4 overflow-hidden">
                                <div class="card-body">
                                    <table class="min-w-full text-left text-sm font-light">
                                        <thead class="border-b font-medium dark:border-neutral-500">
                                        <tr>
                                            <th scope="col" class="px-6 py-4 text-center">#</th>
                                            <th scope="col" class="px-6 py-4 text-center">Quantity</th>
                                            <th scope="col" class="px-6 py-4 text-center">Customer</th>
                                            <th scope="col" class="px-6 py-4 text-center">Created At</th>
                                        </tr>
                                        </thead>
                                        <tbody>


                                    @foreach ($product->stockHistory as $history)

                                    <tr class="border-b-2 p-4" >


                                        <td class="p-4 text-center"> {{ $history->id }} </td>
                                        <td class="p-4 text-center {{ $history->quantity > 0 ? 'text-green-500' : 'text-red-500' }}">
                                            {{ $history->quantity > 0 ? "+" : "" }} {{ $history->quantity }}
                                        </td>
                                        <td class="p-4 text-center">
                                            @if ($history->customer)
                                                {{ $history->customer->surname . " " . $history->customer->name  }}
                                            @else
                                                <span class="text-gray-500"> No Customer Added</span>
                                            @endif
                                        </td>

                                        <td class="p-4 text-center"> {{ $history->created_at }} </td>

                                    </tr>
                                    @endforeach


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Article list -->
            </div>
        </div>

</x-app-layout>
