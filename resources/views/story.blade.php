<x-home-master>
@section('content')

    <!-- Title -->
        <h1 class="mt-4">{{$story->title}}</h1>

        <!-- Author -->
        <p class="lead">
            Írta:
            <a href="{{route('user.profile.show', $story->user->username)}}">{{$story->user->name}}</a>
        </p>

        <hr>

        <!-- Date/Time -->
        <p>Közzétéve {{$story->created_at->diffForHumans()}}</p>

        <hr>

        <!-- Preview Image -->
        <img class="img-fluid rounded" src="{{$story->story_image}}" alt="">

        <hr>

        <!-- Post Content -->
        <p>{!! $story->body !!}</p>

        <hr>

    @endsection
</x-home-master>
