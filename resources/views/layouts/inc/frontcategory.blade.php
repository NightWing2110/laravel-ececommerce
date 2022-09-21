<div id="wrapper">
    <div id="header">
        <div class="col-md-12">
            <ul id="main-menu">
                @foreach($categoryParent as $item)
                <li class="dropdown">
                    <a href="{{ route('view-category', $item->slug) }}">{{$item->name}}</a>
                </li>
                @endforeach
                <li><a>NEWS</a></li>
                <li><a>CONTACTS</a></li>
            </ul>
        </div>
    </div>
</div>
