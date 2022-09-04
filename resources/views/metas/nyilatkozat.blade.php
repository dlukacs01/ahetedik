<x-home-master :title="$title">
    @section('content')

        <h1 class="mt-4">Szerkesztőségi nyilatkozat</h1>
        <p>{!! $meta->nyilatkozat !!}</p>

    @endsection
</x-home-master>
