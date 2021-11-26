<x-home-master>
@section('content')

{{--    <h1 class="my-4">Page Heading--}}
{{--        <small>Secondary Text</small>--}}
{{--    </h1>--}}

    <!-- Blog Post -->
    <p>{{$post->title}}</p>
    <p>{!! $post->body !!}</p>

    <hr>

    @foreach($post->headings as $heading)
        <p>{{$heading->title}}</p>

        <hr>

        @foreach($heading->articles as $article)
            <p>{{$article->title}}</p>
            <p>
                <img src="{{$article->user->avatar}}" alt="" width="100px">
            </p>
        @endforeach
    @endforeach

@endsection
</x-home-master>
