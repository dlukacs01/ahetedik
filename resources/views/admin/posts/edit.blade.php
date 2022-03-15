<x-admin-master>
    @section('content')
        <h1 class="mt-4">Lapszám szerkesztése</h1>

        <form method="post" action="{{route('post.update', $post->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group required">
                <label for="title" class="control-label">Cím</label>
                <input type="text"
                       name="title"
                       class="form-control"
                       id="title"
                       aria-describedby=""
                       placeholder="Enter title"
                       required
                       value="{{$post->title}}">
            </div>
            <div class="form-group">
                <div><img height="100px" src="{{$post->post_image}}" alt=""></div>
                <label for="post_image">Borító</label>
                <input type="file" name="post_image" class="form-control-file" id="post_image">
            </div>
            <div class="form-group required">
                <label for="type" class="control-label">Megjelenik a főoldalon?</label>
                <select class="form-control" id="active" name="active">
                    <option value="1" {{$post->active == 1 ? 'selected' : ''}}>Igen</option>
                    <option value="0" {{$post->active == 0 ? 'selected' : ''}}>Nem</option>
                </select>
            </div>
{{--            <div class="form-group">--}}
{{--                <textarea name="body" class="form-control" id="body" cols="30" rows="10">{{$post->body}}</textarea>--}}
{{--            </div>--}}
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
