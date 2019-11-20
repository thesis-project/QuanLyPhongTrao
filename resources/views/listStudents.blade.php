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
                        Activities <small>Overview</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li class="active">
                            <i class="fa fa-dashboard"></i> Activities/List Students
                        </li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-lg-12">
                    <h2>List Students Register</h2>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th style="width: 5%; text-align: center">No.</th>
                                <th>Register</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Type</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if(!empty($students)){
                                $count = 0;
                                foreach ($students as $value):
                                    $count++;
                            ?>
                            <tr>
                                <td style="text-align: center">{{$count}}</td>
                                <td>{{\App\userModel::find($value['user_id'])->name}}</td>
                                <td>{{\App\userModel::find($value['user_id'])->phone}}</td>
                                <td>{{\App\userModel::find($value['user_id'])->address}}</td>
                                <td>{{\App\typesUserModel::find(\App\userModel::find($value['user_id'])->type_user)->name}}</td>
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
@include("resources/footer")
<!-- End Footer -->
