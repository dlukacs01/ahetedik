<label for="user_id">Szerző (akihez a cikkben lévő művek tartoznak):</label>
<select class="form-control" id="user_id" name="user_id">
    @foreach($users as $user)
        <option value="{{$user->id}}" {{$article->user->id == $user->id ? 'selected' : ''}}>{{$user->name}}</option>
    @endforeach
</select>