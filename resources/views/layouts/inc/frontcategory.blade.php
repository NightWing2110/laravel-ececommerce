<div id="wrapper">
    <div id="header">
        <div class="py-3 mb-3 shadow-sm bg-warning border-top">
            <ul id="main-menu">
                <li><a href="{{ route('index') }}">HOME</a></li>
                @foreach ($categorylist as $item)
                    <li><a href="{{ route('view-category', $item->slug) }}">{{ $item->name}}</a></li>
                @endforeach
                <li><a href="{{ route('blog') }}">NEWS</a></li>
                <li><a href="{{ route('contacts') }}">CONTACTS</a></li>
            </ul>
        </div>
    </div>
</div>
