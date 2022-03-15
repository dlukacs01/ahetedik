<x-admin-master>
    @section('content')
        <h1 class="mt-4">Új hír</h1>

        <form method="post" action="{{route('story.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group required">
                <label for="title" class="control-label">Cím</label>
                <input type="text" name="title" class="form-control" id="title" aria-describedby="" placeholder="Írd be a címet" required>
            </div>
            <div class="form-group required">
                <label for="expiration_date" class="control-label">Lejárati idő</label>
                <input type="date" name="expiration_date" class="form-control" id="expiration_date" aria-describedby="" required>
            </div>
            <div class="form-group required">
                <label for="work_image" class="control-label">Borító</label>
                <input type="file" name="story_image" class="form-control-file" id="story_image" required>
            </div>
            <div class="form-group required">
                <label for="body" class="control-label">Tartalom</label>
                <div>
                    @error('body')
                    <span><strong>{{$message}}</strong></span>
                    @enderror
                </div>
                <textarea name="body" class="form-control" id="body" cols="30" rows="20"></textarea>
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
