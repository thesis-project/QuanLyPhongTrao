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
    <div class="collapse navbar-collapse navbar-ex1-collapse"></div>
    <!-- /.navbar-collapse -->
</nav>

<div id="page-wrapper">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Activities <small style="float: right; font-size: 50%;"><a style="color: #999;" href="{{url('checkAndShowRegisterActivities').'/'.$userId??''}}">Back to Homepage</a></small>
                </h1>
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-dashboard"></i> Activities/List Activities
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-lg-12">
                <h2>List Activities Registed</h2>
                <div style="
                        font-size: 25px;
                        position: absolute;
                        right: 15px;
                        top: 22px;">
                    <i class="fa fa-plus" style="color: #428bca;"></i> <a
                        href="{{url('checkAndShowRegisterActivities').'/'.$userId??''}}">Register Activities</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th style="width: 5%; text-align: center">No.</th>
                            <th>Movement Name 1</th>
                            <th>Date Time Start</th>
                            <th>Short Content</th>
                            <th>Location</th>
                            <th>Organizer</th>
                            <th style="width: 10%; text-align: center;">Undo</th>
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
                                <td><?php echo \App\activitiesModel::find($value['activity_id'])->name ?></td>
                                <td><?php echo \App\activitiesModel::find($value['activity_id'])->start_datetime ?></td>
                                <td><?php echo \App\activitiesModel::find($value['activity_id'])->short_content ?></td>
                                <td><?php $locationId = \App\activitiesModel::find($value['activity_id'])->location; echo \App\locationsModel::find($locationId)->name ?></td>
                                <td><?php $userId = \App\activitiesModel::find($value['activity_id'])->organizer; echo \App\userModel::find($userId)->name ?>
                                    -
                                    Role: <?php $typeuserId = \App\userModel::find($userId)->type_user; echo \App\typesUserModel::find($typeuserId)->name ?></td>
                                <td style="text-align: center"><a href="{{url('undo').'/'.$value['id']}}"><i
                                            class="fa fa-undo" aria-hidden="true"></i></a></td>
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

<!-- /#wrapper -->

<!-- Footer -->
@include("resources/footer")
<!-- End Footer -->
