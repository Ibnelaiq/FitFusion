<x-app-layout>
    <div class="mt-4 p-6 max-w-2xl mx-auto bg-white rounded shadow-md">
        <h2 class="text-2xl font-semibold mb-4">Class Detail:</h2>

        <img src="{{ asset("/storage/".$class->image_url) }}" style="float:right"/>
        <p><strong>ID:</strong> {{ $class->name }}</p>
        <p><strong>Duration:</strong> {{ $class->duration }}</p>
        <p><strong>Description:</strong> {{ $class->description }}</p>
        <p><strong>Price:</strong> {{ $class->price }}</p>
        <p><strong>Rating:</strong> {{ $class->rating }}</p>
        <p>
            <strong>Video:</strong>
            <a href="{{ $class->video_url }}" target="_blank"> View </a>
        </p>


        <table class="min-w-full text-left text-sm font-light">
            <thead class="border-b font-medium dark:border-neutral-500">
            <tr>
                <th scope="col" class="px-6 py-4 text-center">#</th>
                <th scope="col" class="px-6 py-4 text-center">Slot Start</th>
                <th scope="col" class="px-6 py-4 text-center">Slot End  </th>
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


    </tbody>
</table>
    </div>

</x-app-layout>
`
