
<x-app-layout>



    <div class="container-xxl flex-grow-1 container-p-y">
        <h5 class="card-title mb-0"><span class="text-light"> Class /</span> Detail</h5>

        <div class="row">
            <!-- Categories -->
            <div class="col-xl-3 col-lg-4 col-md-4 mb-lg-0 mb-4">
<hr>
                <div class="nav nav-pills flex-column" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <button class="nav-link active" id="details-tab" data-bs-toggle="pill" data-bs-target="#details" type="button" role="tab" aria-controls="details" aria-selected="true">Gym Class Details</button>
                    <button class="nav-link" id="stock-tab" data-bs-toggle="pill" data-bs-target="#stock" type="button" role="tab" aria-controls="stock" aria-selected="false">Gym Class Slots</button>
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
                                        <i class="ti ti-clipboard ti-md"></i>
                                    </span>
                                    {{ $class->name }}
                                </h4>
                                <img src="{{ asset("/storage/".$class->image_url) }}" class="img-fluid float-md-end" alt="{{ $class->name }}"/>

                                <ul class="list-unstyled my-4">
                                    <li class="mb-3">
                                        <div class="d-flex">
                                            <p><strong>Class Duration:</strong> {{ $class->duration }}</p>
                                        </div>
                                    </li>
                                    <li class="mb-3">
                                        <div class="d-flex">
                                            <p><strong>Class Description:</strong> {{ $class->description }}</p>
                                        </div>
                                    </li>
                                    <li class="mb-3">
                                        <div class="d-flex">
                                            <p><strong>Class Price:</strong> {{ $class->price }}</p>
                                        </div>
                                    </li>
                                    <li class="mb-3">
                                        <div class="d-flex">
                                            <p><strong>Class Rating:</strong> {{ $class->rating }}</p>
                                        </div>
                                    </li>
                                    <li class="mb-3">
                                        <div class="d-flex">
                                            <p><strong>Created:</strong> {{ $class->created_at }}</p>
                                        </div>
                                    </li>
                                    @isset($class->video_url)
                                    <li class="mb-3">
                                        <div class="d-flex">
                                            <p><strong>Video:</strong>
                                                <a href="{{ $class->video_url }}" target="_blank" >
                                                    <button class="btn btn-small btn-outline-primary">
                                                    View
                                                    </button>
                                                </a>
                                            </p>
                                        </div>
                                    </li>
                                    @endisset


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
                                        <th scope="col" class="px-6 py-4 text-center">Slot Start</th>
                                        <th scope="col" class="px-6 py-4 text-center">Slot End</th>
                                        <th scope="col" class="px-6 py-4 text-center">Created At</th>
                                    </tr>
                                    </thead>
                                    <tbody>


                                        @foreach ($class->timings as $timing)
                                        <tr class="border-b-2 p-4" >
                                            <td class="p-4 text-center"> {{ $timing->id }} </td>
                                            <td class="p-4 text-center"> {{ $timing->slot->start }} </td>
                                            <td class="p-4 text-center" > {{ $timing->slot->end }} </td>
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
