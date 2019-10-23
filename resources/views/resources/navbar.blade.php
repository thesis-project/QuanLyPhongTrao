<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{url('admin/dashboard')}}">Management System</a>
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
        <ul class="nav navbar-nav side-nav">
            <li>
                <a href="{{url('admin/dashboard')}}"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
            </li>
            <li>
                <a href="{{url('admin/activities')}}"><i class="fa fa-fw fa-bar-chart-o"></i> Activities</a>
            </li>
            <li>
                <a href="{{url('admin/locations')}}"><i class="fa fa-map-marker"></i> Locations</a>
            </li>
            <li>
                <a href="{{url('admin/users')}}"><i class="fa fa-user"></i> Users</a>
            </li>
            <li>
                <a href="{{url('admin/typesuser')}}"><i class="fa fa-user"></i> Type Users</a>
            </li>
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>
