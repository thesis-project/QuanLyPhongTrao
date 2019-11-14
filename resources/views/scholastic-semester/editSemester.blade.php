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
                        Semester <small>Edit</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li class="active">
                            <i class="fa fa-dashboard"></i> Semester/Edit
                        </li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-lg-12">
                    <form role="form" action="{{Route('editSemester')}}" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="id" value="{{$semester['id']}}">
                        <div class="form-group" >
                            <label>Semester</label>
                            <input type="text" name="semester" placeholder="Please input the field" value="{{$semester['name']}}" class="form-control">
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
