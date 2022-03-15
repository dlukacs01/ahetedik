<x-admin-master>
    @section('content')
        <h1 class="mt-4">Jogosultságok</h1>

        @if(session()->has('permission-deleted'))
            <div class="alert alert-danger">
                {{session('permission-deleted')}}
            </div>
        @endif
        @if(session()->has('permission-created'))
            <div class="alert alert-success">
                {{session('permission-created')}}
            </div>
        @endif
        @if(session()->has('permission-updated'))
            <div class="alert alert-success">
                {{session('permission-updated')}}
            </div>
        @endif

        <div class="row">
            <div class="col-sm-3">
                <form method="post" action="{{route('permission.store')}}">
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
{{--                        Permissions--}}
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
                                @foreach($permissions as $permission)
                                    <tr>
                                        <td>{{$permission->id}}</td>
                                        <td><a href="{{route('permission.edit', $permission->id)}}">{{$permission->name}}</a></td>
                                        <td>{{$permission->slug}}</td>
                                        <td>
                                            <form method="post" action="{{route('permission.destroy', $permission->id)}}">
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
