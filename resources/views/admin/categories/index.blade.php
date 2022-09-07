<x-admin-master>
    @section('content')

        <h1 class="mt-4">Kategóriák</h1>

        <x-admin.session-message></x-admin.session-message>

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Név</th>
                        <th>Slug</th>
                        <th>Borító</th>
                        <th>Törlés</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td class="align-middle">
                                <a href="{{ route('category.edit', $category) }}">{{ $category->name }}</a>
                            </td>
                            <td class="align-middle">{{ $category->slug }}</td>
                            <td>
                                <img width="100px" src="{{ $category->category_image }}" alt="{{ $category->name }}">
                            </td>
                            <td class="align-middle">
                                <form method="post" action="{{ route('category.destroy', $category) }}">

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
