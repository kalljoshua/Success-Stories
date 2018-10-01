<aside class="sidebar">

    <div class="widget">
        <h3><span>Advertisement space</span></h3>
            <div class="do-space">
                <a href="{{$banner_side->url}}" target="_blank">
                    <img src="/images/advert/large_3000x250/{{$banner_side->image}}" alt="{{$banner_side->name}}" /></a>
            </div>
    </div>

    <div class="widget widget_search">
        <h3><span>Most popular articles</span></h3>
        <div class="ot-widget-article-list">

            @foreach($most_viewed as $story)
                <div class="item" style="margin-bottom: 5px">
                    <div class="item-header">
                        <a href="{{route('user.show.story',['slug'=>$story->slug])}}">
                            <img src="/images/blog/user_470x235/{{$story->image}}" alt="" /></a>
                    </div>
                    <div class="item-content">
                        <a href="{{route('user.show.story',['slug'=>$story->slug])}}"
                           class="read-later-widget-btn"><i class="material-icons">access_time</i>
                            <i class="ot-inline-tooltip">Read later</i></a>
                        <h4><a href="{{route('user.show.story',['slug'=>$story->slug])}}">
                                {{$story->title}}</a></h4>
                    </div>
                </div>
                <div></div>
            @endforeach

        </div>
        <a href="{{route('story.listings')}}" class="ot-widget-button">View more articles</a>
    </div>

    <div class="widget widget_search">
        <h3><span>Latest comments</span></h3>
        <div class="ot-widget-comments-list">

            @foreach($comments as $comment)
                <div class="item">
                    <div class="item-header">
                        <a href="#"><img src="/client_inc/images/photos/user.jpg" alt="" /></a>
                    </div>
                    <div class="item-content">
                        <h4><a href="#">{{$comment->name}}</a></h4>
                        <p>{{strlen($comment->body) > 50 ? substr($comment->body,0,50) : $comment->body}}...</p>
                        <a href="{{route('user.show.story',['slug'=>$comment->story->slug])}}"
                           class="ot-comment-w-read-more">Read comment</a>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

    <div class="widget">
        <h3><span>Advertisement space</span></h3>
        <div class="do-space">
            <a href="{{$banner_side->url}}" target="_blank">
                <img src="/images/advert/large_3000x250/{{$banner_side->image}}" alt="{{$banner_side->name}}" /></a>
        </div>
    </div>-


</aside>