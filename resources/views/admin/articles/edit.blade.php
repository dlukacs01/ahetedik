<x-admin-master>
    @section('content')

        <h1 class="mt-4">Cikk szerkesztése</h1>

        <x-admin.forms.articles.edit :article="$article" :posts="$posts"></x-admin.forms.articles.edit>

    @endsection

    @section('scripts')
        @include('includes.tinyeditor');

        <script>
            $(document).ready(function(){
                $('#submit').click(function(event) {
                    if(tinymce.get('body').getContent().length < 1) {
                        alert('A tartalom mező kitöltése kötelező!');
                        event.preventDefault();
                    }
                });
            });
        </script>

        <script>
            $(document).ready(function() {
                $('#post_id').trigger("change");
            });
        </script>

        <script>
            $('#post_id').on('change',function(){
                $value = $(this).val();
                $article_id = $('#article_id').val();
                $.ajax({
                    type : 'get',
                    url : '{{ Request::url() }}',
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
                $value = $(this).val();
                $article_id = $('#article_id').val();
                $.ajax({
                    type : 'get',
                    url : '{{ Request::url() }}',
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
