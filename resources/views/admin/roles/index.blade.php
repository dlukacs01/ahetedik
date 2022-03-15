<x-admin-master>
    @section('content')
        <h1 class="mt-4">Szerepkörök</h1>

        @if(session()->has('role-deleted'))
            <div class="alert alert-danger">
                {{session('role-deleted')}}
            </div>
        @endif
        @if(session()->has('role-created'))
            <div class="alert alert-success">
                {{session('role-created')}}
            </div>
        @endif
        @if(session()->has('role-updated'))
            <div class="alert alert-success">
                {{session('role-updated')}}
            </div>
        @endif

        <div class="row">
            <div class="col-sm-3">
                <form method="post" action="{{route('role.store')}}">
                    @csrf
                    <div class="form-group required">
                        <label for="name" class="control-label">Név</label>
                        <input
                            type="text"
                            name="name"
                            id="name"
                            required
                            class="form-control @error('name') is-invalid @enderror">
                        <div>
                            @error('name')
                                <span><strong>{{$message}}</strong></span>
                            @enderror
                        </div>
                    </div>
                    <button class="btn btn-primary btn-block" type="submit">Mentés</button>
                </form>
            </div>
            <div class="col-sm-9">
{{--                <div class="card mb-4">--}}
{{--                    <div class="card-header">--}}
{{--                        <i class="fas fa-table mr-1"></i>--}}
{{--                        Roles--}}
{{--                    </div>--}}
{{--                    <div class="card-body">--}}
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Név</th>
                                    <th>Slug</th>
                                    <th>Törlés</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Név</th>
                                    <th>Slug</th>
                                    <th>Törlés</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($roles as $role)
                                    <tr>
                                        <td>{{$role->id}}</td>
                                        <td><a href="{{route('role.edit', $role->id)}}">{{$role->name}}</a></td>
                                        <td>{{$role->slug}}</td>
                                        <td>
                                            <form method="post" action="{{route('role.destroy', $role->id)}}">
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
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
    @endsection
</x-admin-master>
