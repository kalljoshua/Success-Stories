
@extends('...layouts.user-layout')
@section('title')
    <title>Success Stories Africa | Story-{{$category->name}}</title>
@endsection

@section('content')

    <main id="content">

        <!-- BEGIN .wrapper -->
        <div class="wrapper">

            <div class="ot-content-with-sidebar-right">

                <div class="ot-main-page-content">

                    <div class="ot-title-block">
                        <h2>{{$category->name}} Articles</h2>
                    </div>

                    <div class="ot-content-block">
                        <div class="ot-articles-material-blog-list">
                            <div class="ot-do-large-space">
                                <a href="{{$banner_page->url}}" target="_blank">
                                    <img src="/images/advert/wide_810x400/{{$banner_page->image}}" alt="{{$banner_page->name}}" /></a>
                            </div>
                            @foreach($stories as $story)
                                <div class="item">
                                    <div class="item-header">
                                        <a href="{{route('user.show.story',['slug'=>$story->slug])}}" class="read-later-widget-btn">
                                            <i class="material-icons">access_time</i>
                                            <i class="ot-inline-tooltip"></i></a>
                                        <a href="{{route('user.show.story',['slug'=>$story->slug])}}" class="item-header-image">
                                            <img src="/images/blog/user_470x235/{{$story->image}}" alt=""></a>
                                    </div>
                                    <div class="item-content">
                                        <h2><a href="{{route('user.show.story',['slug'=>$story->slug])}}">
                                                {{$story->title}}</a></h2>
                                        <span class="item-meta">
                                        <span class="item-meta-item">
                                            <i class="material-icons">access_time</i>{{$story->created_at->diffForHumans()}}</span>
												<a href="{{route('user.show.story',['slug'=>$story->slug])}}#comments"
                                                   class="item-meta-item"><i class="material-icons">chat_bubble_outline</i>{{$story->comments->count()}}</a>
											</span>
                                        <?php $string = strip_tags($story->body);?>
                                        <p>{{strlen($string) > 200 ? substr($string,0,200) : $string}}.....</p>
                                    </div>
                                </div>
                            @endforeach
                            <div class="ot-do-large-space">
                                <a href="{{$banner_page->url}}" target="_blank">
                                    <img src="/images/advert/wide_810x400/{{$banner_page->image}}" alt="{{$banner_page->name}}" /></a>
                            </div>
                        </div>

                        <div class="ot-main-panel-pager">
                            <ul class="flat-pagination clearfix">
                                <?php echo $stories->render(); ?>
                            </ul>
                        </div>

                    </div>

                </div>

                @include('user.side-bar')
            </div>

            <!-- END .wrapper -->
        </div>

        <!-- BEGIN #content -->
    </main>

@endsection