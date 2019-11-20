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
        @if(\Illuminate\Support\Facades\Auth::check())
            <?php
                $user_id = \Illuminate\Support\Facades\Auth::user()->id;
                $typeUserId = \App\userModel::find($user_id)->type_user;
                $typeUserName = \App\typesUserModel::find($typeUserId)->name;
            ?>
            <a style="font-size: 18px;" class="navbar-brand" href="{{url('/')}}">Homepage</a>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                        class="fa fa-user"></i> {{\App\userModel::find($user_id)->name}}
                    - {{$typeUserName}}
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
        <ul class="nav navbar-nav side-nav">
            <li>
                <a href="{{url('admin/dashboard')}}"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
            </li>
            <li>
                <a href="{{url('admin/activities')}}"><i class="fa fa-fw fa-trophy"></i> Activities</a>
            </li>
            <li>
                <a href="{{url('admin/equipments')}}"><i class="fa fa-fw fa-plane"></i> Equipments</a>
            </li>
            <li>
                <a href="{{url('admin/equipmentsBorrowers')}}"><i class="fa fa-fw fa-renren"></i> Borrow Equipments</a>
            </li>
            <li>
                <a href="{{url('admin/locations')}}"><i class="fa fa-fw fa-map-marker"></i> Locations</a>
            </li>
            <li>
                <a href="{{url('admin/scholasticSemester')}}"><i class="fa fa-fw fa-graduation-cap"></i> Scholastic - Semester</a>
            </li>
            <li>
                <a href="{{url('admin/departments')}}"><i class="fa fa-fw fa-university"></i> Departments</a>
            </li>
            <li>
                <a href="{{url('admin/users')}}"><i class="fa fa-fw fa-user"></i> Users</a>
            </li>
            <li>
                <a href="{{url('admin/typesuser')}}"><i class="fa fa-fw fa-user"></i> Type Users</a>
            </li>
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>
