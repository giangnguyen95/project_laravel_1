<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Khóa Học Lập Trình Laravel Framework 5.x Tại Khoa Phạm">
    <meta name="author" content="Vu Quoc Tuan">
    <title>Admin - Shopping</title>
    <!--google font-->
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
    

    <!-- Bootstrap Core CSS -->
    <link href="{{ url('admin/bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"> 

    <!-- MetisMenu CSS -->
    <link href="{{ url('admin/bower_components/metisMenu/dist/metisMenu.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Custom CSS -->
    <link href="{{ url('admin/dist/css/sb-admin-2.css') }}" rel="stylesheet" type="text/css">

    <!-- Custom Fonts -->
    <link href="{{ url('admin/bower_components/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

    <!-- DataTables CSS -->
    <link href="{{ url('admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css">

    <!-- DataTables Responsive CSS -->
    <link href="{{ url('admin/bower_components/datatables-responsive/css/dataTables.responsive.css') }}" rel="stylesheet" type="text/css">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.css"/>
 
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.js"></script>

    <!--CKeditor & CKfinder-->
    <script src="{{ url('admin/js/ckeditor/ckeditor.js') }}"></script>

    <script src="{{ url('admin/js/ckfinder/ckfinder.js') }}"></script>
    <script type="text/javascript">
        var baseURL = "{{url('/')}}";
       // alert(baseURL);
    </script>

    <script src="{{ url('admin/js/func_ckfinder.js') }}"></script>
    <!--end-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{url('/master')}}">Admin</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i>{{Auth::user()->username}}</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="{{url('/logout')}}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="{{url('/master')}}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Category<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{url('/cates')}}">List Category</a>
                                </li>
                                <li>
                                    <a href="{{url('cates/add')}}">Add Category</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-cube fa-fw"></i> Product<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{url('products')}}">List Product</a>
                                </li>
                                <li>
                                    <a href="{{url('products/add')}}">Add Product</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> User<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{url('/users')}}">List User</a>
                                </li>
                                <li>
                                    <a href="{{url('/users/add')}}">Add User</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">@yield('model')
                            <small>@yield('action')</small>
                        </h1>
                    </div>

                    <div class="col-lg-12">
                        @if(Session::has('flash_message'))
                            <div class="alert alert-{{ Session::get('flash_level') }}">
                                {{Session::get('flash_message')}}
                            </div>
                        @endif
                    </div>

                    <!--This is content-->
                    @yield('content')
                    <!-- /.col-lg-12 -->
                   
                    <!--End content-->

                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="{{ url('admin/bower_components/jquery/dist/jquery.min.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ url('admin/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{ url('admin/bower_components/metisMenu/dist/metisMenu.min.js') }}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{ url('admin/dist/js/sb-admin-2.js') }}"></script>

    <!-- DataTables JavaScript -->
    <script src="{{ url('admin/bower_components/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ url('admin/bower_components/datatables-responsive/js/dataTables.responsive.js') }}"></script>

    <!--my script-->
    <script src="{{ url('admin/js/myscript.js') }}"></script>
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->

    <script type="text/javascript">
        function xacnhanxoa(msg){
            if(window.confirm(msg)){
                return true;
            }
            return false;
        }
    </script>
</body>

</html>
