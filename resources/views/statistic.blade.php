<!-- Header -->
@include("resources/header")
<!-- End Header -->

<div id="wrapper">
    <!-- Navigation -->
@include("resources/navbar")
<!-- End Navigation -->

    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Dashboard <small>Overview</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li class="active">
                            <i class="fa fa-dashboard"></i> Dashboard
                        </li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-support fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{count($activities)}}</div>
                                    <div>Total Activities!</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-star-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{count($departments)}}</div>
                                    <div>Total Departments!</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{count($equipments)}}</div>
                                    <div>Total Equipments!</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{count($users)}}</div>
                                    <div>Total Users!</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->

            <div class="row">
                <form action="{{Route('statisticActivity')}}" method="post">
                    {{csrf_field()}}
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Department</label><br>
                            <select name="department" id="semesterId" class="form-control">
                                <?php
                                if(!empty($departments)){
                                foreach ($departments as $value): ?>
                                <option value="{{$value['id']}}">{{$value['name']}}</option>
                                <?php
                                endforeach;
                                } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Semester</label><br>
                            <select name="semester" id="semesterId" class="form-control">
                                <?php
                                if(!empty($semesters)){
                                    foreach ($semesters as $value): ?>
                                        <option value="{{$value['id']}}">{{$value['name']}}</option>
                                <?php
                                    endforeach;
                                } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Scholastic</label><br>
                            <select name="scholastic" id="scholasticId" class="form-control">
                                <?php
                                if(!empty($scholastics)){
                                    foreach ($scholastics as $value): ?>
                                        <option value="{{$value['id']}}">{{$value['name']}}</option>
                                <?php
                                    endforeach;
                                } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Submit</label><br>
                            <input type="submit" style="background-color: #428bca; border-color: #357ebd; color: #fff" class="form-control submit" value="Submit"/>
                        </div>
                    </div>
                </form>
            </div>

            <div class="row">
                <div class="col-lg-12" id="getActivities">
                    <h2>List Activities</h2>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Department</th>
                                <th>Semester</th>
                                <th>Scholastic</th>
                                <th style="text-align: center; width: 10%;">Total activities</th>
                                <th>Activity Name</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{\App\departmentModel::find($departmentId)->name}}</td>
                                    <td>{{\App\semesterModel::find($semesterId)->name}}</td>
                                    <td>{{\App\scholasticModel::find($scholasticId)->name}}</td>
                                    <?php
                                    $activities = Illuminate\Support\Facades\DB::table('activities')->where([
                                            ['department', '=', $departmentId],
                                            ['semester', '=', $semesterId],
                                            ['scholastic', '=', $scholasticId],
                                        ])->get();
                                    ?>
                                    <td style="text-align: center">{{count($activities)}}</td>
                                    <td>
                                        @foreach ($activities as $activity)
                                         {{$activity->name}} <br>
                                        @endforeach
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
{{--<script type="text/javascript">--}}
{{--    function filter() {--}}
{{--        var semesterId = document.getElementById('semesterId').value;--}}
{{--        var scholasticId = document.getElementById('scholasticId').value;--}}

{{--        $.get('/admin/filter/' + semesterId, function (data) {--}}
{{--            $('#getActivities').html(data);--}}
{{--        })--}}
{{--    }--}}
{{--</script>--}}
<!-- Footer -->
@include("resources/footer")
<!-- End Footer -->
