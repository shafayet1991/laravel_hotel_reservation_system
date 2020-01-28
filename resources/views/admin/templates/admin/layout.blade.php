<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta name="base_url" content="{{ URL::to('/') }}">
    <title>HalalHotelCheck Yönetim Paneli</title>

    <link rel="shortcut icon" type="image/png" href="{{asset('admin/images/favicon.png')}}"/>
    <!-- Bootstrap -->
    <link href="{{asset('admin/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('admin/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('admin/css/nprogress.css')}}" rel="stylesheet">
    <!-- Switchery -->
    <link href="{{asset('admin/css/switchery.min.css')}}" rel="stylesheet">
    <!-- bootstrap-date -->
    <link href="{{asset('admin/css/bootstrap-datepicker3.min.css')}}" rel="stylesheet">
    <!-- Dropzon -->
    <link href="{{asset('admin/css/dropzon.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/dropzon-custom.css')}}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{asset('admin/css/green.css')}}" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="{{asset('admin/css/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{asset('admin/css/jqvmap.min.css')}}" rel="stylesheet"/>
    <!-- Custom Theme Style -->
    <link href="{{asset('admin/css/custom.min.css')}}" rel="stylesheet">
    <!-- Datatables -->
    <link href="{{asset('admin/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/fixedHeader.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/scroller.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/select2.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/multi-select.css')}}" rel="stylesheet">

    <!-- Include Editor style. -->
    <link href='https://cdn.jsdelivr.net/npm/froala-editor@2.9.1/css/froala_editor.min.css' rel='stylesheet'
          type='text/css'/>
    <link href='https://cdn.jsdelivr.net/npm/froala-editor@2.9.1/css/froala_style.min.css' rel='stylesheet'
          type='text/css'/>

    <link href="{{asset('admin/css/style.css')}}" rel="stylesheet">
    @yield('styles')
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="{{ url('/adminpanel') }}" class="site_title"><i class="fa fa-paw"></i>
                        <span>HalalHotelCheck</span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile clearfix">
                    <div class="profile_pic">
                        <img src="{{asset('admin/images/img.jpg')}}" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Hoşgeldiniz,</span>
                        <h2>{{ auth()->user()->name }} {{ auth()->user()->surname }}</h2>
                    </div>
                </div>
                <!-- /menu profile quick info -->

                <br/>

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <h3></h3>
                        <ul class="nav side-menu">
                            <li><a target="_blank" href="{{url('/')}}"><i class="fa fa-home"></i> Home</a></li>
                            <li><a href="{{url('/adminpanel/dashboard')}}"><i class="fa fa-home"></i> Dashboard </a></li>
                            <li><a><i class="fa fa-edit"></i> Page Management<span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{ route('menu.index')}}"> Menu </a></li>
                                    <li><a href="{{ route('static_page.index')}}"> Static Page</a></li>
                                    <li><a href="{{ route('hotel_type.create')}}">Create Hotel Type</a></li>
                                    <li><a href="{{ route('homepage_icon.index')}}"> Homepage Icon</a></li>
                                    <li><a href="{{ route('blog.index')}}"> Blog</a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-edit"></i> Service Description <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{url('/adminpanel/hotel')}}"> Hotel List </a></li>
                                    <li><a href="{{url('/adminpanel/hotel/create')}}"> Create Hotel </a></li>
                                    <li><a href="{{url('/adminpanel/tour')}}"> Tour List </a></li>
                                    <li><a href="{{url('/adminpanel/tour/create')}}"> Create Tour </a></li>
                                </ul>
                            </li>
                            <li>
                                <a>
                                    <i class="fa fa-edit"></i> Sales Transactions
                                    <span class="fa fa-chevron-down"></span>
                                </a>
                                <ul class="nav child_menu">
                                    <li>
                                        <a href="{{url('/adminpanel/reservation')}}"> Incoming Reservations</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('subscribe.index') }}"> Subscribers Earned</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('call_request.index') }}"> Search Requests</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('contact_customer.index') }}"> Customer Notifications</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a>
                                    <i class="fa fa-edit"></i> General Information
                                    <span class="fa fa-chevron-down"></span>
                                </a>
                                <ul class="nav child_menu">
                                    <li>
                                        <a href="{{ route('admin.pages.settings.general') }}"> <i class="fa fa-cog"></i> General Settings</a>
                                        <a href="{{ route('social_media_setting.index') }}"> <i class="fa fa-facebook"></i> Social Media Settings</a>
                                        <a href="{{ route('user_setting.index') }}"> <i class="fa fa--users"></i > System Users</a>
                                        <a href="{{ route('role.index') }}"> <i class="fa fa--users"></i > User Ranks</a>
                                        <a href="{{ route('permission.index') }}"> <i class="fa fa--users"></i > Rank Powers</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /sidebar menu -->

                <!-- /menu footer buttons -->
                <div class="sidebar-footer hidden-small">
                    <a data-toggle="tooltip" data-placement="top" title="Settings">
                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Lock">
                        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Logout">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                    </a>
                </div>
                <!-- /menu footer buttons -->
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                               aria-expanded="false">
                                <img src="{{asset('admin/images/img.jpg')}}" alt="">
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li>
                                    <a class="" href=""
                                       onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out" aria-hidden="true"></i>
                                        <span>Logout</span>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>


                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            @include('admin.templates.admin.partials.alerts')
            @include('admin.templates.admin.partials.validation')
            @yield('content')
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
            <div class="pull-right">
                HalalHotelCheck Admin Panel
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>
</div>

