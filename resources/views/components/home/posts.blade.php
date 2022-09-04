@foreach($posts as $post)
    <div class="card mb-4 my-4">

        <img class="card-img-top" src="{{ $post->post_image }}" alt="Card image cap">

        <div class="card-body">
            <h2 class="card-title">{{ $post->title }}</h2>

            <a href="{{ route('post', $post->slug) }}" class="btn btn-primary">Elolvasom &rarr;</a>
        </div>

        <div class="card-footer text-muted">
            Közzétéve {{ $post->created_at->diffForHumans() }}

            <a href="{{ route('user.profile.show', $post->user->username) }}">{{ $post->user->name }}</a>
        </div>
    </div>
@endforeach
