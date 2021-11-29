<div class="card mb-3 border-0">
    <div class="row no-gutters">
        <div class="col-md-4">
            <img src="{{$article->user->avatar}}" class="card-img" alt="...">
        </div>
        <div class="col-md-8">
            <div class="card-body pt-2">
                <h5 class="card-title mb-1">
                    <a href="{{route('user.profile.show', $article->user->username)}}" class="text-decoration-none text-body">
                        {{$article->user->name}}
                    </a>
                </h5>
                <p class="card-text mb-1">
                    {!! $article->body !!}
                </p>
            </div>
        </div>
    </div>
</div>
