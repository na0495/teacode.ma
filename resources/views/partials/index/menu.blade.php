<div class="menu nav-scroller bg-dark py-2">
    <nav class="nav d-flex justify-content-center text-light">
        @foreach ($data->keys as $item)
            <a class="p-2 text-light text-capitalize" href="{{ $item->link ?? '#' . $item->slug }}">
                {{ $item->title }}
            </a>
        @endforeach
    </nav>
</div>
