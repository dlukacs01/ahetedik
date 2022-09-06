<x-admin-master>
    @section('content')

        <h1 class="mt-4">Felhasználók</h1>

        <x-admin.session-message></x-admin.session-message>

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable-users" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Felhasználónév</th>
                        <th>Avatar</th>
                        <th>Név</th>
                        <th>Regisztrációs dátum</th>
                        <th>Profil frissítve</th>
                        <th>Törlés</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Felhasználónév</th>
                        <th>Avatar</th>
                        <th>Név</th>
                        <th>Regisztrációs dátum</th>
                        <th>Profil frissítve</th>
                        <th>Törlés</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->username }}</td>
                            <td>
                                <img height="50px" src="{{$user->avatar}}" alt="{{ $user->name }}">
                            </td>
                            <td>
                                <a href="{{ route('user.profile.edit', $user) }}">{{ $user->name }}</a>
                            </td>
                            <td>{{ $user->created_at->diffForHumans() }}</td>
                            <td>{{ $user->updated_at->diffForHumans() }}</td>
                            <td>
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

        <x-admin-pagination :objects="$users"></x-admin-pagination>

    @endsection
</x-admin-master>
