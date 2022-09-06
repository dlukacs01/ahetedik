<form method="post" action="{{ route('work.store') }}" enctype="multipart/form-data">

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
               placeholder="Mű címe"
               value="{{ old('title') }}">

        @error('title')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group required">
        <label for="release_date" class="control-label">Megjelenési idő</label>
        <input type="date"
               name="release_date"
               id="release_date"
               class="form-control @error('release_date') is-invalid @enderror"
               required>

        @error('release_date')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group required">
        <label for="" class="control-label">Kategóriák</label>

        @foreach($categories as $category)
            <div class="form-check">
                <label class="form-check-label" for="{{ $category->id }}">
                    <div class="checkbox-group">
                        <input type="checkbox"
                                class="form-check-input"
                                name="categories[]"
                                id="{{ $category->id }}"
                                value="{{ $category->id }}">
                        {{ $category->name }}</div>
                </label>
            </div>
        @endforeach

    </div>

    <div class="form-group required">
        <label for="user_id" class="control-label">Szerző:</label>
        <select name="user_id"
                id="user_id"
                class="form-control @error('user_id') is-invalid @enderror">

            @foreach($users as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach

        </select>

        @error('user_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group required">
        <label for="type" class="control-label">Kiemelt mű?</label>
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
        <label for="body" class="control-label">Tartalom</label>
        <textarea name="body"
                  id="body"
                  class="form-control"
                  rows="10"></textarea>

        @error('body')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="work_image">Borító</label>
        <input type="file"
               name="work_image"
               id="work_image"
               class="form-control-file @error('work_image') is-invalid @enderror">

        @error('work_image')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <button type="submit" id="submit" class="btn btn-primary">Mentés</button>
</form>
