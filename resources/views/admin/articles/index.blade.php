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
                        <th>Létrehozva</th>
                        <th>Szerkesztve</th>
                        <th>Törlés</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($articles as $article)
                        <tr>
                            <td class="align-middle">{{ $article->id }}</td>
                            <td class="align-middle">{{ $article->heading->post->title }}</td>
                            <td class="align-middle">{{ $article->heading->title }}</td>
                            <td class="align-middle">
                                <a href="{{ route('article.edit', $article->id) }}">{{ $article->title }}</a>
                            </td>
                            <td class="align-middle">
                                @if($article->user)
                                    <a href="{{ route('article.edit', $article )}}">{{ $article->user->name }}</a>
                                @endif
                            </td>
                            <td class="align-middle">{{ $article->created_at->diffForHumans() }}</td>
                            <td class="align-middle">{{ $article->updated_at->diffForHumans() }}</td>
                            <td class="align-middle">
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

    @endsection
</x-admin-master>
