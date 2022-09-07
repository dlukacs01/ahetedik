<label for="user_id" class="control-label">Szerző (akihez a cikkben lévő művek tartoznak):</label>
<select name="user_id"
        id="user_id"
        class="form-control">

    @foreach($users as $user)
        <option value="{{ $user->id }}">{{ $user->name }}</option>
    @endforeach

</select>
