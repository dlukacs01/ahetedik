<x-home-master :title="$title">
    @section('content')

        <h1 class="mt-4">Szerzőink figyelmébe</h1>
        <p>{!! $meta->szerzoknek !!}</p>

    @endsection
</x-home-master>
