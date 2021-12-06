<div id="wrapper">
    <div id="header">
        @foreach ($trending_category as $tcategory)
        @endforeach
        <div class="col-md-12">
            <ul id="main-menu">
                <li><a href="{{ route('index') }}">HOME</a></li>
                <li><a href="{{ route('view-category', $tcategory->slug) }}">CELLPHONE</a></li>
                <li><a href="{{ route('view-category', $tcategory->slug) }}">LAPTOP</a></li>
                <li><a href="{{ route('view-category', $tcategory->slug) }}">TABLET</a></li>
                <li><a href="{{ route('view-category', $tcategory->slug) }}">WRISTWATCH</a></li>
                <li><a href="{{ route('blog') }}">NEWS</a></li>
                <li><a href="{{ route('contacts') }}">CONTACTS</a></li>
            </ul>
        </div>
    </div>
</div>
