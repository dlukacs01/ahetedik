<x-admin-master>
    @section('content')
        <h1 class="mt-4">Összes hír (legújabb legelől, 10 hír / oldal)</h1>

        @if(session('message'))
            <div class="alert alert-danger">{{session('message')}}</div>
        @elseif(session('story-created-message'))
            <div class="alert alert-success">{{session('story-created-message')}}</div>
        @elseif(session('story-updated-message'))
            <div class="alert alert-success">{{session('story-updated-message')}}</div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Cím</th>
                    <th>Szerző</th>
                    <th>Borító</th>
                    <th>Lejárati idő</th>
                    <th>Elkészült</th>
                    <th>Frissítve</th>
                    <th>Törlés</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Cím</th>
                    <th>Szerző</th>
                    <th>Borító</th>
                    <th>Lejárati idő</th>
                    <th>Elkészült</th>
                    <th>Frissítve</th>
                    <th>Törlés</th>
                </tr>
                </tfoot>
                <tbody>
                @foreach($stories as $story)
                    <tr>
                        <td>{{$story->id}}</td>
                        <td><a href="{{route('story.edit', $story->id)}}">{{$story->title}}</a></td>
                        <td>{{$story->user->name}}</td>
                        <td>
                            <img width="100px" src="{{$story->story_image}}" alt="">
                        </td>
                        <td>{{$story->expiration_date}}</td>
                        <td>{{$story->created_at->diffForHumans()}}</td>
                        <td>{{$story->updated_at->diffForHumans()}}</td>
                        <td>
                            {{--@can('view', $post)--}}
                            <form method="post" action="{{route('story.destroy', $story->id)}}" enctype="multipart/form-data">
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

        <div class="d-flex">
            <div class="mx-auto">
                {{$stories->links()}}
            </div>
        </div>
    @endsection
</x-admin-master>
