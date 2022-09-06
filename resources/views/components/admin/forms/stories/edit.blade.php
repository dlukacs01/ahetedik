<form method="post" action="{{ route('story.update', $story) }}" enctype="multipart/form-data">

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
               value="{{ $story->title }}">

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
               required
               value="{{ $story->expiration_date }}">

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
            class="form-control @error('body') is-invalid @enderror"
            id="body"
            required
            rows="10">{{ $story->body }}</textarea>

        @error('body')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="story_image">Borító</label>
        <input type="file"
               name="story_image"
               id="story_image"
               class="form-control-file @error('story_image') is-invalid @enderror">

        @error('story_image')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div>
        <img height="100px" src="{{ $story->story_image }}" alt="{{ $story->title }}">
    </div>

    <button type="submit" id="submit" class="btn btn-primary">Mentés</button>
</form>
