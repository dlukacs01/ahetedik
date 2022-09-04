<x-home-master :title="$title">
    @section('content')

        <div class="row">
            <div class="col-md-8">

                <x-home.story :story="$story"></x-home.story>

            </div>

            <div class="col-md-4">
                <x-home.sidenav></x-home.sidenav>
            </div>
        </div>

    @endsection
</x-home-master>
