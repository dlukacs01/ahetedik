<x-admin-master>
    @section('content')
        <h1 class="mt-4">Rovat szerkesztése</h1>

        <form method="post" action="{{route('heading.update', $heading->id)}}">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="post_id">Lapszám:</label>
                <select class="form-control" id="post_id" name="post_id">
                    @foreach($posts as $post)
                        <option value="{{$post->id}}" {{$heading->post_id == $post->id ? 'selected' : ''}}>{{$post->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="title">Cím</label>
                <input type="text" name="title" class="form-control" id="title" aria-describedby="" placeholder="Írd be a címet" value="{{$heading->title}}">
            </div>
            <button type="submit" class="btn btn-primary">Mentés</button>
        </form>
    @endsection
</x-admin-master>
