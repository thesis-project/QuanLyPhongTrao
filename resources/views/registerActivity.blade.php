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
        @if(\Illuminate\Support\Facades\Auth::check())
            <?php
                $user_id = \Illuminate\Support\Facades\Auth::user()->id;
                $typeUserId = \App\userModel::find($user_id)->type_user;
                $typeUserName = \App\typesUserModel::find($typeUserId)->name;
            ?>
            @if($typeUserName == 'admin')
                <a style="font-size: 18px;" class="navbar-brand" href="{{url('admin/dashboard')}}">Admin Page</a>
            @endif
        @endif
        <li class="dropdown">
            @if(\Illuminate\Support\Facades\Auth::check())
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>
                    <?php echo \App\userModel::find($user_id)->name ?>
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
    <div class="collapse navbar-collapse navbar-ex1-collapse"></div>
    <!-- /.navbar-collapse -->
</nav>

<div id="page-wrapper">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Homepage
                    @if(\Illuminate\Support\Facades\Auth::check())
                        <?php $user_id = \Illuminate\Support\Facades\Auth::user()->id ?>
                        <small style="float: right; font-size: 50%;"><a href="{{url('listActivitiesRegisted').'/'.$user_id}}">List Activities
                                Registered</a></small>
                    @endif
                </h1>
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-dashboard"></i> Homepage
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-lg-12">
                <h2>List Activities</h2>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th style="width: 5%; text-align: center">No.</th>
                            <th>Movement Name</th>
                            <th>Date Time Start</th>
                            <th>Short Content</th>
                            <th>Location</th>
                            <th>Organizer</th>
                            <th style="text-align: center">Number Registered</th>
                            <th style="width: 10%; text-align: center;">Register</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if(!empty($activities)){
                        $count = 0;
                        foreach ($activities as $value):
                        $count++;
                        ?>
                        <tr>
                            <td style="text-align: center">{{$count}}</td>
                            <td>{{$value['name']}}</td>
                            <td>{{$value['start_datetime']}}</td>
                            <td>{{$value['short_content']}}</td>
                            <td><?php echo \App\locationsModel::find($value['location'])->name ?></td>
                            <td><?php echo \App\userModel::find($value['organizer'])->name ?> -
                                Role: <?php $typeuserId = \App\userModel::find($value['organizer'])->type_user; echo \App\typesUserModel::find($typeuserId)->name ?>
                            </td>
                            <td style="text-align: center">
                                {{$students = \App\activityUserModel::all()->where('activity_id', $value['id'])->count()}} / {{$value['limited_number']}}
                            </td>
                        @if(\App\activityUserModel::all()->where('activity_id', $value['id'])->count() < $value['limited_number'])
                            @if(\Illuminate\Support\Facades\Auth::check())
                                <?php
                                if (in_array($value['id'], $array ?? '')){
                                ?>
                                    <td style="text-align: center">Đã đăng ký</td>
                                <?php
                                } else {
                                ?>
                                    <td style="text-align: center"><a href="{{url('register').'/'.$value['id']}}"><i
                                            class="fa fa-pencil" aria-hidden="true"></i></a></td>
                                <?php
                                }
                                ?>
                            @else
                                <td style="text-align: center"><a href="{{url('register').'/'.$value['id']}}"><i
                                            class="fa fa-pencil" aria-hidden="true"></i></a></td>
                            @endif
                        @else
                            <td style="text-align: center">Đã đủ số lượng</td>
                        @endif
                        </tr>
                        <?php
                        endforeach;
                        } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

<!-- Footer -->
@include("resources/footer")
<!-- End Footer -->
