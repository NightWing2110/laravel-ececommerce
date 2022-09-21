<div id="wrapper">
    <div id="header">

        <div class="col-md-12">
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
