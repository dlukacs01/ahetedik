@foreach($categories as $category)
    <div class="card mb-3">

        <img class="card-img-top category-img" src="{{ $category->category_image }}" alt="Card image" style="width:100%">

        <div class="card-body pb-1 pt-3">
            <h5 class="card-title">
                <a href="{{ route('work.works', $category->slug) }}" class="stretched-link text-decoration-none text-body">
                    {{ $category->name }}
                </a>
            </h5>
        </div>
    </div>
@endforeach
