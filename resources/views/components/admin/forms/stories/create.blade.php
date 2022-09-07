<form method="post" action="{{ route('story.store') }}" enctype="multipart/form-data">

    @csrf

    <div class="form-group required">
        <label for="title" class="control-label">Cím</label>
        <input type="text"
               name="title"
               id="title"
               class="form-control @error('title') is-invalid @enderror"
               required
               autofocus
               autocomplete="title"
               placeholder="Hír címe"
               value="{{ old('title') }}">

        @error('title')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group required">
        <label for="expiration_date" class="control-label">Lejárati idő</label>
        <input type="date"
               name="expiration_date"
               id="expiration_date"
               class="form-control @error('expiration_date') is-invalid @enderror"
               required>

        @error('expiration_date')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group required">
        <label for="body" class="control-label">Tartalom</label>
        <textarea
            name="body"
            id="body"
            class="form-control @error('body') is-invalid @enderror"
            rows="10"></textarea>

        @error('body')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group required">
        <label for="work_image" class="control-label">Borító</label>
        <input type="file"
               name="story_image"
               id="story_image"
               class="form-control-file @error('story_image') is-invalid @enderror"
               required>

        @error('story_image')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <button type="submit" id="submit" class="btn btn-primary mb-3">Mentés</button>
</form>
