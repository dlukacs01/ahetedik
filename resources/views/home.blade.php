<x-home-master :title="$title">

@section('content')

    <div class="row">
        <div class="col-md-8">

            <div class="mt-4">
                @foreach($posts as $post)

                    @if($post->status == 'piszkozat')
                        @if(Auth::check())
                            @if(auth()->user()->userHasRole('editor') or auth()->user()->userHasRole('admin'))
                                <x-home.post :post="$post"></x-home.post>
                            @endif
                        @endif
                    @endif

                    @if($post->status == 'eles')
                        <x-home.post :post="$post"></x-home.post>
                    @endif

                @endforeach
            </div>

        </div>

        <div class="col-md-4">

            <x-home.sidenav></x-home.sidenav>

        </div>
    </div>
@endsection
</x-home-master>
