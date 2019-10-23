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
                        Activities <small>Add</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li class="active">
                            <i class="fa fa-dashboard"></i> Activities/Add
                        </li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-lg-12">
                    <form role="form" action="{{Route('saveActivity')}}" method="post">
                        {{csrf_field()}}

                        <div class="form-group" >
                            <label>Movement Name</label>
                            <input type="text" name="movement_name" placeholder="Please input the field" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Date Time</label>
                            <input type="datetime-local" name="datetime" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Location</label>
                            <select name="location">
                                <?php if(!empty($locations)){
                                    foreach ($locations as $value): ?>
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
@include("resources.footer")
<!-- End Footer -->
