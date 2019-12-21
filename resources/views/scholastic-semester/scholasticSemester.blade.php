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
                <div class="col-lg-6 modifyBorderRight">
                    <h1 class="page-header">
                        Semester <small>Overview</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li class="active">
                            <i class="fa fa-dashboard"></i> Semester
                        </li>
                    </ol>
                </div>
                <div class="col-lg-6">
                    <h1 class="page-header">
                        Scholastic <small>Overview</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li class="active">
                            <i class="fa fa-dashboard"></i> Scholastic
                        </li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-lg-6 modifyBorderRight">
                    <h2>List Semesters</h2>
                    <div style="
                        font-size: 25px;
                        position: absolute;
                        right: 15px;
                        top: 22px;">
                        <i class="fa fa-plus" style="color: #428bca;"></i> <a href="{{url('admin/scholasticSemester/addSemester')}}">Add</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th style="width: 5%; text-align: center">No.</th>
                                <th>Semester</th>
                                <th style="width: 6%; text-align: center">Edit</th>
                                <th style="width: 6%; text-align: center">Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($semester))
                                @for($count = 0; $count < count($semester); $count++)
                                    <tr>
                                        <td style="width: 5%; text-align: center;">{{$count}}</td>
                                        <td>{{$semester[$count]['name']}}</td>
                                        <td style="text-align: center"><a href="{{url('admin/scholasticSemester/editSemester').'/'.$semester[$count]['id']}}"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
                                        <td style="text-align: center"><a href="{{url('admin/scholasticSemester/deleteSemester').'/'.$semester[$count]['id']}}"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                                    </tr>
                                @endfor
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h2>List Scholastics</h2>
                    <div style="
                        font-size: 25px;
                        position: absolute;
                        right: 15px;
                        top: 22px;">
                        <i class="fa fa-plus" style="color: #428bca;"></i> <a href="{{url('admin/scholasticSemester/addScholastic')}}">Add</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th style="width: 5%; text-align: center">No.</th>
                                <th>Scholastic</th>
                                <th style="width: 6%; text-align: center">Edit</th>
                                <th style="width: 6%; text-align: center">Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($scholastics))
                                @for($count = 0; $count < count($scholastics); $count++)
                                    <tr>
                                        <td style="width: 5%; text-align: center;">{{$count}}</td>
                                        <td>{{$scholastics[$count]['name']}}</td>
                                        <td style="text-align: center"><a href="{{url('admin/scholasticSemester/editScholastic').'/'.$scholastics[$count]['id']}}"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
                                        <td style="text-align: center"><a href="{{url('admin/scholasticSemester/deleteScholastic').'/'.$scholastics[$count]['id']}}"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                                    </tr>
                                @endfor
                            @endif
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
