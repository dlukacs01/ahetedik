<x-admin-master>
    @section('content')

        <h1 class="mt-4">Felhasználók</h1>

        <x-admin.session-message></x-admin.session-message>

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable-users" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Név</th>
                        <th>Felhasználónév</th>
                        <th>Avatar</th>
                        <th>Regisztrációs dátum</th>
                        <th>Profil frissítve</th>
                        <th>Törlés</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td class="align-middle">
                                <a href="{{ route('user.profile.edit', $user) }}">{{ $user->name }}</a>
                            </td>
                            <td class="align-middle">{{ $user->username }}</td>
                            <td>
                                <img height="50px" src="{{ $user->avatar }}" alt="{{ $user->name }}">
                            </td>
                            <td class="align-middle">{{ $user->created_at->diffForHumans() }}</td>
                            <td class="align-middle">{{ $user->updated_at->diffForHumans() }}</td>
                            <td class="align-middle">
                                <form method="post" action="{{ route('user.destroy', $user) }}">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger">Törlés</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <x-admin.pagination :objects="$users"></x-admin.pagination>

    @endsection
</x-admin-master>
