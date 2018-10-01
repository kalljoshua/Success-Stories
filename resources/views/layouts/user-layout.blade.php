<!DOCTYPE HTML>
<!-- BEGIN html -->
<html lang = "en">
<!-- BEGIN head -->
<head>
    @yield('title')

    <!-- Meta Tags -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="description" content="" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="/client_inc/images/favicon.png" type="image/x-icon" />

    <!-- Stylesheets -->
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Material+Icons%7CRoboto:400,500,700&amp;subset=latin,latin-ext" />
    <link type="text/css" rel="stylesheet" href="/client_inc/css/reset.min.css" />
    <link type="text/css" rel="stylesheet" href="/client_inc/css/material.min.css" />
    <link type="text/css" rel="stylesheet" href="/client_inc/css/font-awesome.min.css" />
    <link type="text/css" rel="stylesheet" href="/client_inc/css/owl.carousel.min.css" />
    <link type="text/css" rel="stylesheet" href="/client_inc/css/shortcodes.min.css" />
    <link type="text/css" rel="stylesheet" href="/client_inc/css/main-stylesheet.min.css" />
    <link type="text/css" rel="stylesheet" href="/client_inc/css/otgrid.min.css" />
    <link type="text/css" rel="stylesheet" href="/client_inc/css/custom-styles.min.css" />
    <link type="text/css" rel="stylesheet" href="/client_inc/css/ot-lightbox.min.css" />
    <link type="text/css" rel="stylesheet" href="/client_inc/css/responsive.min.css" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!--[if lte IE 8]>
    <link type="text/css" rel="stylesheet" href="/client_inc/css/ie-ancient.min.css" />
    <link rel="stylesheet" type="text/css" href="/css/bootstrap-fileinput/bootstrap-fileinput.css"/>
    <![endif]-->

    <!-- Demo Only -->
    <link type="text/css" rel="stylesheet" href="/client_inc/css/_ot-demo.min.css" />

    <!-- END head -->
</head>

<!-- BEGIN body -->
<!--	<body class="ot_debug">-->
<body class="ot-menu-will-follow">

<div class="hentry">
    <span class="entry-title" style="display: none;">Home</span>
    <span class="vcard" style="display: none;">
				<span class="fn"><a href="" title="Posts by admin" rel="author">Orange Themes</a></span>
			</span>
    <span class="updated" style="display:none;">2016-04-18T08:17:28+00:00</span>
</div>

<!-- BEGIN #boxed -->
<div id="boxed">

    @include('user.header')

        @yield('content')

    @include('user.footer')



</div>

<!-- Scripts -->
<script type="text/javascript" src="/client_inc/jscript/jquery-latest.min.js"></script>
<script type="text/javascript" src="/client_inc/jscript/owl.carousel.min.js"></script>
<script type="text/javascript" src="/client_inc/jscript/material.min.js"></script>
<script type="text/javascript" src="/client_inc/jscript/otmenu.min.js"></script>
<script type="text/javascript" src="/client_inc/jscript/shortcode-scripts.min.js"></script>
<script type="text/javascript" src="/client_inc/jscript/theme-scripts.min.js"></script>
<script type="text/javascript" src="/client_inc/jscript/ot-lightbox.min.js"></script>
<!-- Demo Only -->
<script type="text/javascript" src="/client_inc/jscript/_ot-demo.min.js"></script>
<script type="text/javascript" src="/js/bootstrap-fileinput/bootstrap-fileinput.js"></script>

<!-- Facebook Pixel Code -->
<script>
    $('div.alert').not('.alert-important').delay(2000).fadeOut(1500);

    !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
        n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
        document,'script','//connect.facebook.net/en_US/fbevents.js');

    fbq('init', '890670487649133');
    fbq('track', "PageView");


    $(function () {
        $("#fileupload").change(function () {
            if (typeof (FileReader) != "undefined") {
                var dvPreview = $("#dvPreview");
                dvPreview.html("");
                var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
                $($(this)[0].files).each(function () {
                    var file = $(this);
                    if (regex.test(file[0].name.toLowerCase())) {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            var img = $("<img />");
                            img.attr("style", "height:100px;width: 100px");
                            img.attr("src", e.target.result);
                            dvPreview.append(img);
                        }
                        reader.readAsDataURL(file[0]);
                    } else {
                        alert(file[0].name + " is not a valid image file.");
                        dvPreview.html("");
                        return false;
                    }
                });
            } else {
                alert("This browser does not support HTML5 FileReader.");
            }
        });
    });

</script>
<noscript><img height="1" width="1" style="display:none"
               src="https://www.facebook.com/tr?id=890670487649133&ev=PageView&noscript=1"
    /></noscript>
<!-- End Facebook Pixel Code -->

<!-- END body -->
</body>
<!-- END html -->
</html>