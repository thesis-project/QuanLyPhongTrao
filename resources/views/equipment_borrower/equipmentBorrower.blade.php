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
                        EquipmentsBorrowers <small>Overview</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li class="active">
                            <i class="fa fa-dashboard"></i> EquipmentsBorrowers
                        </li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-lg-12">
                    <h2>List EquipmentsBorrowers</h2>
                    <div style="
                        font-size: 25px;
                        position: absolute;
                        right: 15px;
                        top: 22px;">
                        <i class="fa fa-plus" style="color: #428bca;"></i> <a href="{{url('admin/equipmentsBorrowers/add')}}">Add</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 5%; text-align: center">No.</th>
                                    <th>Title</th>
                                    <th>Equipment Name</th>
                                    <th>Borrower Name</th>
                                    <th>Manager Name</th>
                                    <th>Activity Name</th>
                                    <th>Note</th>
                                    <th style="width: 6%; text-align: center">Edit</th>
                                    <th style="width: 6%; text-align: center">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if(!empty($equipmentsBorrowers)){
                                    $count = 0;
                                    foreach ($equipmentsBorrowers as $value):
                                    $count++;
                                ?>
                                    <tr>
                                        <td style="text-align: center">{{$count}}</td>
                                        <td>{{$value['name']}}</td>
                                        <td>{{\App\equipmentsModel::find($value['equipment'])->name}}</td>
                                        <td>
                                            {{\App\userModel::find($value['borrower'])->name}} -
                                            {{\App\typesUserModel::find(\App\userModel::find($value['borrower'])->type_user)->name}}
                                        </td>
                                        <td>
                                            {{\App\userModel::find($value['manager'])->name}} -
                                            {{\App\typesUserModel::find(\App\userModel::find($value['manager'])->type_user)->name}}
                                        </td>
                                        <td>{{\App\activitiesModel::find($value['activity'])->name}}</td>
                                        <td>{{$value['note']}}</td>
                                        <td style="text-align: center"><a href="{{url('admin/equipmentsBorrowers/edit').'/'.$value['id']}}"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
                                        <td style="text-align: center"><a href="{{url('admin/equipmentsBorrowers/delete').'/'.$value['id']}}"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
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
