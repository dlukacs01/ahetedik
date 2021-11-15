<x-home-master>
    @section('content')

        <div class="d-flex mt-4">
            <div class="profile-img">
                <img src="{{$user->avatar}}" class="rounded-circle" alt="">
            </div>
            <div class="align-self-center">
                <h1 class="pl-4">{{$user->name}}</h1>
            </div>
        </div>

        <div class="mt-3">
            {!! $user->cv !!}
        </div>

        <hr>

        @foreach($works as $work)
            <x-home.work-card :work="$work"></x-home.work-card>
        @endforeach
    @endsection
</x-home-master>
