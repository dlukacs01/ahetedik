<x-home-master :title="$title">
    @section('content')

        <h1 class="mt-4">Szerzői jogok</h1>
        <p>{!! $meta->jogok !!}</p>

    @endsection
</x-home-master>