<!-- jQuery -->
<script src="{{asset('admin/js/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('admin/js/bootstrap.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('admin/js/fastclick.js')}}"></script>
<!-- NProgress -->
<script src="{{asset('admin/js/nprogress.js')}}"></script>
<script src="{{asset('admin/js/Chart.min.js')}}"></script>
<script src="{{asset('admin/js/dropzon.js')}}"></script>
<script src="{{asset('admin/js/dropzon-config.js')}}"></script>
<!-- swit-date -->
<script src="{{asset('admin/js/switchery.min.js')}}"></script>
<!-- bootstrap-date -->
<script src="{{asset('admin/js/bootstrap-datepicker.min.js')}}"></script>
<!-- iCheck -->
<script src="{{asset('admin/js/icheck.min.js')}}"></script>
<!-- Datatables -->
<script src="{{asset('admin/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('admin/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('admin/js/buttons.bootstrap.min.js')}}"></script>
<script src="{{asset('admin/js/buttons.flash.min.js')}}"></script>
<script src="{{asset('admin/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('admin/js/buttons.print.min.js')}}"></script>
<script src="{{asset('admin/js/dataTables.fixedHeader.min.js')}}"></script>
<script src="{{asset('admin/js/dataTables.keyTable.min.js')}}"></script>
<script src="{{asset('admin/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('admin/js/responsive.bootstrap.js')}}"></script>
<script src="{{asset('admin/js/dataTables.scroller.min.js')}}"></script>
<script src="{{asset('admin/js/jszip.min.js')}}"></script>
<script src="{{asset('admin/js/pdfmake.min.js')}}"></script>
<script src="{{asset('admin/js/vfs_fonts.js')}}"></script>
<script src="{{asset('admin/js/select2.full.js')}}"></script>
<script src="{{asset('admin/js/multi-select.js')}}"></script>
<!-- Include JS file. -->
<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/froala-editor@2.9.1/js/froala_editor.min.js'></script>
<!-- Custom Theme Scripts -->
<script src="{{asset('admin/js/custom.min.js')}}"></script>

<!-- Datatables -->
<script>
    $(document).ready(function () {
        var handleDataTableButtons = function () {
            if ($("#datatable-buttons").length) {
                $("#datatable-buttons").DataTable({
                    dom: "Bfrtip",
                    buttons: [
                        {
                            extend: "copy",
                            className: "btn-sm"
                        },
                        {
                            extend: "csv",
                            className: "btn-sm"
                        },
                        {
                            extend: "excel",
                            className: "btn-sm"
                        },
                        {
                            extend: "pdfHtml5",
                            className: ""
                        },
                        {
                            extend: "print",
                            className: "btn-sm"
                        },
                    ],
                    responsive: true
                });
            }
        };

        TableManageButtons = function () {
            "use strict";
            return {
                init: function () {
                    handleDataTableButtons();
                }
            };
        }();

        $('#datatable').DataTable({
            order: [
                [1, 'desc']
            ]
        });

        $('#datatable-keytable').DataTable({
            keys: true
        });

        $('#datatable-responsive').DataTable();

        $('#datatable-scroller').DataTable({
            ajax: "js/datatables/json/scroller-demo.json",
            deferRender: true,
            scrollY: 380,
            scrollCollapse: true,
            scroller: true
        });

        $('#datatable-fixed-header').DataTable({
            fixedHeader: true
        });

        var $datatable = $('#datatable-checkbox');

        $datatable.dataTable({
            'order': [[1, 'asc']],
            'columnDefs': [
                {orderable: false, targets: [0]}
            ]
        });
        $datatable.on('draw.dt', function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_flat-green'
            });
        });

        TableManageButtons.init();
    });
    $(function () {
        $('div#froala-editor').froalaEditor({})
    });

    $('.date').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
    });
</script>
<!-- /Datatables -->
{{--<script src="{{ mix('js/app.js') }}"></script>--}}

@yield('scripts')

</body>
</html>
