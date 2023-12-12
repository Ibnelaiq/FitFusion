<x-app-layout>

    @push("pageCustomScript")
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
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-600 mb-2">Expiry Date:</label>
                        <span id="expiryDateSpan"></span>
                    </div>

                    <input type="text" name="email" class="d-none" value="{{$customer->email}}">

                    <!-- Add more fields for membership details if necessary -->

                    <button type="submit" class="btn btn-primary">
                        Create Membership
                    </button>
                </form>
                <script>
                    // document.getElementById("membership_duration").addEventListener("change", function() {
                    //     var selectedDuration = parseInt(this.value);
                    //     var currentDate = new Date();
                    //     var expiryDate = new Date();
                    //     expiryDate.setDate(currentDate.getDate() +
                    //     selectedDuration); // Adding selected days to the current date

                    //     // Format expiryDate to 'YYYY-MM-DD' format for display
                    //     var formattedExpiryDate = expiryDate.toISOString().split('T')[0];
                    //     document.getElementById("expiryDateSpan").textContent = formattedExpiryDate;
                    // });
                </script>
            </div>
        </div>
        <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#createApp"> Show </button>
        <div class="modal fade" id="createApp" tabindex="-1" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-simple modal-upgrade-plan">
              <div class="modal-content p-3 p-md-5">
                <div class="modal-body p-2">
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  <div class="text-center">
                    <h3 class="mb-2">New Membership</h3>
                    <p>You have selected <span></span> days. Kindly select the price.   </p>
                  </div>
                  <div id="wizard-create-app" class="bs-stepper vertical mt-2 shadow-none">
                    <div class="bs-stepper-header border-0 p-1">
                      <div class="step crossed" data-target="#details">
                        <button type="button" class="step-trigger" aria-selected="false">
                          <span class="bs-stepper-circle"><i class="ti ti-file-text ti-sm"></i></span>
                          <span class="bs-stepper-label">
                            <span class="bs-stepper-title text-uppercase">Selection</span>
                            <span class="bs-stepper-subtitle">Enter Details</span>
                          </span>
                        </button>
                      </div>
                      <div class="line"></div>
                      <div class="step active" data-target="#frameworks">
                        <button type="button" class="step-trigger" aria-selected="true">
                          <span class="bs-stepper-circle"><i class="ti ti-box ti-sm"></i></span>
                          <span class="bs-stepper-label">
                            <span class="bs-stepper-title text-uppercase">Frameworks</span>
                            <span class="bs-stepper-subtitle">Select Framework</span>
                          </span>
                        </button>
                      </div>
                      <div class="line"></div>
                      <div class="step" data-target="#database">
                        <button type="button" class="step-trigger" aria-selected="false">
                          <span class="bs-stepper-circle"><i class="ti ti-database ti-sm"></i></span>
                          <span class="bs-stepper-label">
                            <span class="bs-stepper-title text-uppercase">Database</span>
                            <span class="bs-stepper-subtitle">Select Database</span>
                          </span>
                        </button>
                      </div>
                      <div class="line"></div>
                      <div class="step" data-target="#billing">
                        <button type="button" class="step-trigger" aria-selected="false">
                          <span class="bs-stepper-circle"><i class="ti ti-credit-card ti-sm"></i></span>
                          <span class="bs-stepper-label">
                            <span class="bs-stepper-title text-uppercase">Billing</span>
                            <span class="bs-stepper-subtitle">Payment Details</span>
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
                        <div id="details" class="content pt-3 pt-lg-0 dstepper-block">
                          <div class="mb-3">
                            <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Application Name">
                          </div>
                          <h5>Category</h5>
                          <ul class="p-0 m-0">
                            <li class="d-flex align-items-start mb-3">
                              <div class="badge bg-label-info p-2 me-3 rounded"><i class="ti ti-file-text ti-md"></i></div>
                              <div class="d-flex justify-content-between w-100">
                                <div class="me-2">
                                  <h6 class="mb-0">CRM Application</h6>
                                  <small class="text-muted">Scales with any business</small>
                                </div>
                                <div class="d-flex align-items-center">
                                  <div class="form-check form-check-inline">
                                    <input name="details-radio" class="form-check-input" type="radio" value="">
                                  </div>
                                </div>
                              </div>
                            </li>
                            <li class="d-flex align-items-start mb-3">
                              <div class="badge bg-label-success p-2 me-3 rounded"><i class="ti ti-shopping-cart ti-md"></i></div>
                              <div class="d-flex justify-content-between w-100">
                                <div class="me-2">
                                  <h6 class="mb-0">eCommerce Platforms</h6>
                                  <small class="text-muted">Grow Your Business With App</small>
                                </div>
                                <div class="d-flex align-items-center">
                                  <div class="form-check form-check-inline">
                                    <input name="details-radio" class="form-check-input" type="radio" value="" checked="">
                                  </div>
                                </div>
                              </div>
                            </li>
                            <li class="d-flex align-items-start">
                              <div class="badge bg-label-danger p-2 me-3 rounded"><i class="ti ti-device-laptop ti-md"></i></div>
                              <div class="d-flex justify-content-between w-100">
                                <div class="me-2">
                                  <h6 class="mb-0">Online Learning platform</h6>
                                  <small class="text-muted">Start learning today</small>
                                </div>
                                <div class="d-flex align-items-center">
                                  <div class="form-check form-check-inline">
                                    <input name="details-radio" class="form-check-input" type="radio" value="">
                                  </div>
                                </div>
                              </div>
                            </li>
                          </ul>
                          <div class="col-12 d-flex justify-content-between mt-4">
                            <button class="btn btn-label-secondary btn-prev waves-effect" disabled=""> <i class="ti ti-arrow-left ti-xs me-sm-1 me-0"></i>
                              <span class="align-middle d-sm-inline-block d-none">Previous</span>
                            </button>
                            <button class="btn btn-primary btn-next waves-effect waves-light"> <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span> <i class="ti ti-arrow-right ti-xs"></i></button>
                          </div>
                        </div>

                        <!-- Frameworks -->
                        <div id="frameworks" class="content pt-3 pt-lg-0 dstepper-block active">
                          <h5>Category</h5>
                          <ul class="p-0 m-0">
                            <li class="d-flex align-items-start mb-3">
                              <div class="badge bg-label-info p-2 me-3 rounded"><i class="ti ti-brand-react-native ti-md"></i></div>
                              <div class="d-flex justify-content-between w-100">
                                <div class="me-2">
                                  <h6 class="mb-0">React Native</h6>
                                  <small class="text-muted">Create truly native apps</small>
                                </div>
                                <div class="d-flex align-items-center">
                                  <div class="form-check form-check-inline">
                                    <input name="frameworks-radio" class="form-check-input" type="radio" value="">
                                  </div>
                                </div>
                              </div>
                            </li>
                            <li class="d-flex align-items-start mb-3">
                              <div class="badge bg-label-danger p-2 me-3 rounded"><i class="ti ti-brand-angular ti-md"></i></div>
                              <div class="d-flex justify-content-between w-100">
                                <div class="me-2">
                                  <h6 class="mb-0">Angular</h6>
                                  <small class="text-muted">Most suited for your application</small>
                                </div>
                                <div class="d-flex align-items-center">
                                  <div class="form-check form-check-inline">
                                    <input name="frameworks-radio" class="form-check-input" type="radio" value="" checked="">
                                  </div>
                                </div>
                              </div>
                            </li>
                            <li class="d-flex align-items-start mb-3">
                              <div class="badge bg-label-warning p-2 me-3 rounded"><i class="ti ti-brand-html5 ti-md"></i></div>
                              <div class="d-flex justify-content-between w-100">
                                <div class="me-2">
                                  <h6 class="mb-0">HTML</h6>
                                  <small class="text-muted">Progressive Framework</small>
                                </div>
                                <div class="d-flex align-items-center">
                                  <div class="form-check form-check-inline">
                                    <input name="frameworks-radio" class="form-check-input" type="radio" value="" checked="">
                                  </div>
                                </div>
                              </div>
                            </li>
                            <li class="d-flex align-items-start">
                              <div class="badge bg-label-success p-2 me-3 rounded"><i class="ti ti-brand-vue ti-md"></i></div>
                              <div class="d-flex justify-content-between w-100">
                                <div class="me-2">
                                  <h6 class="mb-0">VueJs</h6>
                                  <small class="text-muted">JS web frameworks</small>
                                </div>
                                <div class="d-flex align-items-center">
                                  <div class="form-check form-check-inline">
                                    <input name="frameworks-radio" class="form-check-input" type="radio" value="">
                                  </div>
                                </div>
                              </div>
                            </li>
                          </ul>

                          <div class="col-12 d-flex justify-content-between mt-4">
                            <button class="btn btn-label-secondary btn-prev waves-effect"> <i class="ti ti-arrow-left ti-xs me-sm-1 me-0"></i> <span class="align-middle d-sm-inline-block d-none">Previous</span> </button>
                            <button class="btn btn-primary btn-next waves-effect waves-light"> <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span> <i class="ti ti-arrow-right ti-xs"></i></button>
                          </div>
                        </div>

                        <!-- Database -->
                        <div id="database" class="content pt-3 pt-lg-0 dstepper-block">
                          <div class="mb-3">
                            <input type="email" class="form-control form-control-lg" id="exampleInputEmail2" placeholder="Database Name">
                          </div>
                          <h5>Select Database Engine</h5>
                          <ul class="p-0 m-0">
                            <li class="d-flex align-items-start mb-3">
                              <div class="badge bg-label-danger p-2 me-3 rounded"><i class="ti ti-brand-firebase ti-md"></i></div>
                              <div class="d-flex justify-content-between w-100">
                                <div class="me-2">
                                  <h6 class="mb-0">Firebase</h6>
                                  <small class="text-muted">Cloud Firestone</small>
                                </div>
                                <div class="d-flex align-items-center">
                                  <div class="form-check form-check-inline">
                                    <input name="database-radio" class="form-check-input" type="radio" value="">
                                  </div>
                                </div>
                              </div>
                            </li>
                            <li class="d-flex align-items-start mb-3">
                              <div class="badge bg-label-warning p-2 me-3 rounded"><i class="ti ti-brand-amazon ti-md"></i></div>
                              <div class="d-flex justify-content-between w-100">
                                <div class="me-2">
                                  <h6 class="mb-0">AWS</h6>
                                  <small class="text-muted">Amazon Fast NoSQL Database</small>
                                </div>
                                <div class="d-flex align-items-center">
                                  <div class="form-check form-check-inline">
                                    <input name="database-radio" class="form-check-input" type="radio" value="" checked="">
                                  </div>
                                </div>
                              </div>
                            </li>
                            <li class="d-flex align-items-start">
                              <div class="badge bg-label-info p-2 me-3 rounded"><i class="ti ti-database ti-md"></i></div>
                              <div class="d-flex justify-content-between w-100">
                                <div class="me-2">
                                  <h6 class="mb-0">MySQL</h6>
                                  <small class="text-muted">Basic MySQL database</small>
                                </div>
                                <div class="d-flex align-items-center">
                                  <div class="form-check form-check-inline">
                                    <input name="database-radio" class="form-check-input" type="radio" value="">
                                  </div>
                                </div>
                              </div>
                            </li>
                          </ul>
                          <div class="col-12 d-flex justify-content-between mt-4">
                            <button class="btn btn-label-secondary btn-prev waves-effect"> <i class="ti ti-arrow-left ti-xs me-sm-1 me-0"></i> <span class="align-middle d-sm-inline-block d-none">Previous</span> </button>
                            <button class="btn btn-primary btn-next waves-effect waves-light"> <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span> <i class="ti ti-arrow-right ti-xs"></i></button>
                          </div>
                        </div>

                        <!-- billing -->
                        <div id="billing" class="content dstepper-block">
                          <div id="AppNewCCForm" class="row g-3 pt-3 pt-lg-0" onsubmit="return false">
                            <div class="col-12">
                              <div class="input-group input-group-merge">
                                <input class="form-control app-credit-card-mask" type="text" placeholder="1356 3215 6548 7898" aria-describedby="modalAppAddCard">
                                <span class="input-group-text cursor-pointer p-1" id="modalAppAddCard"><span class="app-card-type"></span></span>
                              </div>
                            </div>
                            <div class="col-12 col-md-6">
                              <input type="text" class="form-control" placeholder="John Doe">
                            </div>
                            <div class="col-6 col-md-3">
                              <input type="text" class="form-control app-expiry-date-mask" placeholder="MM/YY">
                            </div>
                            <div class="col-6 col-md-3">
                              <div class="input-group input-group-merge">
                                <input type="text" id="modalAppAddCardCvv" class="form-control app-cvv-code-mask" maxlength="3" placeholder="654">
                                <span class="input-group-text cursor-pointer" id="modalAppAddCardCvv2"><i class="text-muted ti ti-help" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Card Verification Value" data-bs-original-title="Card Verification Value"></i></span>
                              </div>
                            </div>
                            <div class="col-12">
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
                            <button class="btn btn-label-secondary btn-prev waves-effect"> <i class="ti ti-arrow-left ti-xs me-sm-1 me-0"></i> <span class="align-middle d-sm-inline-block d-none">Previous</span> </button>
                            <button class="btn btn-primary btn-next waves-effect waves-light"> <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span> <i class="ti ti-arrow-right ti-xs"></i></button>
                          </div>
                        </div>

                        <!-- submit -->
                        <div id="submit" class="content text-center pt-3 pt-lg-0 dstepper-block">
                          <h5 class="mb-2 mt-3">Submit</h5>
                          <p>Submit to kick start your project.</p>
                          <!-- image -->
                          <img src="../../assets/img/illustrations/girl-with-laptop.png" class="img-fluid" alt="Create App img" width="175">
                          <div class="col-12 d-flex justify-content-between mt-4 pt-2">
                            <button class="btn btn-label-secondary btn-prev waves-effect"> <i class="ti ti-arrow-left ti-xs me-sm-1 me-0"></i> <span class="align-middle d-sm-inline-block d-none">Previous</span> </button>
                            <button class="btn btn-success btn-next btn-submit waves-effect waves-light" data-bs-dismiss="modal" aria-label="Close"> <span class="align-middle d-sm-inline-block d-none me-sm-1">Submit</span> <i class="ti ti-check ti-xs"></i></button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        @push("pageCustomScript")
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

            if(selectedDates.length <= 1)
                return;

                const utcDate1 = new Date(selectedDates[0].toUTCString());
                const utcDate2 = new Date(selectedDates[1].toUTCString());

                // Set hours, minutes, seconds, and milliseconds to zero to ignore the time part
                utcDate1.setUTCHours(0, 0, 0, 0);
                utcDate2.setUTCHours(0, 0, 0, 0);

                // Calculate the difference in days
                const timeDifference = utcDate2.getTime() - utcDate1.getTime();
                const dayDifference = ( timeDifference / (1000 * 60 * 60 * 24) ) + 1;

                console.log('Difference in days:', dayDifference);
        },
    });
    </script>
@endpush
</x-app-layout>


