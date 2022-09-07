<form method="post" action="{{ route('post.store') }}" enctype="multipart/form-data">

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
               placeholder="Lapszám címe"
               value="{{ old('title') }}">

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
            <option value="1">Igen</option>
            <option value="0">Nem</option>
        </select>

        @error('active')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group required">
        <label for="post_image" class="control-label">Borító</label>
        <input type="file"
               name="post_image"
               id="post_image"
               class="form-control-file @error('post_image') is-invalid @enderror"
               required>

        @error('post_image')
        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary mb-3">Mentés</button>
</form>
