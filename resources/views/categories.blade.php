<x-home-master>
    @section('content')
        <h1>Kategóriák</h1>

        @foreach($categories as $category)
            <p><a href="{{route('work.category', $category->slug)}}">{{$category->name}}</a></p>
        @endforeach
    @endsection
</x-home-master>
