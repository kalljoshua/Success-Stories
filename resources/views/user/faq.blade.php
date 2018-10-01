@extends('...layouts.user_layout')
@section('title')
    <title>HomeTourism : Faq</title>
@endsection
@section('content')

    <div id="content" class="site-content">
        <div id="tropical-banner" class=" text-center clearfix">
            <img src="/assets/images/banner.jpg" alt="banner"/>
            <div class="container banner-contents clearfix">
                <h2 class="template-title p-name"><strong>Faq</strong></h2>
            </div>
            <div class="breadcrumb-wrapper clearfix">
                <div class="container">
                    <ol class="breadcrumb">
                        <li><a href="/" >Home</a></li>
                        <li class="active">Faq</li>
                    </ol>
                </div>
            </div>
            <span class="overlay"></span>
        </div>
        @include('flash::message')
        <section class="blog-single clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-sm-8">
                        <article class="blog-post">

                            <div class="entry-contents animatedParent clearfix">
                                <h4 class="entry-title animated fadeInUpShort">
                                    <a href="#">How to be a host and Shatsi Host Homes</a></h4>
                                <p class="animated fadeInUpShort">
                                    <b>1. Create your listing</b>
                                    <p>It’s free and easy to create a listing on Shatsi Host Homes. Describe your space,
                                    how many guests you can accommodate, and add photos and details.</p>
                                    <p>Our pricing tool can recommend competitive rates, but what you charge is always up to you.</p>
                                </p>
                                <p class="animated fadeInUpShort">
                                    <b>2. Welcome guests</b>
                                    <p>Get to know guests before arrival by messaging them on our platform.</p>
                                    <p>Most hosts clean the spaces guests can use, and provide essentials like clean
                                        sheets, towels, and toilet paper.</p>
                                    <p>You can greet guests in person with a key or just send them a door code</p>
                                </p>
                                <p class="animated fadeInUpShort">
                                    <b>3. Get paid</b>
                                    <p>Shatsi Host Homes’s secure payment system means you never have to deal with money directly.</p>
                                    <p>Guests are charged before arrival, and you are paid automatically after
                                        check in, minus a 5% service fee.</p>
                                    <p>You can be paid via PayPal, direct deposit, or international money wire, among other ways.</p>
                                </p>
                                <p class="animated fadeInUpShort">
                                    <b>Who can be a Shatsi Host?</b>
                                    <p>It’s easy to become a Shatsi host in most areas,
                                    and it’s always free to create a listing. Entire apartments and homes,
                                    private rooms, treehouses, and castles are just a few of the properties hosts have
                                    shared on Shatsi Host Homes. For more details on what’s expected of hosts,
                                    check out Shatsi’s community standards, which revolve around safety, security,
                                    and reliability, and hospitality standards, which help hosts earn great guest reviews.</p>
                                </p>
                                <p class="animated fadeInUpShort">
                                    <b>Does Shatsi Host Homes Screen Guests?</b>
                                    <p>Shatsi Host Homes verifies some information about guests and hosts to help make our
                                    community a safer place for everyone. That includes requiring a profile photo,
                                    confirmed phone number, and confirmed email address. As a host, for added security,
                                    you can also ask potential guests to provide an official ID.</p>
                                </p>
                                <p class="animated fadeInUpShort">
                                    <b>How should I price my listing on Shatsi Host Homes?</b>
                                    <p>What you charge is always up to you, but we do provide tips to help make
                                    your space more competitive. When you create a listing on Shatsi Host Homes,
                                    we suggest a price for your property based on your location and other factors.
                                    You can set nightly, weekly, and/or monthly rates.</p>
                                </p>
                                <p class="animated fadeInUpShort">
                                    <b>How do Shatsi Host Homes payments work?</b>
                                    <p>All payments are processed securely through our online payment system.
                                    Guests are charged when a reservation is made, and hosts are paid 24 hours after check-in.
                                    How you’re paid is up to you: You can set up direct deposit, PayPal, Mobile Money or a number
                                    of other options.</p>
                                </p>

                            </div>
                        </article>


                    </div>
                    @include('user.right_bar')
                </div>
            </div>
        </section>



    </div><!-- .site-content -->
@endsection
