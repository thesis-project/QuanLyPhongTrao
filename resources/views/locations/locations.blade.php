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
                        Locations <small>Overview</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li class="active">
                            <i class="fa fa-dashboard"></i> Locations
                        </li>
                    </ol>
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
                        <i class="fa fa-plus" style="color: #428bca;"></i> <a href="{{url('admin/locations/add')}}">Add</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th style="width: 5%; text-align: center">No.</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th style="width: 6%; text-align: center">Edit</th>
                                <th style="width: 6%; text-align: center">Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($locations))
                                @for($count = 0; $count < count($locations); $count++)
                                    <tr>
                                        <td style="text-align: center">{{$count}}</td>
                                        <td>{{$locations[$count]['name']}}</td>
                                        <td>{{$locations[$count]['address']}}</td>
                                        <td style="text-align: center"><a href="{{route('editLocations', ['id' => $locations[$count]['id']])}}"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
                                        <td style="text-align: center"><a href="{{route('deleteLocation', ['id' => $locations[$count]['id']])}}"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                                    </tr>
                                @endfor
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="mapouter"><div class="gmap_canvas"><iframe width="100%" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=C%E1%BA%A7n%20Th%C6%A1%20university&t=&z=17&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.embedgooglemap.net/blog/ipvanish-coupon/">embedgooglemap.net</a></div><style>.mapouter{position:relative;text-align:right;height:500px;width:100%;}.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:100%;}</style></div>
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
