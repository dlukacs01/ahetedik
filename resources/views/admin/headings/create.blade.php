<x-admin-master>
    @section('content')
        <h1 class="mt-4">Új rovat</h1>

        <form method="post" action="{{route('heading.store')}}">
            @csrf
            <div class="form-group required">
                <label for="post_id" class="control-label">Lapszám:</label>
                <select class="form-control" id="post_id" name="post_id">
                    @foreach($posts as $post)
                        <option value="{{$post->id}}">{{$post->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group required">
                <label for="type" class="control-label">Típus:</label>
                <select class="form-control" id="type" name="type">
                    <option value="egyeb">Egyéb</option>
                    <option value="muvek">Művek</option>
                </select>
            </div>
            <div class="form-group required">
                <label for="title" class="control-label">Cím</label>
                <input type="text" name="title" class="form-control" id="title" aria-describedby="" placeholder="Írd be a címet" required>
            </div>
            <button type="submit" class="btn btn-primary">Mentés</button>
        </form>
    @endsection
</x-admin-master>
