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
                <select class="form-control" id="heading_id" name="heading_id"></select>
            </div>

            <div class="form-group" id="ajax_result"></div>

            <div class="form-group">
                <textarea name="body" class="form-control" id="body" cols="30" rows="30"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Mentés</button>
        </form>
    @endsection

    @section('scripts')
        <script>
            tinymce.init({
                selector: 'textarea',
                // content_style: "p {margin: 0}",
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
                $.ajax({
                    type : 'get',
                    url : '{{URL::to('admin/articles/create')}}',
                    data:{'post_id':$value},
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
                $.ajax({
                    type : 'get',
                    url : '{{URL::to('admin/articles/create')}}',
                    data:{'heading_id':$value},
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
