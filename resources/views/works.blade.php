<x-home-master>
    @section('content')
        <h1 class="mt-4 mb-3">{{$category->name}}</h1>

        @foreach($works as $work)
            <x-home.work-card :work="$work"></x-home.work-card>
        @endforeach
    @endsection
</x-home-master>
