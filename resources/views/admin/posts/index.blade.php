<x-admin-master>
    @section('content')

        <h1 class="mt-4">Lapszámok</h1>

        <x-admin.session-message></x-admin.session-message>

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable-posts" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Cím</th>
                        <th>Szerző</th>
                        <th>Borító</th>
                        <th>Létrehozva</th>
                        <th>Szerkesztve</th>
                        <th>Aktív</th>
                        <th>Törlés</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td class="align-middle">
                                <a href="{{ route('post.edit', $post) }}">{{ $post->title }}</a>
                            </td>
                            <td class="align-middle">{{ $post->user->name }}</td>
                            <td>
                                <img width="100px" src="{{ $post->post_image }}" alt="{{ $post->title }}">
                            </td>
                            <td class="align-middle">{{ $post->created_at->diffForHumans() }}</td>
                            <td class="align-middle">{{ $post->updated_at->diffForHumans() }}</td>
                            <td class="align-middle">{{ $post->active ? 'igen' : 'nem' }}</td>
                            <td class="align-middle">
                                <form method="post" action="{{ route('post.destroy', $post) }}">

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

        <x-admin.pagination :objects="$posts"></x-admin.pagination>

    @endsection
</x-admin-master>
