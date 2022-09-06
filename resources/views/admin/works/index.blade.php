<x-admin-master>
    @section('content')

        <h1 class="mt-4">Művek</h1>

        <x-admin.session-message></x-admin.session-message>

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable-works" width="100%" cellspacing="0">
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
                            <td>{{ $work->id }}</td>
                            <td>
                                <a href="{{route('work.edit', $work) }}">{{ $work->title }}</a>
                            </td>
                            <td>{{ $work->user->name }}</td>
                            <td>
                                <img width="100px" src="{{ $work->work_image }}" alt="{{ $work->title }}">
                            </td>
                            <td>{{ $work->release_date }}</td>
                            <td>{{ $work->created_at->diffForHumans() }}</td>
                            <td>{{ $work->updated_at->diffForHumans() }}</td>
                            <td>
                                <form method="post" action="{{ route('work.destroy', $work )}}">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger">Törlés</button>
                                </form>
                            </td>
                            <td>{{ $work->active ? 'igen' : 'nem' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <x-admin-pagination :objects="$works"></x-admin-pagination>

    @endsection
</x-admin-master>
