@foreach($users as $user)

    <div class="author-item p-3 rounded">

        <img src="{{ $user->avatar }}" class="rounded" alt="{{ $user->name }}">

        <div>
            <h5>{{ $user->name }}</h5>
            <a href="{{ route('user.profile.show', $user->username) }}" class="btn btn-primary btn-sm my-1">
                Profil megtekintése
            </a>
        </div>

    </div>

@endforeach
