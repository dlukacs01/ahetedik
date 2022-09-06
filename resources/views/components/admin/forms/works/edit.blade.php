<form method="post" action="{{ route('work.update', $work) }}" enctype="multipart/form-data">

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
               value="{{ $work->title }}">

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
               required
               value="{{ $work->release_date }}">

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
                <label class="form-check-label" for="{{$category->id}}">
                    <div class="checkbox-group required-chckbx">
                        <input
                            type="checkbox"
                            class="form-check-input"
                            name="categories[]"
                            id="{{ $category->id }}"
                            value="{{ $category->id }}"
                            @foreach($work->categories as $work_category)
                                @if($category->name === $work_category->name)
                                checked
                                @endif
                            @endforeach
                        >{{ $category->name }}
                    </div>
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
                <option value="{{ $user->id }}" {{ $work->user->id == $user->id ? 'selected' : ''}}>
                    {{ $user->name }}
                </option>
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
            <option value="1" {{ $work->active == 1 ? 'selected' : '' }}>Igen</option>
            <option value="0" {{ $work->active == 0 ? 'selected' : '' }}>Nem</option>
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
                  class="form-control @error('body') is-invalid @enderror"
                  id="body"
                  rows="10">{{ $work->body }}</textarea>

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

    <div>
        <img height="100px" src="{{ $work->work_image }}" alt="{{ $work->title }}">
    </div>

    <button type="submit" id="submit" class="btn btn-primary">Mentés</button>
</form>
