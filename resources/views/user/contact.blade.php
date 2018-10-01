@extends('...layouts.user_layout')
@section('title')
  <title>e-NYUMBANI : Contact</title>
@endsection
@section('content')


    <!--start section page body-->
    <section id="section-body">
        <div class="container">
            <div class="page-title breadcrumb-top">
                <div class="row">
                    <div class="col-sm-12">
                        <ol class="breadcrumb">
                            <li><a href="/"><i class="fa fa-home"></i></a></li>
                            <li class="active">Contact</li>
                        </ol>
                        <div class="page-title-left">
                            <h2>Contact</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div id="content-area" class="contact-area">
                        <div class="white-block">
                            <div class="row">
                                <div class="col-sm-5 col-xs-12 contact-block-inner">
                                    <form id="contact_form">
                                        <div class="form-group">
                                            <label class="control-label" for="email">Your email</label>
                                            <input class="form-control" name="email" id="email">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="phone">Your Phone</label>
                                            <input class="form-control" name="phone" id="phone">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="subject">Subject</label>
                                            <input class="form-control" name="subject" id="subject">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="message">Your Message</label>
                                            <textarea class="form-control" name="message" rows="4" id="message"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-secondary btn-long">Send</button>
                                    </form>
                                </div>
                                <div class="col-sm-2 col-xs-12 contact-block-inner">
                                    <div class="contact-info-block">

                                    </div>

                                </div>
                                <div class="col-sm-5 col-xs-12 contact-block-inner">
                                  <h3 class="contact-info-title">Contact Us</h3>
                                    <div class="contact-info-block">
                                        <p class="padding-top"><strong>For All Press Inquiries,</strong><br>
                                            <strong>please contact:</strong></p>
                                        <p><strong>e-NYUMBANI</strong><br>
                                            Address: Entebbe, P.O.Box 16521, <br>
                                            Kampala Uganda<br>
                                            Office: 0700137928<br>
                                            Mobile: 0775745803<br>
                                            E-mail: nyumbaniuganda@gmail.com<br>

                                        <!--<p><strong>Kyle Parker</strong><br>
                                            Public Relations Associated<br>
                                            774 NE 84th St Miami, FL 33879<br>
                                            kyle.parker@houzez.com</p>-->

                                    </div>
                                    <div class="contact-info-block">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--end section page body-->

@endsection
