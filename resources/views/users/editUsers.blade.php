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
                        User <small>Edit</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li class="active">
                            <i class="fa fa-dashboard"></i> User/Edit
                        </li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-lg-12">
                    <form role="form" action="{{Route('editUser')}}" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="id" value="{{$user['id']}}">
                        <div class="form-group" >
                            <label>Name</label>
                            <input type="text" name="name" value="{{$user['name']}}" placeholder="Please input the field" class="form-control">
                        </div>

                        <div class="form-group" >
                            <label>Account</label>
                            <input type="text" name="account" value="{{$user['account']}}" placeholder="Please input the field" class="form-control">
                        </div>

                        <div class="form-group" >
                            <label>Password</label>
                            <input type="password" name="password" value="" placeholder="Please input the field" class="form-control">
                        </div>

                        <div class="form-group" >
                            <label>Phone</label>
                            <input type="number" name="phone" value="{{$user['phone']}}" placeholder="Please input the field" class="form-control">
                        </div>

                        <div class="form-group" >
                            <label>Address</label>
                            <input type="text" name="address" value="{{$user['address']}}" placeholder="Please input the field" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Type</label><br>
                            <select name="type" class="form-control">
                                <?php
                                if(!empty($types)){
                                    foreach ($types as $value): ?>
                                        <option value="{{$value['id']}}"
                                        <?php
                                        if(!empty($user)){
                                            if ($user['type_user']==$value['id']): ?>
                                                selected="selected"
                                        <?php
                                            endif;
                                        } ?>>
                                        {{$value['name']}}
                                        </option>
                                <?php
                                    endforeach;
                                } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <input type="submit" value="Submit"/>
                        </div>
                    </form>
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
