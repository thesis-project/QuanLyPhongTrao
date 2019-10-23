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
                <div class="col-lg-12">
                    <h2>List Activities</h2>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th style="width: 5%; text-align: center">No.</th>
                                <th>Movement Name</th>
                                <th style="width: 12%; ">Date Time</th>
                                <th>Location</th>
                                <th  style="width: 13%; ">Student Register</th>
                                <!-- <th style="width: 6%; text-align: center">Edit</th>
                                <th style="width: 6%; text-align: center">Delete</th> -->
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
                            if(!empty($activityUsers)){
                                $count = 0;
                                // dd($activityUsers);
                                foreach ($activityUsers as $activityUser):
                                    dd($activityUser);
                                    foreach($activityUser as $value):
                                        // dd($value);
                                        $count++;
                                ?>
                                <tr>
                                    <td style="text-align: center">{{$count}}</td>
                                    <td><a href="#"><?php echo \App\activitiesModel::find($value['activity_id'])->name ?></a></td>
                                    <td><?php echo \App\activitiesModel::find($value['activity_id'])->start_datetime ?></td>
                                    <td><?php 
                                        $locationId = \App\activitiesModel::find($value['activity_id'])->location;
                                        echo \App\locationsModel::find($locationId)->name ?></td>
                                    <td><?php 
                                        // $students = \App\activityUserModel::coun
                                    ?></td>
                                    <!-- <td style="text-align: center"><a href="{{url('/activities/edit').'/'.$value['id']}}"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
                                    <td style="text-align: center"><a href="{{url('/activities/delete').'/'.$value['id']}}"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td> -->
                                </tr>
                                <?php endforeach;
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

</div>
<!-- /#wrapper -->

<!-- Footer -->
@include("resources/footer")
<!-- End Footer -->
