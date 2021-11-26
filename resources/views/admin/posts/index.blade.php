<x-admin-master>
    @section('content')
        <h1 class="mt-4">Összes lapszám</h1>

        @if(session('message'))
            <div class="alert alert-danger">{{session('message')}}</div>
        @elseif(session('post-created-message'))
            <div class="alert alert-success">{{session('post-created-message')}}</div>
        @elseif(session('post-updated-message'))
            <div class="alert alert-success">{{session('post-updated-message')}}</div>
        @endif

{{--        <div class="card mb-4">--}}
{{--            <div class="card-header">--}}
{{--                <i class="fas fa-table mr-1"></i>--}}
{{--                DataTable Example--}}
{{--            </div>--}}
{{--            <div class="card-body">--}}
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Szerző</th>
                            <th>Cím</th>
                            <th>Borító</th>
                            <th>Elkészült</th>
                            <th>Frissítve</th>
                            <th>Törlés</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Szerző</th>
                            <th>Cím</th>
                            <th>Borító</th>
                            <th>Elkészült</th>
                            <th>Frissítve</th>
                            <th>Törlés</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($posts as $post)
                        <tr>
                            <td>{{$post->id}}</td>
                            <td>{{$post->user->name}}</td>
                            <td><a href="{{route('post.edit', $post->id)}}">{{$post->title}}</a></td>
                            <td>
                                <img width="100px" src="{{$post->post_image}}" alt="">
                            </td>
                            <td>{{$post->created_at->diffForHumans()}}</td>
                            <td>{{$post->updated_at->diffForHumans()}}</td>
                            <td>
                                {{--@can('view', $post)--}}
                                <form method="post" action="{{route('post.destroy', $post->id)}}" enctype="multipart/form-data">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Törlés</button>
                                </form>
                                {{--@endcan--}}
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
{{--            </div>--}}
{{--        </div>--}}

        <div class="d-flex">
            <div class="mx-auto">
                {{$posts->links()}}
            </div>
        </div>
    @endsection
</x-admin-master>
