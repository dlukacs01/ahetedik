<x-home-master :title="$title">
    @section('content')

        <div class="row">
            <div class="col-md-8">

                <h3 class="text-danger mt-3">Hiba történt! Ez a mű még nem jelent meg!</h3>

            </div>

            <div class="col-md-4">
                <x-home.sidenav></x-home.sidenav>
            </div>
        </div>

    @endsection
</x-home-master>
