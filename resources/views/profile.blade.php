<x-home-master :title="$title">
    @section('content')

        <div class="row">
            <div class="col-md-8">

                <div class="d-flex mt-4">
                    <div class="profile-img">
                        <img src="{{ $user->avatar }}" class="rounded-circle" alt="">
                    </div>
                    <div class="align-self-center">
                        <h1 class="pl-4">{{ $user->name }}</h1>
                    </div>
                </div>

                <div class="mt-3">
                    {!! $user->cv !!}
                </div>

                <hr>

                @foreach($works as $work)
                    <x-home.work-card :work="$work"></x-home.work-card>
                @endforeach

                <x-home.pagination :objects="$works"></x-home.pagination>

            </div>

            <div class="col-md-4">
                <x-home.sidenav></x-home.sidenav>
            </div>
        </div>
    @endsection
</x-home-master>
