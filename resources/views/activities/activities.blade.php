<!-- Header -->
@include("resources.header")
<!-- End Header -->

<div id="wrapper">
    <!-- Navigation -->
@include("resources.navbar")
<!-- End Navigation -->

    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Activities <small>Overview</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li class="active">
                            <i class="fa fa-dashboard"></i> Activities
                        </li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-lg-12">
                    <h2>List Activities</h2>
                    <div style="
                        font-size: 25px;
                        position: absolute;
                        right: 15px;
                        top: 22px;">
                        <i class="fa fa-plus" style="color: #428bca;"></i> <a href="{{url('admin/activities/add')}}">Add</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 2.5%; text-align: center">No.</th>
                                    <th>Movement Name</th>
                                    <th style="width: 9%">Date Time Start</th>
                                    <th>Short Content</th>
                                    <th>Location</th>
                                    <th style="width: 11.5%">Organizer</th>
                                    <th>Department</th>
                                    <th>Semester</th>
                                    <th>Scholastic</th>
                                    <th style="width: 6%; text-align: center">Registered Number</th>
                                    <th style="width: 4%; text-align: center">Edit</th>
                                    <th style="width: 3%; text-align: center">Delete</th>
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
                                        <td>{{\App\locationsModel::find($value['location'])->name}}</td>
                                        <td>{{\App\userModel::find($value['organizer'])->name}} - Role: {{\App\typesUserModel::find(\App\userModel::find($value['organizer'])->type_user)->name}}</td>
                                        <td>{{\App\departmentModel::find($value['department'])->name}}</td>
                                        <td>{{\App\semesterModel::find($value['semester'])->name}}</td>
                                        <td>{{\App\scholasticModel::find($value['scholastic'])->name}}</td>
                                        <td style="text-align: center"><a href="{{url('admin/students').'/'.$value['id']}}">{{\App\activityUserModel::all()->where('activity_id', $value['id'])->count()}}</a> / {{$value['limited_number']}}</td>
                                        <td style="text-align: center"><a href="{{url('admin/activities/edit').'/'.$value['id']}}"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
                                        <td style="text-align: center"><a href="{{url('admin/activities/delete').'/'.$value['id']}}"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                                    </tr>
                                <?php endforeach;
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
</div>
<!-- /#wrapper -->

<!-- Footer -->
@include("resources.footer")
<!-- End Footer -->
