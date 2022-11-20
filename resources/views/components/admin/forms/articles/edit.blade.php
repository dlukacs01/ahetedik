<form method="post" action="{{ route('article.update', $article) }}">

    @csrf
    @method('PATCH')

    <div class="form-group required">
        <label for="post_id" class="control-label">Lapszám:</label>
        <select name="post_id"
                id="post_id"
                class="form-control @error('post_id') is-invalid @enderror">

            @foreach($posts as $post)
                <option value="{{ $post->id }}" {{ $article->heading->post_id == $post->id ? 'selected' : ''}}>{{ $post->title }}</option>
            @endforeach

        </select>

        @error('post_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <input type="hidden"
           name="article_id"
           id="article_id"
           value="{{ $article->id }}">

    <div class="form-group required">
        <label for="heading_id" class="control-label">Rovat:</label>
        <select name="heading_id" class="form-control" id="heading_id"></select>
    </div>

    <div class="form-group required" id="ajax_result"></div>

    <div class="form-group required">
        <label for="body" class="control-label">Tartalom</label>
        <textarea name="body"
                  id="body"
                  class="form-control @error('body') is-invalid @enderror"
                  rows="20">{{ $article->body }}</textarea>

        @error('body')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <button type="submit" id="submit" class="btn btn-primary">Mentés</button>
</form>
