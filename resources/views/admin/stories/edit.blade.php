<x-admin-master>
    @section('content')
        <h1 class="mt-4">Hír szerkesztése</h1>

        <form method="post" action="{{route('story.update', $story->id)}}" enctype="multipart/form-data">
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
                       value="{{$story->title}}">
            </div>
            <div class="form-group required">
                <label for="expiration_date" class="control-label">Lejárati idő</label>
                <input type="date"
                       name="expiration_date"
                       class="form-control"
                       id="expiration_date"
                       aria-describedby=""
                       required
                       value="{{$story->expiration_date}}">
            </div>
            <div class="form-group">
                <div><img height="100px" src="{{$story->story_image}}" alt=""></div>
                <label for="story_image">Borító</label>
                <input type="file" name="story_image" class="form-control-file" id="story_image">
            </div>
            <div class="form-group required">
                <label for="body" class="control-label">Tartalom</label>
                <div>
                    @error('body')
                    <span><strong>{{$message}}</strong></span>
                    @enderror
                </div>
                <textarea name="body" class="form-control" id="body" cols="30" rows="20">{{$story->body}}</textarea>
            </div>
            <button type="submit" id="submit" class="btn btn-primary">Mentés</button>
        </form>
    @endsection

    @section('scripts')
        @include('includes.tinyeditor');

        <script>
            $(document).ready(function(){
                $('#submit').click(function(event) {
                    if(tinymce.get('body').getContent().length < 1) {
                        alert('A tartalom mező kitöltése kötelező!');
                        event.preventDefault();
                    }
                });
            });
        </script>
    @endsection
</x-admin-master>
