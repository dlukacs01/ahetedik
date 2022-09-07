<form method="post" action="{{ route('category.update', $category) }}" enctype="multipart/form-data">

    @csrf
    @method('PATCH')

    <div class="form-group required">
        <label for="name" class="control-label">Név</label>
        <input type="text"
               name="name"
               id="name"
               class="form-control @error('name') is-invalid @enderror"
               required
               autofocus
               value="{{ $category->name }}">

        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="category_image">Borító</label>
        <input type="file"
               name="category_image"
               id="category_image @error('category_image') is-invalid @enderror"
               class="form-control-file">

        @error('category_image')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="mb-3">
        <img height="100px" src="{{ $category->category_image }}" alt="{{ $category->name }}">
    </div>

    <button type="submit" class="btn btn-primary mb-3">Mentés</button>
</form>
