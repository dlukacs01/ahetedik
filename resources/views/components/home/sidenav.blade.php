<?php

$stories = App\Story::latest()->whereDate('expiration_date', '>=', date('Y-m-d'))->take(3)->get();
$categories = App\Category::orderBy('position')->get();
$works = App\Work::latest()->whereDate('release_date', '<=', date('Y-m-d'))->take(3)->get();
$works_active = App\Work::latest()->where('active',1)->whereDate('release_date', '<=', date('Y-m-d'))->take(7)->get();

?>

{{-- KERESÉS --}}
<div class="card my-4">
    <h5 class="card-header">Keresés</h5>
    <div class="card-body">

        <form action="{{ route('home.search') }}" method="GET">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Keresés...">
                <span class="input-group-btn">
                    <button class="btn btn-secondary" type="submit">Mehet!</button>
                </span>
            </div>
        </form>

    </div>
</div>

{{-- HÍREK --}}
<div class="card my-4">
    <h5 class="card-header">Hírek</h5>
    <div class="card-body">

        <div class="row">
            <div class="col-lg-12">
                <ul class="list-unstyled mb-0">
                    @foreach($stories as $story)
                        <li>
                            <a href="{{ route('story', $story->slug) }}">{{ $story->title }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

    </div>
</div>

{{-- KIEMELT MŰVEK --}}
<div class="card my-4">
    <h5 class="card-header">Kiemelt művek</h5>
    <div class="card-body">

        <div class="row">
            <div class="col-lg-12">
                <ul class="list-unstyled mb-0">
                    @foreach($works_active as $work_active)
                        <li>
                            <a href="{{ route('work', [
                                        'work_slug' => $work_active->slug,
                                        'work_id' => $work_active->id]) }}">{{ $work_active->title }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

    </div>
</div>

{{-- KATEGÓRIÁK --}}
<div class="card my-4">
    <h5 class="card-header">Kategóriák</h5>
    <div class="card-body">

        <div class="row">
            <div class="col-lg-12">
                <ul class="list-unstyled mb-0">
                    @foreach($categories as $category)
                        <li>
                            <a href="{{ route('work.works', $category->slug) }}">{{ $category->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

    </div>
</div>

{{-- LEGÚJABB MŰVEK --}}
<div class="card my-4">
    <h5 class="card-header">Legújabb művek</h5>
    <div class="card-body">

        <div class="row">
            <div class="col-lg-12">
                <ul class="list-unstyled mb-0">
                    @foreach($works as $work)
                        <li>
                            <a href="{{ route('work', [
                                        'work_slug' => $work->slug,
                                        'work_id' => $work->id]) }}">{{ $work->title }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

    </div>
</div>
