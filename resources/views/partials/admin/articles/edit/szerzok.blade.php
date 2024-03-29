<label for="user_id" class="control-label">Szerző (akihez a cikkben lévő művek tartoznak):</label>
<select name="user_id"
        id="user_id"
        class="form-control">

    @isset($article->user->id)

        @foreach($users as $user)
            <option value="{{ $user->id }}" {{ $article->user->id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
        @endforeach

    @else

        @foreach($users as $user)
            <option value="{{ $user->id }}">{{ $user->name }}</option>
        @endforeach

    @endisset
</select>
