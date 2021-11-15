<x-home-master>
    @section('content')
        <h1 class="mt-4 mb-3">Kategóriák</h1>

        @foreach($categories as $category)

            <div class="card mb-3">
                <img class="card-img-top" src="{{$category->category_image}}" alt="Card image" style="width:100%">
                <div class="card-body pb-1 pt-3">
                    <h5 class="card-title">
                        <a href="{{route('work.category', $category->slug)}}" class="stretched-link text-decoration-none text-body">{{$category->name}}</a>
                    </h5>
{{--                    <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>--}}
                </div>
            </div>

        @endforeach
    @endsection
</x-home-master>
