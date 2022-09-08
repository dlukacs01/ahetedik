<x-admin-master>
    @section('content')

        <h1 class="mt-4">Művek</h1>

        <x-admin.session-message></x-admin.session-message>

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable-works" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Cím</th>
                        <th>Szerző</th>
                        <th>Megjelenési idő</th>
                        <th>Borító</th>
                        <th>Kiemelt</th>
                        <th>Létrehozva</th>
                        <th>Szerkesztve</th>
                        <th>Törlés</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($works as $work)
                        <tr>
                            <td class="align-middle">
                                <a href="{{route('work.edit', $work) }}">{{ $work->title }}</a>
                            </td>
                            <td class="align-middle">{{ $work->user->name }}</td>
                            <td class="align-middle">{{ $work->release_date }}</td>
                            <td>
                                @if(strpos($work->work_image, 'default_work_image') !== FALSE and strpos($work->user->avatar, 'default_avatar') === FALSE)
                                    <img width="100px" src="{{ $work->user->avatar }}" alt="{{ $work->title }}">
                                @else
                                    <img width="100px" src="{{ $work->work_image }}" alt="{{ $work->title }}">
                                @endif
                            </td>
                            <td class="align-middle">{{ $work->active ? 'igen' : 'nem' }}</td>
                            <td class="align-middle">{{ $work->created_at->diffForHumans() }}</td>
                            <td class="align-middle">{{ $work->updated_at->diffForHumans() }}</td>
                            <td class="align-middle">
                                <form method="post" action="{{ route('work.destroy', $work )}}">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger">Törlés</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <x-admin.pagination :objects="$works"></x-admin.pagination>

    @endsection
</x-admin-master>
