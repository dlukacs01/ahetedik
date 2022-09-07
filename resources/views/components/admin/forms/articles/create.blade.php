<form method="post" action="{{ route('article.store') }}">

    @csrf

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

    <!-- HEADINGS based on selected post -->
    <div class="form-group required">
        <label for="heading_id" class="control-label">Rovat:</label>
        <select name="heading_id" id="heading_id" class="form-control"></select>
    </div>

    <!-- TITLE or USER based on heading-type -->
    <div id="ajax_result" class="form-group required"></div>

    <div class="form-group required">
        <label for="body" class="control-label">Tartalom</label>
        <textarea name="body"
                  id="body"
                  class="form-control @error('body') is-invalid @enderror"
                  rows="10"></textarea>

        @error('body')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <button type="submit" id="submit" class="btn btn-primary mb-3">Mentés</button>
</form>
