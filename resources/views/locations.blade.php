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
                        Location <small>Overview</small>
                    </h1>
                </div>
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-lg-12">
                    <h2>List Locations</h2>
                    <div style="
                        font-size: 25px;
                        position: absolute;
                        right: 15px;
                        top: 22px;">
                        <i class="fa fa-plus" style="color: #428bca;"></i> <a href="{{url('/locations/add')}}">Add</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th style="width: 7%; text-align: center">Edit</th>
                                    <th style="width: 7%; text-align: center">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($locations)){
                                    $count = 0;
                                    foreach ($locations as $value):
                                    $count++;
                                ?>
                                    <tr>
                                        <td>{{$count}}</td>
                                        <td>{{$value['name']}}</td>
                                        <td>{{$value['address']}}</td>
                                        <td style="text-align: center"><a href="{{url('/locations/edit').'/'.$value['id']}}"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
                                        <td style="text-align: center"><a href="{{url('/locations/delete').'/'.$value['id']}}"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
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