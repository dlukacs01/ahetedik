<form method="post" action="{{ route('post.update', $post) }}" enctype="multipart/form-data">

    @csrf
    @method('PATCH')

    <div class="form-group required">
        <label for="title" class="control-label">Cím</label>
        <input type="text"
               name="title"
               id="title"
               class="form-control @error('title') is-invalid @enderror"
               required
               autofocus
               value="{{ $post->title }}">

        @error('title')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group required">
        <label for="type" class="control-label">Megjelenik a főoldalon?</label>
        <select name="active"
                id="active"
                class="form-control @error('active') is-invalid @enderror">
            <option value="1" {{ $post->active == 1 ? 'selected' : '' }}>Igen</option>
            <option value="0" {{ $post->active == 0 ? 'selected' : '' }}>Nem</option>
        </select>

        @error('active')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="post_image">Borító</label>
        <input type="file"
               name="post_image"
               id="post_image"
               class="form-control-file @error('post_image') is-invalid @enderror">

        @error('post_image')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="mb-3">
        <img height="100px" src="{{ $post->post_image }}" alt="{{ $post->title }}">
    </div>

    <button type="submit" class="btn btn-primary">Mentés</button>
</form>
