<!-- Header -->
@include("resources/header")
<!-- End Header -->

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    HomePage <small>Overview</small>
                </h1>
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-dashboard"></i> HomePage
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
                            <th style="width: 10%; text-align: center;">Register</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(!empty($activities)){
                        $count = 0;
                        foreach ($activities as $value):
                        $count++;
                        ?>
                        <tr>
                            <td style="text-align: center">{{$count}}</td>
                            <td>{{$value['name']}}</td>
                            <td>{{$value['start_datetime']}}</td>
                            <td><?php echo \App\locationsModel::find($value['location'])->name ?></td>
                            <td style="text-align: center"><a href="login"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
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

<!-- Footer -->
@include("resources/footer")
<!-- End Footer -->
