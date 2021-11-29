<x-home-master>
@section('content')

{{--    <h1 class="my-4">Page Heading--}}
{{--        <small>Secondary Text</small>--}}
{{--    </h1>--}}

    <!-- Blog Post -->
    <div class="card my-4">
        <h5 class="card-header text-center">Lapszám: {{$post->title}}</h5>
        <div class="card my-4 mx-2">

            @foreach($post->headings as $heading)

                @if($heading->type == 'egyeb')

                    @foreach($heading->articles as $article)
                    <h5 class="card-header">Rovat: {{$heading->title}}</h5>
                    <div class="card my-4 mx-2">
                        <h5 class="card-header">Cikk: {{$article->title}}</h5>
                        <div class="card-body">{!! $article->body !!}</div>
                    </div>
                    @endforeach

                @endif
                @if($heading->type == 'muvek')
                    <div class="d-flex justify-content-between p-3 bg-secondary text-white">
                        @foreach($heading->articles as $article)
                            <div class="p-2 bg-info article-item">
                                <x-home.article-card :article="$article"></x-home.article-card>
                            </div>
                        @endforeach
                    </div>
                @endif

            @endforeach

        </div>
    </div>

@endsection
</x-home-master>
