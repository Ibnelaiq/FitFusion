<x-app-layout>

    @push('pageCustomScript')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bs-stepper/bs-stepper.css') }}">
    @endpush

    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="card mb-4">
            <div class="card-body">

                <form action="{{ route('customer.membership.create', ['customer' => $customer->id]) }}" method="POST">
                    @csrf
                    <p class="text-lg font-semibold mb-4">Create New Membership</p>

                    <div class="mb-4">
                        <label for="membership_type" class="block text-sm font-medium text-gray-600 mb-2">Membership
                            Duration:</label>
                        <input type="date" id="membership_duration" class="form-control">
                    </div>
                    <input type="text" name="email" class="d-none" value="{{ $customer->email }}">
                    <input type="text" name="id" class="d-none" value="{{ $customer->id }}">

                    <!-- Add more fields for membership details if necessary -->

                    {{-- <button type="submit" class="btn btn-primary">
                        Create Membership
                    </button> --}}
                    {{-- <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#createApp">

                    </button> --}}

                </form>

            </div>
        </div>
        <div class="modal fade" id="createApp" tabindex="-1" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-simple modal-upgrade-plan">
                <div class="modal-content p-3 p-md-5">
                    <div class="modal-body p-2">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="text-center">
                            <h3 class="mb-2">New Membership</h3>
                            <p>You have selected <b><span class="selectedDays text-bold"></span> days</b>. Kindly select the price. </p>
                        </div>
                        <div id="wizard-create-app" class="bs-stepper vertical mt-2 shadow-none">
                            <div class="bs-stepper-header border-0 p-1">
                                <div class="step crossed" data-target="#prices">
                                    <button type="button" class="step-trigger" aria-selected="false">
                                        <span class="bs-stepper-circle"><i class="ti ti-file-text ti-sm"></i></span>
                                        <span class="bs-stepper-label">
                                            <span class="bs-stepper-title text-uppercase">Pricing</span>
                                            <span class="bs-stepper-subtitle">Select Pricing</span>
                                        </span>
                                    </button>
                                </div>
                                <div class="line"></div>
                                <div class="step" data-target="#customPrice">
                                    <button type="button" class="step-trigger" aria-selected="false">
                                        <span class="bs-stepper-circle"><i class="ti ti-file ti-sm"></i></span>
                                        <span class="bs-stepper-label">
                                            <span class="bs-stepper-title text-uppercase">Custom</span>
                                            <span class="bs-stepper-subtitle">Enter Custom Price</span>
                                        </span>
                                    </button>
                                </div>
                                <div class="line"></div>
                                <div class="step" data-target="#submit">
                                    <button type="button" class="step-trigger" aria-selected="false">
                                        <span class="bs-stepper-circle"><i class="ti ti-check ti-sm"></i></span>
                                        <span class="bs-stepper-label">
                                            <span class="bs-stepper-title text-uppercase">Submit</span>
                                            <span class="bs-stepper-subtitle">Submit</span>
                                        </span>
                                    </button>
                                </div>
                            </div>
                            <div class="bs-stepper-content p-1">
                                <form onsubmit="return false">
                                    <!-- Details -->
                                    <div id="prices" class="content pt-3 pt-lg-0 dstepper-block">

                                        <h6>Found Prices</h6>
                                        <ul class="p-0 m-0">
                                            <li class="d-flex align-items-start mb-3" >
                                                <div class="badge bg-label-info p-2 me-3 rounded">Result</div>
                                                <div class="d-flex justify-content-between w-100">
                                                    <div class="me-2">
                                                        <h6 class="mb-0" id="membership_price">CRM Application</h6>
                                                        <small class="text-muted" ><span class="selectedDays"></span> Days</small>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <div class="form-check form-check-inline">
                                                            <input name="membership_price" class="form-check-input"
                                                                type="radio" value="" checked>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                            <input class="d-none membership_price_id"
                                            type="text" value="0">
                                        <hr>

                                        <div class="mb-3">
                                            <input type="number" class="discount form-control form-control-sm"
                                                placeholder="Enter Discount">
                                        </div>

                                        <div class="col-12 d-flex justify-content-between mt-4">
                                            <button class="btn btn-label-secondary btn-prev waves-effect"
                                                disabled=""> <i class="ti ti-arrow-left ti-xs me-sm-1 me-0"></i>
                                                <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                            </button>
                                            <button class="btn btn-primary btn-next waves-effect waves-light pricing-next"> <span
                                                    class="align-middle d-sm-inline-block d-none me-sm-1">Next</span>
                                                <i class="ti ti-arrow-right ti-xs"></i></button>
                                        </div>
                                    </div>



                                    <!-- billing -->
                                    <div id="customPrice" class="content dstepper-block">
                                        <div id="AppNewCCForm" class="row g-3 pt-3 pt-lg-0" onsubmit="return false">

                                            <div class="col-12 col-md-6">
                                                <input type="text" class="form-control" name="membership_price" placeholder="Enter Custom Price">
                                            </div>

                                            <div class="col-12 col-md-6">
                                                <input type="text" class="discount form-control" placeholder="Enter Custom Discount">
                                            </div>

                                            <div class="col-12 d-none">
                                                <label class="switch">
                                                    <input type="checkbox" class="switch-input" checked="">
                                                    <span class="switch-toggle-slider">
                                                        <span class="switch-on"></span>
                                                        <span class="switch-off"></span>
                                                    </span>
                                                    <span class="switch-label">Save card for future billing?</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-between mt-5">
                                            <button class="btn btn-label-secondary btn-prev waves-effect"> <i
                                                    class="ti ti-arrow-left ti-xs me-sm-1 me-0"></i> <span
                                                    class="align-middle d-sm-inline-block d-none">Previous</span>
                                            </button>
                                            <button class="btn btn-primary btn-next waves-effect waves-light pricing-next" > <span
                                                    class="align-middle d-sm-inline-block d-none me-sm-1">Next</span>
                                                <i class="ti ti-arrow-right ti-xs"></i></button>
                                        </div>
                                    </div>

                                    <!-- submit -->
                                    <div id="submit" class="content text-center pt-3 pt-lg-0 dstepper-block">
                                        <h5 class="mb-2 mt-3">Submit</h5>
                                        <p>Selected Price: <span id="selected_price" class="m-0"></span></p>
                                        <p>Entered Discount: <span id="entered_discount" class="m-0"></span></p>
                                        <hr>
                                        <p class="font-bold">Membership Total: <span id="membership_total" class="m-0"></span></p>
                                        <p>Membership Duration: <span id="membership_duration_text" class="m-0"></span></p>
                                        <!-- image -->

                                        <div class="col-12 d-flex justify-content-between mt-4 pt-2">
                                            <button class="btn btn-label-secondary btn-prev waves-effect"> <i
                                                    class="ti ti-arrow-left ti-xs me-sm-1 me-0"></i> <span
                                                    class="align-middle d-sm-inline-block d-none">Previous</span>
                                            </button>
                                            <button
                                                class="btn btn-success btn-next btn-submit waves-effect waves-light"
                                                data-bs-dismiss="modal" aria-label="Close"> <span
                                                    class="align-middle d-sm-inline-block d-none me-sm-1">Submit</span>
                                                <i class="ti ti-check ti-xs"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @push('pageCustomScript')
            <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
            <script src="{{ asset('assets/vendor/libs/bs-stepper/bs-stepper.js') }}"></script>
            <script src="{{ asset('assets/js/modal-create-app.js') }}"></script>

            <script>
                $("#membership_duration").flatpickr({
                    mode: "range",
                    inline: true,
                    minDate: "today",
                    onChange: function(selectedDates, dateStr, instance) {

                        if (selectedDates.length <= 1)
                            return;

                        const utcDate1 = new Date(selectedDates[0].toUTCString());
                        const utcDate2 = new Date(selectedDates[1].toUTCString());

                        // Set hours, minutes, seconds, and milliseconds to zero to ignore the time part
                        utcDate1.setUTCHours(0, 0, 0, 0);
                        utcDate2.setUTCHours(0, 0, 0, 0);

                        // Calculate the difference in days
                        const timeDifference = utcDate2.getTime() - utcDate1.getTime();
                        const dayDifference = (timeDifference / (1000 * 60 * 60 * 24)) + 1;

                        var price = {};
                        fetch("/dashboard/api/membershipPrice/"+dayDifference, {
                                method: 'GET',
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}', // Laravel CSRF token
                                    'Content-Type': 'application/json',
                                    'Accept': 'application/json'
                                }
                            })
                            .then(response => response.json())
                            .then(function(response) {
                                if (!response.data) {
                                    throw new Error("Not Found", {
                                        cause: response
                                    });
                                }

                                price = response.data;
                                openModal(dayDifference,price);


                            })
                            .catch(function(response) {
                                openModal(dayDifference,{});
                            });




                    },
                });
            </script>
        @endpush
</x-app-layout>
