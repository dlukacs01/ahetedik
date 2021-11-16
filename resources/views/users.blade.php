<x-home-master>
    @section('content')

        <h1 class="mt-4">Szerzők</h1>

        <form action="/action_page.php">
            <div class="row">
                <div class="col-md-6">
                    <input type="text" class="form-control mb-2 mr-sm-2" id="search" placeholder="Szűrés név alapján" name="search">
                </div>
            </div>
        </form>

        <div class="grid-container-users">

            @foreach($users as $user)

                <div class="grid-item-users d-flex">
                    <img src="{{$user->avatar}}" class="rounded" alt="">
                    <div class="ml-3">
                        <div><h5 class="my-1">{{$user->name}}</h5></div>
{{--                        <div><p class="text-secondary my-1">{{$user->profession}}</p></div>--}}
                        <a href="{{route('user.profile.show', $user->username)}}" class="btn btn-primary btn-sm my-1">Profil megtekintése</a>
                    </div>
                </div>

            @endforeach

        </div>

    @endsection

    @section('scripts')
        <script>
            $('#search').on('keyup',function(){
                $value=$(this).val();
                $.ajax({
                    type : 'get',
                    url : '{{URL::to('szerzok')}}',
                    data:{'search':$value},
                    success:function(data){
                        $('.grid-container-users').html(data);
                    }
                });
            })
        </script>

        <script>
            $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
        </script>
    @endsection
</x-home-master>
