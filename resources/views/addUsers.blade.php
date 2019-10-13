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
                        Locations <small>Add</small>
                    </h1>
                </div>
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-lg-12">
                    <form role="form" action="{{Route('saveUser')}}" method="post">
                        {{csrf_field()}}

                        <div class="form-group" >
                            <label>Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>

                        <div class="form-group" >
                            <label>Account</label>
                            <input type="text" name="account" class="form-control">
                        </div>

                        <div class="form-group" >
                            <label>Password</label>
                            <input type="text" name="password" class="form-control">
                        </div>

                        <div class="form-group" >
                            <label>Phone</label>
                            <input type="number" name="phone" class="form-control">
                        </div>

                        <div class="form-group" >
                            <label>Address</label>
                            <input type="text" name="address" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Type</label>
                            <select name="type">
                                <?php if(!empty($types)){
                                foreach ($types as $value): ?>
                                <option value="{{$value['id']}}">{{$value['name']}}</option>
                                <?php endforeach;
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
@include("resources/footer")
<!-- End Footer -->
