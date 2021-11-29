<x-admin-master>
    @section('content')
        <h1 class="mt-4">Mű szerkesztése</h1>

        <form method="post" action="{{route('work.update', $work->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="title">Cím</label>
                <input type="text"
                       name="title"
                       class="form-control"
                       id="title"
                       aria-describedby=""
                       placeholder="Enter title"
                       value="{{$work->title}}">
            </div>
            <div class="form-group">
                <label for="category_id">Kategória:</label>
                <select class="form-control" id="category_id" name="category_id">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}" {{$work->category_id == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="user_id">Szerző:</label>
                <select class="form-control" id="user_id" name="user_id">
                    @foreach($users as $user)
                        <option value="{{$user->id}}" {{$work->user->id == $user->id ? 'selected' : ''}}>{{$user->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <div><img height="100px" src="{{$work->work_image}}" alt=""></div>
                <label for="work_image">Borító</label>
                <input type="file" name="work_image" class="form-control-file" id="work_image">
            </div>
            <div class="form-group">
                <textarea name="body" class="form-control" id="body" cols="30" rows="10">{{$work->body}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Mentés</button>
        </form>
    @endsection

    @section('scripts')
        <script>
            tinymce.init({
                selector: 'textarea',
                plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                toolbar_mode: 'floating',
            });
        </script>
    @endsection
</x-admin-master>
