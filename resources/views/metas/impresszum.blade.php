<x-home-master :title="$title">
    @section('content')

        <h1 class="mt-4">Impresszum</h1>
        <p>{!! $meta->impresszum !!}</p>

    @endsection
</x-home-master>
