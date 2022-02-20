<x-admin-master>
    @section('content')
        <h1 class="mt-4">Felhasználók</h1>

        @if(session('user-deleted'))
            <div class="alert alert-danger">{{session('user-deleted')}}</div>
        @endif
        @if(session('user-created'))
            <div class="alert alert-success">{{session('user-created')}}</div>
        @endif
        @if(session('user-updated'))
            <div class="alert alert-success">{{session('user-updated')}}</div>
        @endif

{{--        <div class="card mb-4">--}}
{{--            <div class="card-header">--}}
{{--                <i class="fas fa-table mr-1"></i>--}}
{{--                DataTable Example--}}
{{--            </div>--}}
{{--            <div class="card-body">--}}
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                                <td>{{$user->id}}</td>
                                <td>{{$user->username}}</td>
                                <td><img height="50px" src="{{$user->avatar}}" alt=""></td>
                                <td><a href="{{route('user.profile.edit', $user)}}">{{$user->name}}</a></td>
                                <td>{{$user->created_at->diffForHumans()}}</td>
                                <td>{{$user->updated_at->diffForHumans()}}</td>
                                <td>
                                    <form method="post" action="{{route('user.destroy', $user->id)}}" enctype="multipart/form-data">
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
{{--            </div>--}}
{{--        </div>--}}

        <div class="d-flex">
            <div class="mx-auto">
                {{$users->links()}}
            </div>
        </div>

    @endsection
</x-admin-master>
