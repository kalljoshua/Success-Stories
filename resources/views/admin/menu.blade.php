<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="active">
                    <a href="{{route('admin.dashboard')}}">Dashboard</a>
                </li>
                <li>
                    <a href="{{route('admin.types')}}">
                        <span class="fa fa-list"></span><span> Types</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.categories')}}">
                        <span class="fa fa-list"></span><span> Categories</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.sub-categories')}}">
                        <span class="fa fa-align-left"></span><span> Sub-Categories</span>
                    </a>
                </li>
                <li class="submenu">
                    <a href="#"><span class="fa fa-newspaper-o"></span><span> Stories</span> </a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="{{route('admin.stories')}}"><span class="fa fa-folder"></span> Stories</a></li>
                        <li><a href="{{route('admin.compose')}}"><span class="fa fa-plus-circle"></span> Compose</a></li>
                        <li><a href="{{route('admin.pending')}}"><span class="fa fa-exclamation-triangle"></span> Pending</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><span class="fa fa-newspaper-o"></span><span> Adverts</span> </a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="{{route('admin.adverts')}}"><span class="fa fa-folder"></span> Adverts</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{route('admin.videos')}}"><span class="fa fa-file-movie-o"></span> Videos</a>
                </li>

            </ul>
        </div>
    </div>
</div> 