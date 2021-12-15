<x-admin-master>
    @section('content')
        <h1 class="mt-4">Új hír</h1>

        <form method="post" action="{{route('story.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Cím</label>
                <input type="text" name="title" class="form-control" id="title" aria-describedby="" placeholder="Írd be a címet">
            </div>
            <div class="form-group">
                <label for="work_image">Borító</label>
                <input type="file" name="story_image" class="form-control-file" id="story_image">
            </div>
            <div class="form-group">
                <textarea name="body" class="form-control" id="body" cols="30" rows="30"></textarea>
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
