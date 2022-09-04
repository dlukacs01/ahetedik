<h1 class="mt-4">{{ $story->title }}</h1>

<p class="lead">
    Írta: <a href="{{ route('user.profile.show', $story->user->username) }}">{{ $story->user->name }}</a>
</p>

<hr>

<p>Közzétéve {{ $story->created_at->diffForHumans() }}</p>

<hr>

<img class="img-fluid rounded" src="{{ $story->story_image }}" alt="">

<hr>

<p>{!! $story->body !!}</p>

<hr>
