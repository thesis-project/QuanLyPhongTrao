<!-- Header -->
@include("resources/header")
<!-- End Header -->

<div id="wrapper">
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">
            <li class="dropdown">
                {{--            @if(isset($userLogin))--}}
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Admin <b
                        class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                    </li>
                </ul>
                {{--            @endif--}}
            </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">

        </div>
        <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Bạn đã đăng ký thành công
                        </h1>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->

<!-- Footer -->
@include("resources/footer")
<!-- End Footer -->
