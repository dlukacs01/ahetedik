@foreach($users as $user)

    <div class="grid-item-users d-flex">

        <img src="{{$user->avatar}}" class="rounded" alt="">

        <div class="ml-3">

            <div>
                <h5 class="my-1">{{ $user->name }}</h5>
            </div>

            <a href="{{ route('user.profile.show', $user->username) }}" class="btn btn-primary btn-sm my-1">Profil megtekintése</a>
        </div>
    </div>

@endforeach
