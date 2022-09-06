<form method="post" action="{{ route('meta.update',$meta) }}">

    @csrf
    @method('PATCH')

    <div class="form-group">
        <label for="szerzoknek">Szerzőink figyelmébe</label>
        <textarea name="szerzoknek"
                  id="szerzoknek"
                  class="form-control @error('szerzoknek') is-invalid @enderror"
                  rows="10"
                  autofocus>{{ $meta->szerzoknek }}</textarea>

        @error('szerzoknek')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="nyilatkozat">Szerkesztőségi nyilatkozat</label>
        <textarea name="nyilatkozat"
                  id="nyilatkozat"
                  class="form-control @error('nyilatkozat') is-invalid @enderror"
                  rows="10">{{ $meta->nyilatkozat }}</textarea>

        @error('nyilatkozat')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="elvek">Szerkesztési elvek</label>
        <textarea name="elvek"
                  id="elvek"
                  class="form-control @error('elvek') is-invalid @enderror"
                  rows="10">{{ $meta->elvek }}</textarea>

        @error('elvek')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="jogok">Szerzői jogok</label>
        <textarea name="jogok"
                  id="jogok"
                  class="form-control @error('jogok') is-invalid @enderror"
                  rows="10">{{ $meta->jogok }}</textarea>

        @error('jogok')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="impresszum">Impresszum</label>
        <textarea name="impresszum"
                  id="impresszum"
                  class="form-control @error('impresszum') is-invalid @enderror"
                  rows="10">{{ $meta->impresszum }}</textarea>

        @error('impresszum')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="gdpr">Általános Adatvédelmi Nyilatkozat</label>
        <textarea name="gdpr"
                  id="gdpr"
                  class="form-control @error('gdpr') is-invalid @enderror"
                  rows="10">{{ $meta->gdpr }}</textarea>

        @error('gdpr')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <button type="submit" id="submit" class="btn btn-primary">Mentés</button>
</form>
