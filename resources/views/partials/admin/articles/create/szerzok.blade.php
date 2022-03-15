<label for="user_id" class="control-label">Szerző (akihez a cikkben lévő művek tartoznak):</label>
<select class="form-control" id="user_id" name="user_id">
    @foreach($users as $user)
        <option value="{{$user->id}}">{{$user->name}}</option>
    @endforeach
</select>
