<x-admin-master>
    @section('content')
        <h1 class="mt-4">Cikk szerkesztése</h1>

        <form method="post" action="{{route('article.update', $article->id)}}">
            @csrf
            @method('PATCH')
            <div class="form-group required">
                <label for="post_id" class="control-label">Lapszám:</label>
                <select class="form-control" id="post_id" name="post_id">
                    @foreach($posts as $post)
                        <option value="{{$post->id}}" {{$article->heading->post_id == $post->id ? 'selected' : ''}}>{{$post->title}}</option>
                    @endforeach
                </select>
            </div>

            <input name="article_id" id="article_id" type="hidden" value="{{$article->id}}">

            <div class="form-group required">
                <label for="heading_id" class="control-label">Rovat:</label>
                <select class="form-control" id="heading_id" name="heading_id"></select>
            </div>

            <div class="form-group required" id="ajax_result"></div>

            <div class="form-group required">
                <label for="body" class="control-label">Tartalom</label>
                <div>
                    @error('body')
                    <span><strong>{{$message}}</strong></span>
                    @enderror
                </div>
                <textarea name="body" class="form-control" id="body" cols="30" rows="20">{{$article->body}}</textarea>
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
                style_formats: [
                    {
                        title: 'Image Left',
                        selector: 'img',
                        styles: {
                            'float': 'left',
                            'margin': '0 10px 0 10px'
                        }
                    },
                    {
                        title: 'Image Right',
                        selector: 'img',
                        styles: {
                            'float': 'right',
                            'margin': '0 0 10px 10px'
                        }
                    }
                ]
            });
        </script>

        <script>
            $(document).ready(function() {
                $('#post_id').trigger("change");
            });
        </script>

        <script>
            $('#post_id').on('change',function(){
                $value=$(this).val();
                $article_id=$('#article_id').val();
                $.ajax({
                    type : 'get',
                    url : '{{Request::url()}}',
                    data:{'post_id':$value,'article_id':$article_id},
                    success:function(data){
                        $('#heading_id').html(data);
                        $('#heading_id').trigger("change");
                    }
                });
            })
        </script>

        <script>
            $('#heading_id').on('change',function(){
                $value=$(this).val();
                $article_id=$('#article_id').val();
                $.ajax({
                    type : 'get',
                    url : '{{Request::url()}}',
                    data:{'heading_id':$value,'article_id':$article_id},
                    success:function(data){
                        $('#ajax_result').html(data);
                    }
                });
            })
        </script>

        <script>
            $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
        </script>
    @endsection
</x-admin-master>
