<div class="card mb-3 border-0">

    <div class="row no-gutters">

        <div class="col-md-4">
            <img src="{{ $work->work_image }}" class="card-img work-card-img" alt="...">
        </div>

        <div class="col-md-8">
            <div class="card-body pt-2">

                <h5 class="card-title mb-1">
                    <a href="{{ route('work', ['work_slug' => $work->slug, 'work_id' => $work->id]) }}"
                       class="text-decoration-none text-body">{{ $work->title }}</a>
                </h5>

                <p class="card-text mb-1">
                    <small>
                        Szerző: <a href="{{ route('user.show', $work->user->username) }}">{{ $work->user->name }}</a>
                    </small>
                </p>

                <p class="card-text mb-1">
                    <small>
                        Kategóriák:
                        <br>
                        @foreach($work->categories as $category)
                            <a href="{{ route('work.works', $category->slug) }}" class="ml-2">{{ $category->name }}</a>
                            <br>
                        @endforeach
                    </small>
                </p>

                <p class="card-text">
                    <small class="text-muted">
                        Közzétéve {{ $work->created_at->diffForHumans() }}
                    </small>
                </p>
            </div>
        </div>
    </div>
</div>
