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
                        <th>Lejárati idő</th>
                        <th>Borító</th>
                        <th>Létrehozva</th>
                        <th>Szerkesztve</th>
                        <th>Törlés</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($stories as $story)
                        <tr>
                            <td class="align-middle">{{ $story->id }}</td>
                            <td class="align-middle">
                                <a href="{{ route('story.edit', $story) }}">{{ $story->title }}</a>
                            </td>
                            <td class="align-middle">{{ $story->user->name }}</td>
                            <td class="align-middle">{{ $story->expiration_date }}</td>
                            <td>
                                <img width="100px" src="{{ $story->story_image }}" alt="{{ $story->title }}">
                            </td>
                            <td class="align-middle">{{ $story->created_at->diffForHumans() }}</td>
                            <td class="align-middle">{{ $story->updated_at->diffForHumans() }}</td>
                            <td class="align-middle">
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

    @endsection
</x-admin-master>
