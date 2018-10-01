<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <link rel="shortcut icon" type="image/x-icon" href="/admin_inc/assets/img/favicon.png">
        <title>Success Stories Africa : Login</title>
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="/admin_inc/assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="/admin_inc/assets/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="/admin_inc/assets/css/style.css">
        <!--[if lt IE 9]>
        <script src="/admin_inc/assets/js/html5shiv.min.js"></script>
        <script src="/admin_inc/assets/js/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="main-wrapper">
            <div class="account-page">
                <div class="container">
                    <h3 class="account-title">Management Login</h3>
                    <div class="account-box">
                        <div class="account-wrapper">
                            <div class="account-logo">
                                <a href="index.html">Success Stories Africa</a>
                            </div>
                            <form action=" {{route('admin.login.submit')}}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group form-focus">
                                    <label class="control-label">Email Address</label>
                                    <input class="form-control floating" name="email" type="text">
                                </div>
                                <div class="form-group form-focus">
                                    <label class="control-label">Password</label>
                                    <input class="form-control floating" name="password" type="password">
                                </div>
                                <div class="form-group text-center">
                                    <button class="btn btn-primary btn-block account-btn" type="submit">Login</button>
                                </div>
                                <div class="text-center">
                                    <a href="forgot-password.html">Forgot your password?</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="sidebar-overlay" data-reff="#sidebar"></div>
    <script type="text/javascript" src="/admin_inc/assets/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="/admin_inc/assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/admin_inc/assets/js/app.js"></script>
    </body>
</html>