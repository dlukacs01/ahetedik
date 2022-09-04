<div class="card my-4">
    <h5 class="card-header text-center">{{ $post->title }}</h5>

    @foreach($post->headings as $heading)
        <div class="card my-2 mx-2">

            @if($heading->type == 'egyeb')

                <h6 class="card-header">{{ $heading->title }}</h6>

                @foreach($heading->articles as $article)
                    <div class="card my-2 mx-2">
                        <h6 class="card-header">{{ $article->title }}</h6>
                        <div class="card-body">{!! $article->body !!}</div>
                    </div>
                @endforeach

            @endif

            @if($heading->type == 'muvek')

                <h6 class="card-header">{{ $heading->title }}</h6>

                <div class="card my-2 mx-2 border-0">
                    <div class="d-flex justify-content-between flex-wrap p-1">
                        @foreach($heading->articles as $article)
                            <div class="p-2 article-item border mt-1">
                                <x-home.article-card :article="$article"></x-home.article-card>
                            </div>
                        @endforeach
                    </div>
                </div>

            @endif

        </div>
    @endforeach
</div>
