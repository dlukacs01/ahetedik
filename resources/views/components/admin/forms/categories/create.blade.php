<form method="post" action="{{ route('category.store') }}" enctype="multipart/form-data">

    @csrf

    <div class="form-group required">
        <label for="name" class="control-label">Név</label>
        <input type="text"
               name="name"
               id="name"
               class="form-control @error('name') is-invalid @enderror"
               required
               autofocus
               placeholder="Kategória neve"
               value="{{ old('name') }}">

        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group required">
        <label for="category_image" class="control-label">Borító</label>
        <input type="file"
               name="category_image"
               id="category_image"
               class="form-control-file @error('category_image') is-invalid @enderror"
               required>

        @error('category_image')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Mentés</button>
</form>
