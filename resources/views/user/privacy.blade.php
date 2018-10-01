@extends('...layouts.user-layout')
@section('title')
    <title>Success Stories Africa | Privacy Policy</title>
@endsection

@section('content')

    <main id="content">

        <!-- BEGIN .wrapper -->
        <div class="wrapper">

            <div class="ot-content-with-sidebar-right">

                <div class="ot-main-page-content">

                    <div class="ot-title-block">
                        <h2>Content not available at the moment!!</h2>
                    </div>

                    <div class="ot-content-block ot-article-list-error">
                        <img src="images/no-articles.png" alt="">
                        <h3>Ooops nothing here yet...</h3>
                        <p>This is your page! <strong>You can add articles here</strong>. Just find an article that you find interesting but have no time to read now and <strong>push "Read Later" button to save it for later</strong>.</p>
                        <a href="{{route('story.listings')}}" class="button-error">Lets find some articles</a>
                    </div>

                </div>

                @include('user.side-bar')
            </div>

            <!-- END .wrapper -->
        </div>

        <!-- BEGIN #content -->
    </main>
@endsection
