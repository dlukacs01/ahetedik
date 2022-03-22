<x-home-master>
@section('content')

    {{--    <h1 class="my-4">Page Heading--}}
    {{--        <small>Secondary Text</small>--}}
    {{--    </h1>--}}

    <h1 class="mt-4 mb-3">Korábbi lapszámok</h1>

    <div class="alert alert-info my-4">
        <strong>Figyelem!</strong> A régebbi lapszámok <a href="http://ahetedik.hu/idaig-megjelent-kiadvanyaink.html" target="_blank">ezen az oldalon</a> érhetőek el.
    </div>

    <!-- Blog Post -->
        @foreach($posts as $post)
            <div class="card mb-4 my-4">
                <img class="card-img-top" src="{{$post->post_image}}" alt="Card image cap">
                <div class="card-body">
                    <h2 class="card-title">{{$post->title}}</h2>
                    {{--            <p class="card-text">{!! Str::limit($post->body, '50', '...') !!}</p>--}}
                    <a href="{{route('post', $post->slug)}}" class="btn btn-primary">Elolvasom &rarr;</a>
                </div>
                <div class="card-footer text-muted">
                    Közzétéve {{$post->created_at->diffForHumans()}}
                    <a href="{{route('user.profile.show', $post->user->username)}}">{{$post->user->name}}</a>
                </div>
            </div>
        @endforeach

    <!-- Pagination -->
        {{--    <ul class="pagination justify-content-center mb-4">--}}
        {{--        <li class="page-item">--}}
        {{--            <a class="page-link" href="#">&larr; Older</a>--}}
        {{--        </li>--}}
        {{--        <li class="page-item disabled">--}}
        {{--            <a class="page-link" href="#">Newer &rarr;</a>--}}
        {{--        </li>--}}
        {{--    </ul>--}}

        <div class="d-flex">
            <div class="mx-auto">
                {{$posts->links()}}
            </div>
        </div>

    @endsection
</x-home-master>
