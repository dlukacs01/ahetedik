<x-home-master>
    @section('content')
        <h1>Profile page for this user: {{$user->name}}</h1>
        <h1>Művek ehhez a userhez: {{$user->name}}</h1>
        @foreach($works as $work)
            <p>{{$work->title}}</p>
        @endforeach
    @endsection
</x-home-master>
