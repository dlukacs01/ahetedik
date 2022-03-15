<x-admin-master>
    @section('content')
        <h1 class="mt-4">Új cikk</h1>

        <form method="post" action="{{route('article.store')}}">
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
                <textarea name="body" class="form-control" id="body" cols="30" rows="20"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Mentés</button>
        </form>
    @endsection

    @section('scripts')
        @include('includes.tinyeditor');

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
