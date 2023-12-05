<x-app-layout>


    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="card mb-4">
            <h5 class="card-header">Customer's Subscription List</h5>
            <div class="table-responsive mb-3">
                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">

                    <table class="table datatable-project border-top dataTable no-footer dtr-column"
                        id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" style="width: 923px;">
                        <thead>
                            <tr>
                                <th class="" tabindex="0" aria-controls="DataTables_Table_0"
                                    rowspan="1" colspan="1" style="width: 343px;">
                                    Subscription</th>
                                <th class="text-nowrap sorting_disabled" rowspan="1" colspan="1"
                                    style="width: 156px;" aria-label="Total Task">Expiry</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                    colspan="1" style="width: 146px;"
                                    aria-label="Progress: activate to sort column ascending">Progress</th>
                                <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 106px;"
                                    aria-label="Hours">Status</th>
                                    <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 106px;"
                                    aria-label="Hours">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($memberships as $membership)
                            <tr class="odd">
                                <td class="  control" tabindex="0" style="display: none;"></td>
                                <td class="sorting_1">
                                    <div class="d-flex justify-content-left align-items-center">
                                        <div class="d-flex flex-column">
                                            <span class="text-truncate fw-bold">
                                                {{ $membership->duration()}}
                                            </span>
                                            <small class="text-muted" style="font-size:0.55rem">
                                                {{ $membership->created_at}}
                                            </small></div>
                                    </div>
                                </td>
                                <td>{{ $membership->formattedExpiryDate() }} </td>
                                <td>
                                    @if ($membership->calculateProgress() == -1)
                                    <div class="text-center">
                                        -
                                    </div>
                                    @else
                                    <div class="d-flex flex-column"><small class="mb-1">{{ $membership->calculateProgress()}}%</small>
                                        <div class="progress w-100 me-3" style="height: 6px;">
                                            <div class="progress-bar bg-success" style="width: {{ $membership->calculateProgress()}}%" aria-valuenow="{{ $membership->calculateProgress()}}%"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    @endif

                                </td>
                                <td>
                                    {!!$membership->getStatus()!!}
                                </td>
                                <td>
                                    @if ($membership->status == 1)
                                    <div class="flex items-center space-x-4 gap-4">
                                        <a href="{{ route('customer.membership.pause', ['membership' => $membership->id]) }}"
                                            class="btn btn-sm btn-outline-primary waves-effect">
                                            Pause
                                        </a>
                                        <a href="{{ route('customer.membership.extend', ['membership' => $membership->id]) }}"
                                            class="btn btn-sm btn-outline-secondary waves-effect">
                                            Extend
                                        </a>
                                        <a href="{{ route('customer.membership.cancel', ['membership' => $membership->id]) }}"
                                            class="btn btn-sm btn-outline-danger waves-effect">
                                            Cancel
                                        </a>
                                    </div>
                                @else
                                    @if ($membership->status == 901)
                                        <a href="{{ route('customer.membership.resume', ['membership' => $membership->id]) }}"
                                            class="btn btn-sm btn-outline-primary waves-effect">
                                            Un Pause
                                        </a>
                                    @else
                                    <div class="text-center">
                                        -
                                    </div>
                                    @endif

                                @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-between mx-4 row">
                        <div class="col-sm-12 col-md-6">
                            <div class="dataTables_info" id="DataTables_Table_0_info" role="status"
                                aria-live="polite">Showing {{ count($memberships)}} entries</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
