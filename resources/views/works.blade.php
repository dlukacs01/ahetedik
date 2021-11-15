<x-home-master>
    @section('content')
        <h1 class="mt-4 mb-3">{{$category->name}}</h1>

        @foreach($works as $work)

            <div class="card mb-3 border-0">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="{{$work->work_image}}" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title mb-1">
                                <a href="{{route('work', $work->slug)}}" class="text-decoration-none text-body">
                                    {{$work->title}}
                                </a>
                            </h5>
                            <p class="card-text mb-1">
                                <small>
                                    Szerző: <a href="{{route('user.profile.show', $work->user->username)}}">{{$work->user->name}}</a>
                                </small>
                            </p>
                            <p class="card-text"><small class="text-muted">Közzétéve {{$work->created_at->diffForHumans()}}</small></p>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach
    @endsection
</x-home-master>
