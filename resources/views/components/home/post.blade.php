{{-- LAPSZAM --}}
<div class="card">
    <h5 class="card-header text-center">{{ $post->title }}</h5>
    <div class="card-body">

        @foreach($post->headings as $heading)

            {{-- ROVAT --}}
            <div class="card mb-3">
                <h6 class="card-header">{{ $heading->title }}</h6>
                <div class="card-body">

                    @if($heading->type == 'egyeb')
                        @foreach($heading->articles as $article)

                            {{-- CIKK (egyeb) --}}
                            <div class="card">
                                <div class="card-header">{{ $article->title }}</div>
                                <div class="card-body">{!! $article->body !!}</div>
                            </div>

                        @endforeach
                    @endif

                    @if($heading->type == 'muvek')

                        <div class="row">
                            @foreach($heading->articles as $article)

                                <div class="col-md-6 px-1 mb-1">

                                    {{-- CIKK (muvek) --}}
                                    <div class="card">
                                        <h6 class="card-header">
                                            <a href="{{ route('user.profile.show', ['username' => $article->user->username]) }}"
                                               class="text-body text-decoration-none">
                                                {{ $article->user->name }}
                                            </a>
                                        </h6>
                                        <div class="card-body p-2">
                                            <div class="row">

                                                <div class="col-md-4">
                                                    <img src="{{ $article->user->avatar }}" alt="" class="rounded article-user-avatar">
                                                </div>
                                                <div class="col-md-8">{!! $article->body !!}</div>

                                            </div>
                                        </div>
                                    </div>

                                </div>

                            @endforeach
                        </div>

                    @endif

                </div>
            </div>
        @endforeach
    </div>
</div>
