<x-home-master :title="$title">
    @section('content')

        <div class="row">

            <div class="col-md-8">

                <div class="mt-4">
                    <x-home.post :post="$post"></x-home.post>
                </div>

            </div>

            <div class="col-md-4">
                <x-home.sidenav></x-home.sidenav>
            </div>
        </div>

    @endsection
</x-home-master>
