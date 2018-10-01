<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="/admin_inc/assets/img/favicon.png">
    @yield('title')
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/admin_inc/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/admin_inc/assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/admin_inc/assets/plugins/morris/morris.css">
    <link rel="stylesheet" type="text/css" href="/admin_inc/assets/plugins/summernote/dist/summernote.css">
    <link rel="stylesheet" type="text/css" href="/admin_inc/assets/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/admin_inc/assets/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="/admin_inc/assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="/admin_inc/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="/css/bootstrap-fileinput/bootstrap-fileinput.css"/>

    <!--switch sripts--->
    <style>
        /* The switch - the box around the slider */
        .switch {
            position: relative;
            display: inline-block;
            width: 55px;
            height: 27px;
        }

        /* Hide default HTML checkbox */
        .switch input {
            display: none;
        }

        /* The slider */
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 20px;
            width: 20px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked + .slider {
            background-color: #2196F3;
        }

        input:focus + .slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
    </style>


    <!--[if lt IE 9]>
    <script src="/admin_inc/assets/js/html5shiv.min.js"></script>
    <script src="/admin_inc/assets/js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="main-wrapper">
    @include('admin.header')
    @include('admin.menu')
    <div class="page-wrapper">
        @include('flash::message')
        @yield('content')

    </div>
</div>
<div class="sidebar-overlay" data-reff="#sidebar"></div>
<script type="text/javascript" src="/admin_inc/assets/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="/admin_inc/assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/admin_inc/assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/admin_inc/assets/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="/admin_inc/assets/js/jquery.slimscroll.js"></script>
<script type="text/javascript" src="/admin_inc/assets/plugins/morris/morris.min.js"></script>
<script type="text/javascript" src="/admin_inc/assets/plugins/summernote/dist/summernote.min.js"></script>
<script type="text/javascript" src="/admin_inc/assets/plugins/raphael/raphael-min.js"></script>
<script type="text/javascript" src="/admin_inc/assets/js/select2.min.js"></script>
<script type="text/javascript" src="/admin_inc/assets/js/moment.min.js"></script>
<script type="text/javascript" src="/admin_inc/assets/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="/admin_inc/assets/js/app.js"></script>
<script type="text/javascript" src="/js/trend-story.js"></script>
<script type="text/javascript" src="/js/activate.js"></script>
<script type="text/javascript" src="/js/activate-advert.js"></script>
<script type="text/javascript" src="/js/bootstrap-fileinput/bootstrap-fileinput.js"></script>
<script>
    $('div.alert').not('.alert-important').delay(2000).fadeOut(1500);


    $(document).ready(function(){
        $('.summernote').summernote({
            height: 200,
            minHeight: null,
            maxHeight: null,
            focus: false
        });
    });

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
<script type="text/javascript">
    $(document).ready(function() {
        //get subcateogries according to sector selection
        $("#property-type").change(function () {
            $.get("/submission/getSubCategories/" + $(this).val(), function (data) {
                $element = $("#subcategory_id");
                $element.removeAttr('disabled');
                $(data).each(function () {
                    $element.append("<option value='" + this.id + "'>" + this.name + "</option>");
                });
            });
        })
    })
</script>

<script>
    var data = [
            { y: '2014', a: 50, b: 90},
            { y: '2015', a: 65,  b: 75},
            { y: '2016', a: 50,  b: 50},
            { y: '2017', a: 75,  b: 60},
            { y: '2018', a: 80,  b: 65},
            { y: '2019', a: 90,  b: 70},
            { y: '2020', a: 100, b: 75},
            { y: '2021', a: 115, b: 75},
            { y: '2022', a: 120, b: 85},
            { y: '2023', a: 145, b: 85},
            { y: '2024', a: 160, b: 95}
        ],
        config = {
            data: data,
            xkey: 'y',
            ykeys: ['a', 'b'],
            labels: ['Total Income', 'Total Outcome'],
            fillOpacity: 0.6,
            hideHover: 'auto',
            behaveLikeLine: true,
            resize: true,
            pointFillColors:['#ffffff'],
            pointStrokeColors: ['black'],
            gridLineColor: '#eef0f2',
            lineColors:['gray','#667eea']
        };
    config.element = 'area-chart';
    Morris.Area(config);
    config.element = 'line-chart';
    Morris.Line(config);
    config.element = 'bar-chart';
    Morris.Bar(config);
    config.element = 'stacked';
    config.stacked = true;
    Morris.Bar(config);
    Morris.Donut({
        element: 'pie-chart',
        data: [
            {label: "Employees", value: 30},
            {label: "Clients", value: 15},
            {label: "Projects", value: 45},
            {label: "Tasks", value: 10}
        ]
    });
</script>
</body>
</html>