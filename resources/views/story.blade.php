<x-home-master :title="$title">
    @section('content')

        <div class="row">
            <div class="col-md-8">

                <!-- Title -->
                <h1 class="mt-4">{{ $story->title }}</h1>

                <!-- Author -->
                <p class="lead">
                    Írta: <a href="{{ route('user.show', $story->user->username) }}">{{ $story->user->name }}</a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p>Közzétéve {{ $story->created_at->diffForHumans() }}</p>

                <hr>

                <!-- Preview Image -->
                <img class="img-fluid rounded" src="{{ $story->story_image }}" alt="">

                <hr>

                <!-- Post Content -->
                <p>{!! $story->body !!}</p>

            </div>

            <div class="col-md-4">
                <x-home.sidenav></x-home.sidenav>
            </div>
        </div>

    @endsection
</x-home-master>
