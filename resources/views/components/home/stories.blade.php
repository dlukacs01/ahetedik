@foreach($stories as $story)
    <div class="card mb-4 my-4">

        <img class="card-img-top" src="{{ $story->story_image }}" alt="Card image cap">

        <div class="card-body">
            <h2 class="card-title">{{ $story->title }}</h2>
            <a href="{{ route('story', $story->slug) }}" class="btn btn-primary">Elolvasom &rarr;</a>
        </div>

        <div class="card-footer text-muted">
            Közzétéve {{ $story->created_at->diffForHumans() }}
            <a href="{{ route('user.show', $story->user->username) }}">{{ $story->user->name }}</a>
        </div>

    </div>
@endforeach
