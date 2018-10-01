<header id="header-benavente">

    <div id="header-top-block">
        <div class="wrapper">
            <nav class="left">
                <ul>
                    <li><a href="https://www.ruraaraempire.com" target="_blank">Ruraara Tech Empire</a></li>
                    <li><a href="http://www.servicehunt.biz" target="_blank">ServiceHunt</a></li>
                    <li><a href="https://www.nyumbaniuganda.com" target="_blank">eNyumbani</a></li>
                </ul>
            </nav>

            <nav class="right header-socials-top">
                <ul>
                    <li><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#" target="_blank"><i class="fa fa-pinterest"></i></a></li>
                    <li><a href="#" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                    <li><a class="btn btn-primary rounded pull-right"
                           data-toggle="modal" data-target="#create_user">
                            <i class="fa fa-user"></i></a></li>
                </ul>
            </nav>
        </div>
    </div>

    <div class="wrapper">
        <div class="header-blocks">

            <div class="header-blocks-logo">
                <!--<h1 id="header-logo-text"><a href="index.html">Benavente</a></h1>-->
                <a href="/" id="header-logo-image">
                    <img src="/admin_inc/assets/img/finallogo.jpg" data-ot-retina="images/logo@2x.png" alt="" /></a>
            </div>
            <div class="header-blocks-aspace">
                <a href="{{$banner_header->url}}" target="_blank">
                    <img src="/images/advert/wide_810x400/{{$banner_header->image}}" alt="{{$banner_header->name}}" /></a>
            </div>
        </div>
    </div>


    <div class="main-menu-placeholder">
        <div class="wrapper">
            <nav id="main-menu" class="otm otm-follow">
                <ul class="load-responsive">
                    @foreach($categories as $category)
                        @if(count($category->sub_categories)>0)
                            <li><a href="#"><span>{{$category->name}}</span></a>
                                <ul class="sub-menu">
                                    @foreach($category->sub_categories as $sub_category)
                                    <li><a href="{{route('stories.category',['id'=>$sub_category->id])}}">
                                            {{$sub_category->name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                        @endif
                    @endforeach

                    <li><a href="{{route('user.videos')}}"><span>Videos</span></a></li>
                    <li><a href="{{route('user.about')}}"><span>About us</span></a></li>

                    <li><a href="#search-header"><i class="material-icons">search</i></a></li>
                </ul>
            </nav>
        </div>
    </div>

    <div id="search-overlay">
        <div id="search-overlay-inner">

            <form action="{{route('article.search')}}" method="get">
                <input type="text" name="keyword" value="" placeholder="Search something..">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>

            <strong class="category-listing-title"><span>Articles worth reading</span></strong>

            <div class="ot-content-block">

                <div class="ot-grid-article-list otg otg-items-3 otg-h-30">

                    @foreach($search as $story)
                    <div class="otg-item">
                        <div class="ot-material-card">
                            <a href="{{route('user.show.story',['slug'=>$story->slug])}}" class="item-header">
                                <img src="/images/blog/user_470x235/{{$story->image}}" alt="" /></a>
                            <div class="item-content">
                                <h3><a href="{{route('user.show.story',['slug'=>$story->slug])}}">
                                        {{$story->title}}</a></h3>
                                <span class="meta-items">
                                    <a href="{{route('user.show.story',['slug'=>$story->slug])}}" class="meta-items-i">
                                        <i class="material-icons">person</i>{{$story->author}}</a>
                                    <i class="meta-items-i">
                                        <i class="material-icons">access_time</i>{{$story->created_at->diffForHumans()}}</i>
                                </span>
                                <?php $string = strip_tags($story->body);?>
                                <p>{{strlen($string) > 200 ? substr($string,0,200) : $string}}.....</p>
                            </div>
                            <div class="item-footer">
                                <a href="{{route('user.show.story',['slug'=>$story->slug])}}"
                                   class="card-footer-button">Read more</a>

                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>

            </div>

        </div>
    </div>

</header>