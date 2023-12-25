<x-app-layout>
    @push('pageCustomScript')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    @endpush

    <div class="container">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-0"><span class="text-light"> Coupons /</span> Create </h5>



        <form method="POST" action="{{ route('coupons.store') }}" enctype="multipart/form-data">
            @csrf
            <br>
            <!-- Name -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-600">Code:</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="code" id="code" aria-describedby="button-addon2">
                    <button class="btn btn-outline-primary waves-effect" type="button" id="button-addon2" onclick="randomCode()">Generate Random Code</button>
                  </div>
                @if($errors->has('code'))
                    <p class="text-red-500 text-sm mt-1">{{ $errors->first('code') }}</p>
                @endif
            </div>

            <div class="row">
            <!-- Description -->
                <div class="mb-4 col-6">
                    <label for="description" class="block text-sm font-medium text-gray-600">Discount Type:</label>
                    <div class="d-flex justify-content-between">
                        <div class="form-check form-check-inline mt-3">
                            <input class="form-check-input discount_radio" type="radio" name="discount_type" id="inlineRadio1" value="21" checked>
                            <label class="form-check-label" for="inlineRadio1">Flat Discount</label>
                        </div>
                        <div class="form-check form-check-inline mt-3">
                            <input class="form-check-input discount_radio" type="radio" name="discount_type" id="inlineRadio2" value="22">
                            <label class="form-check-label" for="inlineRadio2">Percentage Discount</label>
                        </div>
                    </div>
                </div>

                <!-- Price -->
                <div class="mb-4 col-6">
                    <label for="price" class="block text-sm font-medium text-gray-600">Discount Amount:</label>
                    <input type="number" id="price" name="discount_amount" min="1" class="form-control {{ $errors->has('price') ? 'border-red-500' : 'border-gray-300' }}" required>
                    @if($errors->has('discount_amount'))
                        <p class="text-red-500 text-sm mt-1">{{ $errors->first('discount_amount') }}</p>
                    @endif
                </div>
            </div>

            <!-- Duration -->
            <div class="row">
                <!-- Description -->
                <div class="mb-4 col-6">
                    <label for="description" class="block text-sm font-medium text-gray-600">Maximum Uses:</label>
                    <div class="d-flex justify-content-between">
                        <div class="form-check form-check-inline mt-3">
                            <input class="form-check-input uses_radio" type="radio" name="use_type" id="uses_one" value="11">
                            <label class="form-check-label" for="uses_one">Single  <small class="text-xs text-muted"> (Max: 1)</small></label>
                        </div>
                        <div class="form-check form-check-inline mt-3">
                            <input class="form-check-input uses_radio" type="radio" name="use_type" id="uses_custom" value="12">
                            <label class="form-check-label" for="uses_custom">Custom <small class="text-xs text-muted"> (Multiple)</small></label>
                        </div>
                        <div class="form-check form-check-inline mt-3">
                            <input class="form-check-input uses_radio" type="radio" name="use_type" id="uses_unlimited" value="13" checked>
                            <label class="form-check-label" for="uses_unlimited">Unlimited</label>
                        </div>
                    </div>
                    @if($errors->has('use_type'))
                        <p class="text-red-500 text-sm mt-1">{{ $errors->first('use_type') }}</p>
                    @endif
                </div>

                <!-- Price -->
                <div class="mb-4 col-6">
                    <label for="price" class="block text-sm font-medium text-gray-600">Maxiumum Uses:</label>
                    <input type="number" name="max_uses" class="mt-1 p-2 w-full border rounded-md {{ $errors->has('price') ? 'border-red-500' : 'border-gray-300' }}" readonly>
                    @if($errors->has('max_uses'))
                        <p class="text-red-500 text-sm mt-1">{{ $errors->first('max_uses') }}</p>
                    @endif
                </div>
            </div>
            <hr>
            <div class="row">
                <!-- Description -->
                <div class="mb-4 col-6">
                    <label for="description" class="block text-sm font-medium text-gray-600">User Specific?</label>
                    <div class="d-flex justify-content-between">
                        <div class="form-check form-check-inline mt-3">
                            <input class="form-check-input user_type_radio" type="radio" name="user_specific" id="user_specific_yes" value="1">
                            <label class="form-check-label" for="user_specific_yes">Yes</label>
                        </div>
                        <div class="form-check form-check-inline mt-3">
                            <input class="form-check-input  user_type_radio" type="radio" name="user_specific" id="user_specific_no" value="0" checked>
                            <label class="form-check-label" for="user_specific_no">No <small class="text-xs text-muted"> (Any User)</small></label>
                        </div>
                    </div>
                    @if($errors->has('discount_amount'))
                        <p class="text-red-500 text-sm mt-1">{{ $errors->first('discount_amount') }}</p>
                    @endif
                </div>

                <!-- Price -->
                <div class="mb-4 col-6">
                    <div class="row">
                        <div class="col-9">
                            <label for="price" class="block text-sm font-medium text-gray-600">User Email:</label>
                            <input type="email" name="user_email" class="form-control {{ $errors->has('price') ? 'border-red-500' : 'border-gray-300' }}" disabled>
                            @if($errors->has('user_email'))
                                <p class="text-red-500 text-sm mt-1">{{ $errors->first('user_email') }}</p>
                            @endif
                        </div>
                        <div class="col-3 d-flex items-center">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="notifyUserEmail" checked="">
                                <label class="form-check-label text-xs" for="notifyUserEmail">
                                  Notify User on Mail?
                                </label>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <!-- Description -->
                <div class="mb-4 col-6">
                    <label for="description" class="block text-sm font-medium text-gray-600">Valid Type</label>
                    <div class="d-flex justify-content-between">
                        <div class="form-check form-check-inline mt-3">
                            <input class="form-check-input valid_type_radio" type="radio" name="valid_type" id="valid_type_from_today" value="1">
                            <label class="form-check-label" for="valid_type_from_today">
                                Valid Until <br> <small class="text-xs text-muted"> (Starts From Today)</small>
                            </label>
                        </div>
                        <div class="form-check form-check-inline mt-3">
                            <input class="form-check-input valid_type_radio" type="radio" name="valid_type" id="valid_type_no_range" value="2">
                            <label class="form-check-label" for="valid_type_no_range">No Valid Range <br> <small class="text-xs text-muted"> (No End Date - Starts From Today)</small></label>
                        </div>
                        <div class="form-check form-check-inline mt-3">
                            <input class="form-check-input valid_type_radio" type="radio" name="valid_type" id="valid_type_range" value="3" checked>
                            <label class="form-check-label" for="valid_type_range">Range <br> <small class="text-xs text-muted"> (Start - End)</small></label>
                        </div>
                    </div>
                    @if($errors->has('discount_amount'))
                        <p class="text-red-500 text-sm mt-1">{{ $errors->first('discount_amount') }}</p>
                    @endif
                </div>

                <!-- Price -->
                <div class="mb-4 col-6 d-flex justify-content-between flex-col">
                    <label for="price" class="block text-sm font-medium text-gray-600">Enter Date:</label>
                    <input type="date" class="form-control" name="dates" id="dates" placeholder="Select Date">
                    @if($errors->has('dates'))
                        <p class="text-red-500 text-sm mt-1">{{ $errors->first('dates') }}</p>
                    @endif
                </div>
            </div>

            <!-- Save Button -->
            <div class="mb-4">
                <button type="submit" class="btn btn-primary">Add Class</button>
            </div>
        </form>
    </div>
    @push("pageCustomScript")
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

        <script>

            function randomCode() {
                    jQuery("#code").val(generateCode(6))
            }


            function generateCode(length){
                const crypto = window.crypto || window.msCrypto;

                if (typeof crypto === 'undefined') {
                    throw new Error('Crypto API is not supported. Please upgrade your web browser');
                }

                const charset = '123456789123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';

                const indexes = crypto.getRandomValues(new Uint32Array(length));

                let secret = '';

                for (const index of indexes) {
                    secret += charset[index % charset.length];
                }

                return secret;

            }





            // Discount
            var instance_flatpicker = null;

            $('.discount_radio').click(function(){
                UpdateDiscount();
            });
            $('.uses_radio').click(function(){
                UpdateUses();
            });
            $('.user_type_radio').click(function(){
                UpdateUserSpecific();
            });
            $('.valid_type_radio').click(function(){
                UpdateValidDatePicker();
            });


            function UpdateValidDatePicker(){

                let date_field = $("#dates");


                date_field.val("");
                date_field.removeAttr("required");

                if(instance_flatpicker){
                    instance_flatpicker.destroy();
                }
                date_field.attr("disabled","disabled");
                let checked = $(".valid_type_radio:checked")[0];
                date_field[0].placeholder = "";

                if(checked.checked){
                    switch (checked.value) {
                        case "1":
                            date_field.removeAttr("disabled");
                            instance_flatpicker = date_field.flatpickr({
                                minDate: "today"
                            });
                            date_field[0].placeholder = "Select Date";
                            date_field.attr("required","required");
                            break;
                        case "2":
                            instance_flatpicker = date_field.flatpickr({});
                            date_field[0].placeholder = "No Valid Range (No expiry date)";

                            break;
                        case "3":
                            date_field.removeAttr("disabled");
                            instance_flatpicker = date_field.flatpickr({
                                mode: "range"
                            });
                            date_field[0].placeholder = "Select Start & End Date";
                            date_field.attr("required","required");
                            break;

                        default:
                            break;
                    }
                }


            }


            function UpdateDiscount(){
                let discount_amount_field = $("input[name='discount_amount']");

                discount_amount_field.val("");
                discount_amount_field.removeAttr("max");
                discount_amount_field.removeAttr("required");


                let checked = $(".discount_radio:checked")[0];
                if(checked.checked){
                    switch (checked.value) {
                        case "21":
                            discount_amount_field[0].placeholder="Flat Discount";
                            discount_amount_field.attr("required","required");

                            break;
                        case "22":
                            discount_amount_field[0].placeholder="Percentage Discount";
                            discount_amount_field.attr("max","100");
                            discount_amount_field.attr("required","required");
                            break;

                        default:
                            break;
                    }
                }

            }

            function UpdateUserSpecific(){

                let user_email_field = $("input[name='user_email']");
                let notify_user_field = $("#notifyUserEmail");

                user_email_field.val("");
                user_email_field.attr("disabled", "disabled");
                user_email_field.removeAttr("required");
                user_email_field[0].placeholder="No Specific User";
                notify_user_field.removeAttr("checked");
                notify_user_field.attr("disabled", "disabled");



                let checked = $(".user_type_radio:checked")[0];
                if(checked.checked){
                    switch (checked.value) {
                        case "1":
                            user_email_field[0].placeholder="Enter User Email";
                            user_email_field.removeAttr("disabled");
                            user_email_field.attr("required","required");
                            notify_user_field.attr("checked","checked");
                            notify_user_field.removeAttr("disabled");

                            break;


                        default:
                            break;
                    }
                }
            }

            function UpdateUses(){

                let maximum_uses_field = $("input[name='max_uses']");

                maximum_uses_field.val("");
                maximum_uses_field.attr("readonly", "readonly");
                maximum_uses_field.removeAttr("required");

                let checked = $(".uses_radio:checked")[0];
                if(checked.checked){
                    switch (checked.value) {
                        case "11":
                            maximum_uses_field.val("1");
                            break;
                        case "12":
                            maximum_uses_field[0].placeholder="Enter Max Uses";
                            maximum_uses_field.removeAttr("readonly");
                            maximum_uses_field.attr("required","required");


                            break;
                        case "13":
                            maximum_uses_field[0].placeholder="Unlimited";

                            break;

                        default:
                            break;
                    }
                }
            }


            $(() => {

                UpdateDiscount();
                UpdateUses();
                UpdateValidDatePicker();
                UpdateUserSpecific();
                // Genereate Code
                randomCode();

            })


        </script>
    @endpush
</x-app-layout>
