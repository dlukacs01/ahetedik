<x-home-master :title="$title">
    @section('content')

        <div class="row">
            <div class="col-md-8">

                <h1 class="mt-4">Szerkesztési elvek</h1>
                <p>{!! $meta->elvek !!}</p>

            </div>

            <div class="col-md-4">
                <x-home.sidenav></x-home.sidenav>
            </div>
        </div>

    @endsection
</x-home-master>
