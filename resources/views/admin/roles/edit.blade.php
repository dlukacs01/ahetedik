<x-admin-master>
    @section('content')

    <div class="row">
        <div class="col-sm-6">
            <h1 class="mt-4">Szerepkör szerkesztése</h1>
            <form method="post" action="{{route('role.update', $role->id)}}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Név</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{$role->name}}">
                </div>
                <button class="btn btn-primary">Mentés</button>
            </form>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-lg-12">
            @if($permissions->isNotEmpty())
{{--            <div class="card mb-4">--}}
{{--                <div class="card-header">--}}
{{--                    <i class="fas fa-table mr-1"></i>--}}
{{--                    Permissions--}}
{{--                </div>--}}
{{--                <div class="card-body">--}}
                    <h3>Jogosultságok</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Opciók</th>
                                <th>Id</th>
                                <th>Név</th>
                                <th>Slug</th>
                                <th>Hozzárendel</th>
                                <th>Leválaszt</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Opciók</th>
                                <th>Id</th>
                                <th>Név</th>
                                <th>Slug</th>
                                <th>Hozzárendel</th>
                                <th>Leválaszt</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($permissions as $permission)
                                <tr>
                                    <td>
                                        <input type="checkbox"
                                               @foreach($role->permissions as $role_permission)
                                               @if($role_permission->slug == $permission->slug)
                                               checked
                                            @endif()
                                            @endforeach
                                        >
                                    </td>
                                    <td>{{$permission->id}}</td>
                                    <td>{{$permission->name}}</td>
                                    <td>{{$permission->slug}}</td>
                                    <td>
                                        <form method="post" action="{{route('role.permission.attach', $role)}}">
                                            @method('PUT')
                                            @csrf
                                            <input type="hidden" name="permission" value="{{$permission->id}}">
                                            <button
                                                type="submit"
                                                class="btn btn-primary"
                                                @if($role->permissions->contains($permission))
                                                disabled
                                                @endif
                                            >Hozzárendel
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <form method="post" action="{{route('role.permission.detach', $role)}}">
                                            @method('PUT')
                                            @csrf
                                            <input type="hidden" name="permission" value="{{$permission->id}}">
                                            <button
                                                type="submit"
                                                class="btn btn-danger"
                                                @if(!$role->permissions->contains($permission))
                                                disabled
                                                @endif
                                            >Leválaszt
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
{{--                </div>--}}
{{--            </div>--}}
            @endif
        </div>
    </div>
    @endsection
</x-admin-master>
