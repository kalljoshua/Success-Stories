
@extends('...layouts.user-layout')
@section('title')
    <title>Success Stories Africa | Videos</title>
@endsection


@section('content')

    <!-- BEGIN #content -->
    <main id="content">

        <!-- BEGIN .wrapper -->
        <div class="wrapper">

            <div class="ot-content-with-sidebar-right">

                <div class="ot-main-page-content">

                    <div class="ot-title-block">
                        <h2>All Videos</h2>
                    </div>

                    <div class="ot-content-block">

                        <div class="otg otg-h-30 otg-v-30">
                            <div class="otg-itemy">
                                <div class="ot-block-article-slider otg otg-items-3 otg-v-20 otg-h-30">
                                    @foreach($videos as $video)
                                        <div class="otg-item">
                                        <div class="item" style="width: 130%">
                                            <a href="{{$video->url}}" target="_blank">
                                                <iframe width="400" height="315"
                                                        src="{{$video->url}}">
                                                </iframe>
                                                <span class="item-content">
                                                    <strong>{{$video->title}}</strong>
                                                    <span class="meta-items">
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


                        </div>

                        <div class="ot-main-panel-pager">
                            <ul class="flat-pagination clearfix">
                                <?php echo $videos->render(); ?>
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