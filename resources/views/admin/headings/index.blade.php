<x-admin-master>
    @section('content')
        <h1 class="mt-4">Összes rovat</h1>

        @if(session('message'))
            <div class="alert alert-danger">{{session('message')}}</div>
        @elseif(session('heading-created-message'))
            <div class="alert alert-success">{{session('heading-created-message')}}</div>
        @elseif(session('heading-updated-message'))
            <div class="alert alert-success">{{session('heading-updated-message')}}</div>
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
                    <th>Lapszám</th>
                    <th>Cím</th>
                    <th>Elkészült</th>
                    <th>Frissítve</th>
                    <th>Törlés</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Lapszám</th>
                    <th>Cím</th>
                    <th>Elkészült</th>
                    <th>Frissítve</th>
                    <th>Törlés</th>
                </tr>
                </tfoot>
                <tbody>
                @foreach($headings as $heading)
                    <tr>
                        <td>{{$heading->id}}</td>
                        <td>{{$heading->post->title}}</td>
                        <td><a href="{{route('heading.edit', $heading->id)}}">{{$heading->title}}</a></td>
                        <td>{{$heading->created_at->diffForHumans()}}</td>
                        <td>{{$heading->updated_at->diffForHumans()}}</td>
                        <td>
                            {{--@can('view', $post)--}}
                            <form method="post" action="{{route('heading.destroy', $heading->id)}}" enctype="multipart/form-data">
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
                {{$headings->links()}}
            </div>
        </div>
    @endsection
</x-admin-master>
