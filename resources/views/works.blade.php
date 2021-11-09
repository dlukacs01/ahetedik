<x-home-master>
    @section('content')
        <h1>Művek az alábbi kategóriához: {{$category->name}}</h1>

        @foreach($works as $work)
            <p><a href="{{route('work', $work->slug)}}">{{$work->title}}</a></p>
        @endforeach
    @endsection
</x-home-master>
