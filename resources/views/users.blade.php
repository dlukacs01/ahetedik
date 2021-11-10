<x-home-master>
    @section('content')
        <h1>Szerzők:</h1>
        @foreach($users as $user)
            <p><a href="{{route('user.profile.show', $user->username)}}">{{$user->name}}</a></p>
        @endforeach
    @endsection
</x-home-master>
