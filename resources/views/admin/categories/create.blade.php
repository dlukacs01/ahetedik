<x-admin-master>
    @section('content')
        <h1 class="mt-4">Új kategória</h1>

        <form method="post" action="{{route('category.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Cím</label>
                <input type="text" name="name" class="form-control" id="name" aria-describedby="" placeholder="Írd be a címet">
            </div>
            <div class="form-group">
                <label for="category_image">Borító</label>
                <input type="file" name="category_image" class="form-control-file" id="category_image">
            </div>
            <button type="submit" class="btn btn-primary">Mentés</button>
        </form>
    @endsection
</x-admin-master>
