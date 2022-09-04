<x-home-master :title="$title">
    @section('content')

        <div class="row">
            <div class="col-md-8">

                <h1 class="mt-4 mb-3">Korábbi lapszámok</h1>

                <div class="alert alert-info my-4">
                    <strong>Figyelem! </strong>
                    A régebbi lapszámok <a href="{{ config('custom.older_posts_url') }}" target="_blank">ezen az oldalon</a> érhetőek el.
                </div>

                <x-home.posts :posts="$posts"></x-home.posts>

                <x-home.pagination :objects="$posts"></x-home.pagination>

            </div>

            <div class="col-md-4">
                <x-home.sidenav></x-home.sidenav>
            </div>
        </div>

    @endsection
</x-home-master>
