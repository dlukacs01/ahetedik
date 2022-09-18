<x-admin-master>
    @section('content')

        <h1 class="mt-4">Rovatok</h1>

        <x-admin.session-message></x-admin.session-message>

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable-headings" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Cím</th>
                        <th>Lapszám</th>
                        <th>Típus</th>
                        <th>Létrehozva</th>
                        <th>Szerkesztve</th>
                        <th>Törlés</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($headings as $heading)
                    <tr>
                        <td class="align-middle">{{ $heading->id }}</td>
                        <td class="align-middle">
                            <a href="{{ route('heading.edit', $heading) }}">{{ $heading->title }}</a>
                        </td>
                        <td class="align-middle">{{ $heading->post->title }}</td>
                        <td class="align-middle">
                            @if($heading->type == "muvek") Művek @endif
                            @if($heading->type == "egyeb") Egyéb @endif
                        </td>
                        <td class="align-middle">{{ $heading->created_at->diffForHumans() }}</td>
                        <td class="align-middle">{{ $heading->updated_at->diffForHumans() }}</td>
                        <td class="align-middle">
                            <form method="post" action="{{ route('heading.destroy', $heading) }}">

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

        <x-admin.pagination :objects="$headings"></x-admin.pagination>

    @endsection
</x-admin-master>
