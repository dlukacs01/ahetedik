<x-home-master>
    @section('content')
        <p class="font-weight-bold mt-4">Találatok a következőre: "{{$search}}"</p>

        <p class="text-muted" style="font-weight: 600">Szerzők <span class="font-weight-normal">({{count($users)}})</span></p>

        <div class="grid-container-users">

            @foreach($users as $user)

                <div class="grid-item-users d-flex">
                    <img src="{{$user->avatar}}" class="rounded" alt="">
                    <div class="ml-3">
                        <div><h5 class="my-1">{{$user->name}}</h5></div>
                        {{--                        <div><p class="text-secondary my-1">{{$user->profession}}</p></div>--}}
                        <a href="{{route('user.profile.show', $user->username)}}" class="btn btn-primary btn-sm my-1">Profil megtekintése</a>
                    </div>
                </div>

            @endforeach

        </div>

        <br>

        <p class="text-muted" style="font-weight: 600">Művek <span class="font-weight-normal">({{count($works)}})</span></p>

        @foreach($works as $work)
            <x-home.work-card :work="$work"></x-home.work-card>
        @endforeach

    @endsection
</x-home-master>
