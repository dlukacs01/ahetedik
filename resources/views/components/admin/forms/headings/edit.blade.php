<form method="post" action="{{ route('heading.update', $heading) }}">

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
               value="{{ $heading->title }}">

        @error('title')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="position">Sorszám</label>
        <input type="number"
               name="position"
               id="position"
               class="form-control @error('position') is-invalid @enderror"
               required
               value="{{ $heading->position }}">

        @error('position')
        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group required">
        <label for="post_id" class="control-label">Lapszám:</label>
        <select name="post_id"
                id="post_id"
                class="form-control @error('post_id') is-invalid @enderror">

            @foreach($posts as $post)
                <option value="{{ $post->id }}" {{ $heading->post_id == $post->id ? 'selected' : '' }}>{{ $post->title }}</option>
            @endforeach

        </select>

        @error('post_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group required">
        <label for="type" class="control-label">Típus:</label>
        <select name="type"
                id="type"
                class="form-control @error('type') is-invalid @enderror">
            <option value="egyeb" {{ $heading->type == 'egyeb' ? 'selected' : '' }}>Egyéb</option>
            <option value="muvek" {{ $heading->type == 'muvek' ? 'selected' : '' }}>Művek</option>
        </select>

        @error('type')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary mb-3">Mentés</button>
</form>
