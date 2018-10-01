@extends('...layouts.user-layout')
@section('title')
    <title>Success Stories Africa | Homepage</title>
@endsection
@section('content')

    <main class="content" style="background-color: white;">
        <div class="wrapper" style="margin-top: 40px">
        <!-- BEGIN .huge-slider -->
        <div class="huge-slider">
            @foreach($trends as $trend)
            <div class="huge-slider-frame">
                <a href="{{route('user.show.story',['slug'=>$trend->slug])}}" class="hude-slider-image">
                    <span class="huge-slider-image-block" style="background-image: url(/images/blog/user_810x400/{{$trend->image}})">
                        <span class="huge-slider-content">
                            <strong>{{$trend->title}}</strong>
                            <span class="meta-items">
                                <i class="meta-items-i">
                                    <i class="fa fa-user"> {{$trend->author}},</i>
                                    {{$trend->type->name}} - {{$trend->sub_category->name}}</i>
                                <i class="meta-items-i">
                                    <i class="fa fa-clock-o"></i>{{$trend->created_at->diffForHumans()}}</i>
                            </span>
                        </span>
                    </span>
                </a>
            </div>
            @endforeach




            <!-- END .huge-slider -->
        </div>

        <!-- BEGIN .wrapper -->
        <div class="wrapper">

            <div class="ot-content-with-sidebar-right">

                <div class="ot-main-page-content">

                    @foreach($types as $type)
                    <div class="ot-title-block">
                        <h2>{{$type->name}}</h2>
                    </div>
                    @if($type->stories->count()>0)
                    <div class="ot-content-block">

                            <div class="ot-articles-blog-list">
                            @foreach($type->stories as $story)
                                    <div class="item">
                                        <div class="item-header">
                                            <a href="{{route('user.show.story',['slug'=>$story->slug])}}" class="item-header-image">
                                                <img src="/images/blog/user_470x235/{{$story->image}}" alt=""></a>
                                        </div>
                                        <div class="item-content">
                                            <h2><a href="{{route('user.show.story',['slug'=>$story->slug])}}">{{$story->title}}</a></h2>
                                            <span class="item-meta">
                                                    <span class="item-meta-item"><i class="fa fa-clock-o">
                                                            </i>{{$story->created_at->diffForHumans()}}</span>
                                                    <a href="{{route('user.show.story',['slug'=>$story->slug])}}#comments" class="item-meta-item">
                                                        <i class="material-icons">chat_bubble_outline</i>{{$story->comments->count()}}</a>
                                                        <i class="fa fa-user"></i> {{$story->author}} &nbsp;
                                                <i class="fa fa-list"> {{$story->type->name}}</i>
                                                </span>
                                            <?php $string = strip_tags($story->body);?>
                                            <p>{{strlen($string) > 200 ? substr($string,0,200) : $string}}.....</p>
                                        </div>
                                    </div>
                            @endforeach
                            </div>

                    </div>
                        @else
                            <div class="ot-content-block">
                                <p>No Content in this section yet! Check on us later</p>
                            </div>
                        @endif
                            <div class="ot-content-block">
                                <div class="ot-do-large-space">
                                    <a href="{{$banner_page->url}}" target="_blank">
                                        <img src="/images/advert/wide_810x400/{{$banner_page->image}}" alt="{{$banner_page->name}}" /></a>
                                </div>
                            </div>

                    @endforeach

                </div>

                @include('user.side-bar')

            </div>

            <!-- END .wrapper -->
        </div>

        <!-- BEGIN .wrapper -->
        <div class="wrapper">
            <div class="ot-title-block">
                <h2>Watch</h2>
            </div>

            <div class="ot-content-block">

                <div class="ot-block-article-slider otg otg-items-3 otg-v-20 otg-h-30">
                    @foreach($videos as $video)
                    <div class="otg-item">
                        <div class="item">
                            <a href="{{$video->url}}" target="_blank">
                                <iframe width="420" height="315"
                                    src="{{$video->url}}">
                                </iframe>
                                <span class="item-content">
                                    <strong>{{$video->title}}</strong>
                                    <span class="meta-items">
                                        <i class="meta-items-i"><i class="material-icons">person</i>Admin</i>
                                        <i class="meta-items-i">
                                            <i class="material-icons">access_time</i>{{$video->created_at->diffForHumans()}}</i>
                                    </span>
                                </span>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
            <!-- END .wrapper -->
        </div>






        {{--<!-- BEGIN .wrapper -->
        <div class="wrapper">

            <div class="ot-content-block ot-featured-author-block">

                <div class="ot-featured-author-header">
                    <div class="ot-title-block">
                        <h2>Featured author</h2>
                    </div>
                    <a href="blog.html" class="author-avatar"><img src="/client_inc/images/photos/avatar-3.jpg" alt="" /></a>
                    <strong><a href="blog.html">Jana Silinska</a></strong>
                    <p>Inimicus splendide ad vim, sit dolores detraxit persequeris ut, pri te omnes dolorum oportere.</p>
                    <p>Possim ceteros deleniti est ei, semper detraxit urbanitas sea.</p>
                    <p><a href="blog.html"
                          class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect
                          mdl-button--accent button ot-shortcode-button">View author articles</a></p>
                </div>

            </div>

            <!-- END .wrapper -->
        </div>--}}

        <!-- BEGIN #content -->
        </div>
    </main>

@endsection