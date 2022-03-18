<x-home-master>
    @section('content')
        <h1 class="mt-4 mb-3">{{$category->name}}</h1>

        @foreach($works as $work)
            <x-home.work-card :work="$work"></x-home.work-card>
        @endforeach

        <div class="d-flex">
            <div class="mx-auto">
                {{$works->links()}}
            </div>
        </div>

    @endsection
</x-home-master>
