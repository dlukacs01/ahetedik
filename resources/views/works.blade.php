<x-home-master :title="$title">
    @section('content')

        <div class="row">
            <div class="col-md-8">

                <h1 class="mt-4 mb-3">{{$category->name}}</h1>

                @foreach($works as $work)
                    <x-home.work-card :work="$work"></x-home.work-card>
                @endforeach

                <x-home.pagination :objects="$works"></x-home.pagination>

            </div>

            <div class="col-md-4">
                <x-home.sidenav></x-home.sidenav>
            </div>
        </div>

    @endsection
</x-home-master>
