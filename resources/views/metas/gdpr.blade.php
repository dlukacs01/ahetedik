<x-home-master :title="$title">
    @section('content')

        <h1 class="mt-4">Általános Adatvédelmi Nyilatkozat</h1>
        <p>{!! $meta->gdpr !!}</p>

    @endsection
</x-home-master>
