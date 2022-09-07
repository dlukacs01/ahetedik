<x-home-master>
    @section('content')
        <p class="font-weight-bold mt-4">Találatok a következőre: "{{ $search }}"</p>

        <p class="text-muted" style="font-weight: 600">Szerzők <span class="font-weight-normal">({{ count($users) }})</span></p>

        <div class="authors-container">
            <x-home.authors :users="$users"></x-home.authors>
        </div>

        <br>

        <p class="text-muted" style="font-weight: 600">Művek <span class="font-weight-normal">({{ count($works) }})</span></p>

        @foreach($works as $work)
            <x-home.work-card :work="$work"></x-home.work-card>
        @endforeach

    @endsection
</x-home-master>
