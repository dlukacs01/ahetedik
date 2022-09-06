<x-admin-master>
    @section('content')

        <h1 class="mt-4">Hírek</h1>

        <x-admin.session-message></x-admin.session-message>

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable-stories" width="100%" cellspacing="0">
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
                            <td>{{ $story->id }}</td>
                            <td>
                                <a href="{{ route('story.edit', $story) }}">{{ $story->title }}</a>
                            </td>
                            <td>{{ $story->user->name }}</td>
                            <td>
                                <img width="100px" src="{{ $story->story_image }}" alt="{{ $story->title }}">
                            </td>
                            <td>{{ $story->expiration_date }}</td>
                            <td>{{ $story->created_at->diffForHumans() }}</td>
                            <td>{{ $story->updated_at->diffForHumans() }}</td>
                            <td>
                                <form method="post" action="{{ route('story.destroy', $story) }}">

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

        <x-admin-pagination :objects="$stories"></x-admin-pagination>

    @endsection
</x-admin-master>
