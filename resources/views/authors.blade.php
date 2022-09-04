<x-home-master :title="$title">
    @section('content')

        <x-home.forms.poets-filter></x-home.forms.poets-filter>

        <div class="row">
            <div class="col-md-8">

                <h1 class="mt-4">Szerzők</h1>

                <div class="authors-container">
                    <x-home.authors :users="$users"></x-home.authors>
                </div>

                <x-home.pagination :objects="$users"></x-home.pagination>

            </div>

            <div class="col-md-4">
                <x-home.sidenav></x-home.sidenav>
            </div>
        </div>

    @endsection

    @section('scripts')
        <script>
            $('#search').on('keyup',function(){
                $search_value = $(this).val();
                $.ajax({
                    type : 'get',
                    url : '{{ route('user.authors') }}',
                    data:{'search_key':$search_value},
                    success:function(data){
                        $('.authors-container').html(data);
                    }
                });
            })
        </script>

        <script>
            $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
        </script>
    @endsection
</x-home-master>
