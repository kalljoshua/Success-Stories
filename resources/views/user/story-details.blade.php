
@extends('...layouts.user-layout')
@section('title')
    <title>Success Stories Africa | {{$story->slug}}</title>
@endsection

@section('content')

    <div class="wrapper" style="margin-top: 5px">

        <div class="ot-content-with-sidebar-right">

            <div class="ot-main-page-content">

                <!-- OPTIONAL PAGE TITLE -->
                <div class="ot-title-block">
                    <h2>{{$story->type->name}}</h2>
                </div>

                <div class="ot-content-block">
                    <div class="ot-material-card ot-material-card-content" itemscope itemtype="http://schema.org/Blog">

                        <div class="article-head">
                            <div class="img-with-no-margin">
                                <img itemprop="image" src="/images/blog/user_810x400/{{$story->image}}" alt="" />
                            </div>
                            <h1 itemprop="headline">{{$story->title}}</h1>
                            <meta itemprop="datePublished" content="2016-04-01" />
                            <meta itemprop="dateModified" content="2016-04-01" />
                            <div class="article-head-meta">
                                <a href="#" class="meta-item">
                                    <i class="material-icons">person</i><span itemprop="author">{{$story->author}}</span></a>
                                <span class="meta-item"><i class="fa fa-clock-o">
                                    </i>{{$story->created_at->diffForHumans()}}</span>
                                <a href="#comments" class="meta-item">
                                    <i class="material-icons">chat_bubble_outline</i>{{$story->comments->count()}} comments</a>
                            </div>
                        </div>

                        <div class="shortcode-content" itemprop="mainEntityOfPage">
                            <p>{!! $story->body !!}</p>
                        </div>

                        {{--<div class="article-foot-tags">
                            <strong><i class="material-icons">folder_open</i>Assigned tags</strong>
                            <div>
                                <a href="#">Essent tritani</a>
                                <a href="#">Veniam discere</a>
                                <a href="#">Possit volutpat</a>
                                <a href="#">Contentiones </a>
                                <a href="#">Repudiandae</a>
                                <a href="#">Mentitum usu</a>
                                <a href="#">Possit volu contentiones</a>
                            </div>
                        </div>--}}

                        <div class="article-foot-tags">
                            <strong><i class="material-icons"></i>Categorized under</strong>
                            <div>
                                <a href="#">{{$story->type->name}}</a>
                                <a href="#">{{$story->sub_category->category->name}}</a>
                                <a href="#">{{$story->sub_category->name}}</a>
                            </div>
                        </div>

                    </div>
                </div>

                {{--<div class="ot-content-block">
                    <div class="ot-material-card ot-material-card-content">
                        <div class="ot-title-block">
                            <h2>The verdict</h2>
                        </div>
                        <div class="article-review-block" itemprop="review" itemscope itemtype="http://schema.org/Review">
                            <meta itemprop="itemReviewed" content="iPhone 6" />
                            <meta itemprop="datePublished" content="2016-04-01" />
                            <meta itemprop="author" content="Orange Themes" />
                            <div class="article-review-score" itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating">
                                <strong class="article-review-score-num" itemprop="ratingValue">8.0</strong>
                                <meta itemprop="worstRating" content="1" />
                                <meta itemprop="bestRating" content="10" />
                                <strong class="article-review-score-name">Great</strong>
                            </div>
                            <div class="article-review-content">
                                <h3 itemprop="name">Qui ne novum saperet</h3>
                                <div itemprop="description">
                                    <p>Elit gloriatur te vis, ex summo cetero insolens usu. Ne ius idque prompta appetere, pri doctus labores id. Esse honestatis eu mel. Quo aeterno officiis patrioque eu, tale tota offendit pri no.</p>
                                </div>
                            </div>
                            <div class="article-review-verdict otg otg-items-2">
                                <div class="otg-item article-review-block-good">
                                    <strong>The Good</strong>
                                    <ul>
                                        <li>Mei pertinax mandamus</li>
                                        <li>Percipitur no lorem aperiri</li>
                                        <li>Habemus eum ea te vi</li>
                                    </ul>
                                </div>
                                <div class="otg-item article-review-block-bad">
                                    <strong>The Bad</strong>
                                    <ul>
                                        <li>Habemus eum ea te vi</li>
                                        <li>Accommodare</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>--}}

                {{--<div class="ot-content-block about-author-block">
                    <div class="ot-material-card ot-material-card-content">
                        <div class="ot-title-block">
                            <h2>About author</h2>
                        </div>
                        <div>
                            <div class="otg otg-h-30">
                                <div class="otg-item otg-u-1">
                                    <a href="#"><img src="/client_inc/images/photos/avatar-3.jpg" alt="" /></a>
                                </div>
                                <div class="otg-item otg-u-5">
                                    <h3><a href="#">Orange Themes</a></h3>
                                    <p>Elit gloriatur te vis, ex summo cetero insolens usu. Ne ius
                                        idque prompta appetere, pri doctus labores id. Esse honestatis eu mel.
                                        Quo aeterno officiis patrioque eu, tale tota offendit pri no.</p>
                                    <a href="#" class="mdl-button mdl-js-button mdl-button--raised
                                    mdl-js-ripple-effect mdl-button--accent button ot-shortcode-button">View more articles</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>--}}

                <div class="ot-content-block">
                    <div class="ot-material-card ot-material-card-content">
                        <div class="ot-title-block">
                            <h2>{{$story->comments->count()}} Comments</h2>
                        </div>
                        <ol id="comments">
                            @if($story->comments->count()>0)
                                @foreach($story->comments as $comment)
                                <li class="comment">
                                    <div class="comment-block">
                                        <a href="#" class="image-avatar">
                                            <img src="/client_inc/images/photos/user.jpg" alt="" title="" /></a>
                                        <div class="comment-text">
                                            <span class="time-stamp right">{{$comment->created_at->diffForHumans()}}</span>
                                            <strong class="user-nick"><a href="#">{{$comment->name}}</a></strong>
                                            <div class="shortcode-content">
                                                <p>{{$comment->body}}</p>
                                            </div>
                                            {{--<a class="card-footer-button read-more-button" href="#"><i class="material-icons">reply</i>Reply this comment</a>--}}
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            @else
                                <p>No comments yet. Be the first to comment.</p>
                            @endif
                        </ol>
                    </div>
                </div>

                <div class="ot-content-block">
                    <div class="ot-material-card ot-material-card-content">
                        <div class="ot-title-block">
                            <h2>Submit your comment here.</h2>
                        </div>
                        <div class="comment-contact-form">
                            <div class="comment-info">
                                <div class="comment-info-inner">
                                    <i class="material-icons">info_outline</i>
                                    <h3>Your comment is highly welcome!</h3>
                                </div>
                            </div>
                            <div id="respond">
                                <form id="commentform"
                                      method="post" action="{{route('user.comment.submit')}}">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="on_post" value="{{ $story->id }}">
                                    <input type="hidden" name="slug" value="{{ $story->slug }}">

                                    <p class="contact-form-comment">
                                        <label class="label-input">
                                            <span>Full Name<i class="required">*</i></span>
                                            <input type="text" name="name" placeholder="Your full name">
                                        </label>
                                    </p>
                                    <p class="contact-form-comment">
                                        <label class="label-input">
                                            <span>Comment text<i class="required">*</i></span>
                                            <textarea name="body" placeholder="Comment text"></textarea>
                                        </label>
                                    </p>
                                    <p class="form-submit">
                                        <button name="submit" type="submit" id="submit"
                                                class="submit mdl-js-button mdl-js-ripple-effect">Post a Comment</button>
                                    </p>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

            @include('user.side-bar')

        </div>

        <!-- END .wrapper -->
    </div>

@endsection