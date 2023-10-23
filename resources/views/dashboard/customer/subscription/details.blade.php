<x-app-layout>
    <div class="mt-8 p-6 max-w-6xl mx-auto bg-white rounded-lg shadow-md">
        @foreach ($memberships as $membership)
            <div class="border-b-2 border-gray-200 mb-6 pb-6">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <p class="text-gray-600 font-semibold">Status:</p>
                        <p style="line-height:12px" class="text-lg {{ $membership->status == 1 ? 'text-green-600' : ($membership->status == 2 ? 'text-orange-600' : 'text-red-600') }}">
                           {!! $membership->getStatus() !!}
                        </p>
                    </div>
                    <div>
                        <p class="text-gray-600 font-semibold">Created at:</p>
                        <p class="text-gray-900">{{ $membership->created_at->format('M d, Y') }}</p>
                    </div>
                    <div>
                        <p class="text-gray-600 font-semibold">Expiry Date:</p>
                        <p class="text-gray-900">{{ $membership->expiry_date }}</p>
                    </div>

                    @if ($membership->status == 1)
                        <div class="flex items-center space-x-4 gap-4">
                            <a href="{{ route('customer.membership.pause', ['membership'=> $membership->id]) }}"
                                class="bg-orange-500 hover:bg-orange-700 text-white py-2 px-4 rounded transition duration-300 ease-in-out">
                                Pause
                            </a>
                            <a href="{{ route('customer.membership.extend', ['membership'=> $membership->id]) }}"
                                class="bg-gray-500 hover:bg-slate-700 text-white py-2 px-4 rounded transition duration-300 ease-in-out">
                                Extend
                            </a>
                            <a href="{{ route('customer.membership.cancel', ['membership'=> $membership->id]) }}"
                                class="bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded transition duration-300 ease-in-out">
                                Cancel
                            </a>
                        </div>
                    @else
                    <div class="flex items-center space-x-4 gap-4">
                        <a
                            class="opacity-75 bg-orange-500 hover:bg-orange-700 text-white py-2 px-4 rounded transition duration-300 ease-in-out">
                            Pause
                        </a>
                        <a
                            class="opacity-75 bg-gray-500 hover:bg-slate-700 text-white py-2 px-4 rounded transition duration-300 ease-in-out">
                            Extend
                        </a>
                        <a
                            class="opacity-75 bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded transition duration-300 ease-in-out">
                            Cancel
                        </a>
                    </div>
                    @endif

                </div>

            </div>
        @endforeach

    </div>
</x-app-layout>

