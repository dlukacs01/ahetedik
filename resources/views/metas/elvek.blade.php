<x-home-master :title="$title">
    @section('content')

        <h1 class="mt-4">Szerkesztési elvek</h1>
        <p>{!! $meta->elvek !!}</p>

    @endsection
</x-home-master>
