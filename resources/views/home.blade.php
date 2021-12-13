<x-home-master>
@section('content')

{{--    <h1 class="my-4">Page Heading--}}
{{--        <small>Secondary Text</small>--}}
{{--    </h1>--}}

    <!-- Blog Post -->
    @foreach($posts as $post)
    <x-home.post :post="$post"></x-home.post>
    @endforeach

@endsection
</x-home-master>
