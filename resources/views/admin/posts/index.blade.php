<x-admin-master>
    @section('content')

        <h1 class="mt-4">Lapszámok</h1>

        <x-admin.session-message></x-admin.session-message>

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable-posts" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Szerző</th>
                        <th>Cím</th>
                        <th>Borító</th>
                        <th>Elkészült</th>
                        <th>Frissítve</th>
                        <th>Törlés</th>
                        <th>Aktív</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Szerző</th>
                        <th>Cím</th>
                        <th>Borító</th>
                        <th>Elkészült</th>
                        <th>Frissítve</th>
                        <th>Törlés</th>
                        <th>Aktív</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->user->name }}</td>
                            <td>
                                <a href="{{ route('post.edit', $post) }}">{{ $post->title }}</a>
                            </td>
                            <td>
                                <img width="100px" src="{{ $post->post_image }}" alt="{{ $post->title }}">
                            </td>
                            <td>{{ $post->created_at->diffForHumans() }}</td>
                            <td>{{ $post->updated_at->diffForHumans() }}</td>
                            <td>
                                <form method="post" action="{{ route('post.destroy', $post) }}">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger">Törlés</button>
                                </form>
                            </td>
                            <td>{{ $post->active ? 'igen' : 'nem' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <x-admin-pagination :objects="$posts"></x-admin-pagination>

    @endsection
</x-admin-master>
