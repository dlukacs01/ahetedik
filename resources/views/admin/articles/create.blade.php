<x-admin-master>
    @section('content')
        <h1 class="mt-4">Új cikk</h1>

        <form method="post" action="{{route('article.store')}}">
            @csrf
            <div class="form-group">
                <label for="post_id">Lapszám:</label>
                <select class="form-control" id="post_id" name="post_id">
                    @foreach($posts as $post)
                        <option value="{{$post->id}}">{{$post->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="heading_id">Rovat:</label>
                <select class="form-control" id="heading_id" name="heading_id">
                    @foreach($headings as $heading)
                        <option value="{{$heading->id}}">{{$heading->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="title">Cím</label>
                <input type="text" name="title" class="form-control" id="title" aria-describedby="" placeholder="Írd be a címet">
            </div>
            <div class="form-group">
                <label for="user_id">Szerző (akihez a cikkben lévő művek tartoznak):</label>
                <select class="form-control" id="user_id" name="user_id">
                    @foreach($users as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <textarea name="body" class="form-control" id="body" cols="30" rows="10"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Mentés</button>
        </form>
    @endsection

    @section('scripts')
        <script>
            tinymce.init({
                selector: 'textarea',
                plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                toolbar_mode: 'floating',
            });
        </script>

        <script>
            $('#post_id').on('change',function(){
                $value=$(this).val();
                $.ajax({
                    type : 'get',
                    url : '{{URL::to('admin/articles/create')}}',
                    data:{'post_id':$value},
                    success:function(data){
                        $('#heading_id').html(data);
                    }
                });
            })
        </script>

        <script>
            $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
        </script>
    @endsection
</x-admin-master>
