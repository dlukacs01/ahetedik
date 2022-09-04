<x-home-master :title="$title">
    @section('content')

        <div class="row">
            <div class="col-md-8">

                <h1 class="mt-4 mb-3">Kategóriák</h1>

                <x-home.categories :categories="$categories"></x-home.categories>

            </div>

            <div class="col-md-4">
                <x-home.sidenav></x-home.sidenav>
            </div>
        </div>

    @endsection
</x-home-master>
