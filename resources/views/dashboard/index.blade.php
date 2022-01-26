<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ $title }}</title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="/assets/adminLTE/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/adminLTE/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/adminLTE/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="/assets/adminLTE/css/AdminLTE.min.css">
    <link rel="stylesheet" href="/assets/adminLTE/css/skins/skin-red.min.css">
    <link rel="stylesheet" href="/assets/css/dashboard.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <script type="text/javascript" src="/assets/adminLTE/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="/assets/adminLTE/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/assets/adminLTE/js/adminlte.min.js"></script>
</head>

<body class="hold-transition skin-red sidebar-mini">
    <div class="wrapper">

        <header class="main-header">
            <a href="index2.html" class="logo">
                <span class="logo-mini"><b>SIG</b></span>
                <span class="logo-lg">
                    <b>ICT</b>
                    Group SIG
                </span>
            </a>
            <nav class="navbar navbar-static-top" role="navigation">
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
            </nav>
        </header>

        <aside class="main-sidebar">
            <section class="sidebar">
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="/assets/adminLTE/img/avatar.png" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p>
                            {{Auth::user()->name}}
                        </p>
                        <a href="#">
                            <i class="fa fa-circle text-success"></i>
                            Online
                        </a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">
                        Menu
                    </li>

                    {{-- <li class="treeview">
                        <a href="#">
                            <i class="fa fa-building"></i>
                            <span>
                                Anak Perusahaan
                            </span>

                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                              </span>
                            </a>
                            <ul class="treeview-menu ">
                              <li class=" {{ ($title === "PT Semen Indonesia Industri Bangunan" ? 'active' : '') }}"><a href="#" class=""> PT Semen Indonesia Industri Bangunan </a></li>
                              <li class="{{ ($title === "Dashboard v2" ? 'active' : '') }}"><a href="#"> Dashboard v2</a></li>
                            </ul>
                          </li>
                        </a>
                    </li> --}}

                    <li class="{{ ($title === "Data User" ? 'active' : '') }}">
                        <a href="{{config('app.url')}}/{{Request::segment(1)}}/{{Request::segment(2)}}/user">
                            <i class="fa fa-users"></i>
                            <span>
                                Management User
                            </span>
                        </a>
                    </li>

                    {{-- <li class="{{ ($title === "Data Role" ? 'active' : '') }}">
                        <a href="#">
                            <i class="fa fa-user"></i>
                            <span>
                                Management Role
                            </span>
                        </a>
                    </li> --}}

                    <li class="{{ ($title === "Data Nama Perusahaan" ? 'active' : '') }}">
                        <a href="{{config('app.url')}}/{{Request::segment(1)}}/{{Request::segment(2)}}/perusahaan">
                            <i class="fa fa-building "></i>
                            <span>
                                Management Perusahaan
                            </span>
                        </a>
                    </li>

                    <li class="{{ ($title === "Data Aplikasi" ? 'active' : '') }}">
                        <a href="{{config('app.url')}}/{{Request::segment(1)}}/{{Request::segment(2)}}/aplikasi">
                            <i class="fa fa-tablet"></i>
                            <span>
                                Management Aplikasi
                            </span>
                        </a>
                    </li>

                    <li class="{{ ($title === "Data Teknisi" ? 'active' : '') }}">
                        <a href="{{config('app.url')}}/{{Request::segment(1)}}/{{Request::segment(2)}}/teknisi">
                            <i class="fa fa-wrench"></i>
                            <span>
                                Management Teknisi
                            </span>
                        </a>
                    </li>

                    <li class="{{ ($title === "Logout" ? 'active' : '') }}">
                        <a href="#" data-toggle="modal" data-target="#ModalLogout">
                            <i class="fa fa-sign-out"></i>
                            <span>
                                Logout
                            </span>
                        </a>
                    </li>
                </ul>
            </section>
        </aside>

        @yield("content")

        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                Anything you want
            </div>
            <strong>Copyright &copy; {{date("Y")}} <a href="#">Company</a>.</strong> All rights reserved.
        </footer>
        <div class="control-sidebar-bg"></div>
    </div>
    <div class="modal fade" id="ModalLogout" tabindex="-1" aria-labelledby="ModalLogoutLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="ModalLogoutLabel">Logout</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{config('app.url')}}/logout">
                        @csrf
                        <p>
                            Apakah Anda Yakin?
                        </p>
                        <a href="javascript:void(0);" class="btn btn-danger" onclick="event.preventDefault();this.closest('form').submit();">
                            Logout
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>