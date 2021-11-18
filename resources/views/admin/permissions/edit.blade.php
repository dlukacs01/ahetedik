<x-admin-master>
    @section('content')

        <div class="row">
            <div class="col-sm-6">
                <h1 class="mt-4">Jogosultság szerkesztése</h1>
                <form method="post" action="{{route('permission.update', $permission->id)}}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Név</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{$permission->name}}">
                    </div>
                    <button class="btn btn-primary">Mentés</button>
                </form>
            </div>
        </div>
    @endsection
</x-admin-master>
