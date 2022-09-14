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
        <label for="release_date" class="control-label">Megjelenési idő</label>
        <input type="date"
               name="release_date"
               id="release_date"
               class="form-control @error('release_date') is-invalid @enderror"
               required
               value="{{ $post->release_date }}">

        @error('release_date')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group required">
        <label for="status" class="control-label">Státusz</label>
        <select name="status"
                id="status"
                class="form-control @error('status') is-invalid @enderror">
            <option value="piszkozat" {{ $post->status == 'piszkozat' ? 'selected' : '' }}>Piszkozat</option>
            <option value="eles" {{ $post->status == 'eles' ? 'selected' : '' }}>Éles</option>
        </select>

        @error('status')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group required">
        <label for="active" class="control-label">Megjelenik a főoldalon?</label>
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

    <button type="submit" class="btn btn-primary mb-3">Mentés</button>
</form>
