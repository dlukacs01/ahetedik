<x-admin-master>
    @section('content')

        <h1 class="mt-4">Cikkek</h1>

        <x-admin.session-message></x-admin.session-message>

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable-articles" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Lapszám</th>
                    <th>Rovat</th>
                    <th>Cím</th>
                    <th>Szerző</th>
                    <th>Elkészült</th>
                    <th>Frissítve</th>
                    <th>Törlés</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Lapszám</th>
                    <th>Rovat</th>
                    <th>Cím</th>
                    <th>Szerző</th>
                    <th>Elkészült</th>
                    <th>Frissítve</th>
                    <th>Törlés</th>
                </tr>
                </tfoot>
                <tbody>
                @foreach($articles as $article)
                    <tr>
                        <td>{{ $article->id }}</td>
                        <td>{{ $article->heading->post->title }}</td>
                        <td>{{ $article->heading->title }}</td>
                        <td><a href="{{ route('article.edit', $article->id) }}">{{ $article->title }}</a></td>
                        <td>
                            @if($article->user)
                            <a href="{{ route('article.edit', $article )}}">{{ $article->user->name }}</a>
                            @endif
                        </td>
                        <td>{{ $article->created_at->diffForHumans() }}</td>
                        <td>{{ $article->updated_at->diffForHumans() }}</td>
                        <td>
                            <form method="post" action="{{ route('article.destroy', $article) }}">

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

        <x-admin-pagination :objects="$articles"></x-admin-pagination>

    @endsection
</x-admin-master>
