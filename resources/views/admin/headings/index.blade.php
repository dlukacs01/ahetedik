<x-admin-master>
    @section('content')

        <h1 class="mt-4">Rovatok</h1>

        <x-admin.session-message></x-admin.session-message>

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable-headings" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Lapszám</th>
                    <th>Típus</th>
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
                    <th>Típus</th>
                    <th>Cím</th>
                    <th>Elkészült</th>
                    <th>Frissítve</th>
                    <th>Törlés</th>
                </tr>
                </tfoot>
                <tbody>
                @foreach($headings as $heading)
                    <tr>
                        <td>{{ $heading->id }}</td>
                        <td>{{ $heading->post->title }}</td>
                        <td>{{ $heading->type }}</td>
                        <td>
                            <a href="{{ route('heading.edit', $heading) }}">{{ $heading->title }}</a>
                        </td>
                        <td>{{ $heading->created_at->diffForHumans() }}</td>
                        <td>{{ $heading->updated_at->diffForHumans() }}</td>
                        <td>
                            <form method="post" action="{{route('heading.destroy', $heading) }}">

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

        <x-admin-pagination :objects="$headings"></x-admin-pagination>

    @endsection
</x-admin-master>
