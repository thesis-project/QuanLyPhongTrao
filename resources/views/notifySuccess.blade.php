<!-- Header -->
@include("resources/header")
<!-- End Header -->

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
            @if(\Illuminate\Support\Facades\Auth::check())
                <?php $user_id = \Illuminate\Support\Facades\Auth::user()->id ?>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                        class="fa fa-user"></i> <?php echo \App\userModel::find($user_id)->name ?>
                    - <?php $typeuserId = \App\userModel::find($user_id)->type_user; echo \App\typesUserModel::find($typeuserId)->name ?>
                    <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                    </li>
                </ul>
            @else
                <a href="login"><i class="fa fa-fw fa-power-off"></i> Login</a>
            @endif
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
                <h3><a href="{{url('listActivitiesRegisted').'/'.$user_id}}">Danh sách các hoạt động đã đăng
                        ký</a></h3>
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->
<!-- /#wrapper -->

<!-- Footer -->
@include("resources/footer")
<!-- End Footer -->
