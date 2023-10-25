<x-app-layout>
    <div class="mt-4 p-6 max-w-2xl mx-auto bg-white rounded shadow-md">
        <h2 class="text-2xl font-semibold mb-4">Workout Detail:</h2>

        <img src="{{ asset("/storage/".$workout->image_url) }}" style="float:right"/>
        <p><strong>ID:</strong> {{ $workout->name }}</p>
        <p><strong>Duration:</strong> {{ $workout->description }}</p>
        <p><strong>Video: <a target="_blank" href="{{ $workout->video_url }}"> (View) </a> </strong> {{ $workout->video_url }}</p>


        <table class="min-w-full text-left text-sm font-light">
            <thead class="border-b font-medium dark:border-neutral-500">
            <tr>
                <th scope="col" class="px-6 py-4 text-center">#</th>
                <th scope="col" class="px-6 py-4 text-center">Code </th>
            </tr>
            </thead>
            <tbody>


        @foreach ($workout->activatedMuscles as $muscles)
            <tr class="border-b-2 p-4" >
                <td class="p-4 text-center"> {{ $muscles->id }} </td>
                <td class="p-4 text-center"> {{ $muscles->code}} </td>
            </tr>
        @endforeach


    </tbody>
</table>
    </div>

</x-app-layout>
`
