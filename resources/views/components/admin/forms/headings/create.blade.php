<form method="post" action="{{ route('heading.store') }}">

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
               placeholder="Rovat címe"
               value="{{ old('title') }}">

        @error('title')
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
                <option value="{{ $post->id }}">{{ $post->title }}</option>
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
            <option value="egyeb">Egyéb</option>
            <option value="muvek">Művek</option>
        </select>

        @error('type')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Mentés</button>
</form>
