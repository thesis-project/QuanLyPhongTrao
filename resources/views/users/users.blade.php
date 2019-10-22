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
                        Users <small>Overview</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li class="active">
                            <i class="fa fa-dashboard"></i> Users
                        </li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-lg-12">
                    <h2>List Users</h2>
                    <div style="
                        font-size: 25px;
                        position: absolute;
                        right: 15px;
                        top: 22px;">
                        <i class="fa fa-plus" style="color: #428bca;"></i> <a href="{{url('admin/users/add')}}">Add</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th style="width: 5%; text-align: center">No.</th>
                                <th>Name</th>
                                <th>Account</th>
{{--                                <th>Password</th>--}}
                                <th style="width: 12%">Phone</th>
                                <th style="width: 20%">Address</th>
                                <th style="width: 10%">Type User</th>
                                <th style="width: 6%; text-align: center">Edit</th>
                                <th style="width: 6%; text-align: center">Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if(!empty($users)){
                                $count = 0;
                                foreach ($users as $value):
                                $count++;
                            ?>
                            <tr>
                                <td style="width: 5%; text-align: center;">{{$count}}</td>
                                <td>{{$value['name']}}</td>
                                <td>{{$value['account']}}</td>
{{--                                <td>{{$value['password']}}</td>--}}
                                <td>{{$value['phone']}}</td>
                                <td>{{$value['address']}}</td>
                                <td><?php echo \App\typesUserModel::find($value['type_user'])->name ?></td>
                                <td style="text-align: center"><a href="{{url('admin/users/edit').'/'.$value['id']}}"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
                                <td style="text-align: center"><a href="{{url('admin/users/delete').'/'.$value['id']}}"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
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
