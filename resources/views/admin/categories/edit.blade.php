<x-admin-master>
    @section('content')
    <div class="row">
        <div class="col-sm-6">
            <h1 class="mt-4">Kategória szerkesztése</h1>
            <form method="post" action="{{route('category.update', $category->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="name">Név</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{$category->name}}">
                </div>
                <div class="form-group">
                    <div><img height="100px" src="{{$category->category_image}}" alt=""></div>
                    <label for="category_image">Borító</label>
                    <input type="file" name="category_image" class="form-control-file" id="category_image">
                </div>
                <button class="btn btn-primary">Mentés</button>
            </form>
        </div>
    </div>
    @endsection
</x-admin-master>
