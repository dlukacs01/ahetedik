<x-admin-master>
    @section('content')
        <h1 class="mt-4">Új kategória</h1>

        <form method="post" action="{{route('category.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group required">
                <label for="name" class="control-label">Név</label>
                <input type="text" name="name" class="form-control" id="name" aria-describedby="" placeholder="Írd be a címet" required>
            </div>
            <div class="form-group required">
                <label for="category_image" class="control-label">Borító</label>
                <input type="file" name="category_image" class="form-control-file" id="category_image" required>
            </div>
            <button type="submit" class="btn btn-primary">Mentés</button>
        </form>
    @endsection
</x-admin-master>
