<x-admin-master>
    @section('content')
        <h1 class="mt-4">Összes mű (legújabb legelől, 10 mű / oldal)</h1>

        @if(session('message'))
            <div class="alert alert-danger">{{session('message')}}</div>
        @elseif(session('work-created-message'))
            <div class="alert alert-success">{{session('work-created-message')}}</div>
        @elseif(session('work-updated-message'))
            <div class="alert alert-success">{{session('work-updated-message')}}</div>
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
                            <th>Cím</th>
                            <th>Szerző</th>
                            <th>Borító</th>
                            <th>Megjelenési idő</th>
                            <th>Elkészült</th>
                            <th>Frissítve</th>
                            <th>Törlés</th>
                            <th>Kiemelt</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Cím</th>
                            <th>Szerző</th>
                            <th>Borító</th>
                            <th>Megjelenési idő</th>
                            <th>Elkészült</th>
                            <th>Frissítve</th>
                            <th>Törlés</th>
                            <th>Kiemelt</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($works as $work)
                        <tr>
                            <td>{{$work->id}}</td>
                            <td><a href="{{route('work.edit', $work->id)}}">{{$work->title}}</a></td>
                            <td>{{$work->user->name}}</td>
                            <td>
                                <img width="100px" src="{{$work->work_image}}" alt="">
                            </td>
                            <td>{{$work->release_date}}</td>
                            <td>{{$work->created_at->diffForHumans()}}</td>
                            <td>{{$work->updated_at->diffForHumans()}}</td>
                            <td>
                                {{--@can('view', $post)--}}
                                <form method="post" action="{{route('work.destroy', $work->id)}}" enctype="multipart/form-data">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Törlés</button>
                                </form>
                                {{--@endcan--}}
                            </td>
                            <td>{{$work->active ? 'igen' : 'nem'}}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
{{--            </div>--}}
{{--        </div>--}}

        <div class="d-flex">
            <div class="mx-auto">
                {{$works->links()}}
            </div>
        </div>
    @endsection
</x-admin-master>
