<x-admin-master>
    @section('content')
        <h1 class="mt-4">Hír szerkesztése</h1>

        <form method="post" action="{{route('story.update', $story->id)}}" enctype="multipart/form-data">
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
                       value="{{$story->title}}">
            </div>
            <div class="form-group">
                <div><img height="100px" src="{{$story->story_image}}" alt=""></div>
                <label for="story_image">Borító</label>
                <input type="file" name="story_image" class="form-control-file" id="story_image">
            </div>
            <div class="form-group">
                <textarea name="body" class="form-control" id="body" cols="30" rows="10">{{$story->body}}</textarea>
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
