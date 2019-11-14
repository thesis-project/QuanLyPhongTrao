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
                        EquipmentBorrower <small>Add</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li class="active">
                            <i class="fa fa-dashboard"></i> EquipmentBorrower/Add
                        </li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-lg-12">
                    <form role="form" action="{{Route('saveEquipmentBorrower')}}" method="post">
                        {{csrf_field()}}

                        <div class="form-group" >
                            <label>Title</label>
                            <input type="text" name="name" placeholder="Please input the field" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Equipment Name</label><br>
                            <select name="equipment" class="modifySelect">
                                <?php
                                if(!empty($equipments)){
                                foreach ($equipments as $value): ?>
                                <option value="{{$value['id']}}">{{$value['name']}}</option>
                                <?php
                                endforeach;
                                } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Borrower Name</label><br>
                            <select name="borrower" class="modifySelect">
                                <?php
                                if(!empty($borrowers)){
                                foreach ($borrowers as $value): ?>
                                <option value="{{$value['id']}}">{{$value['name']}} - Role: <?php echo \App\typesUserModel::find($value['type_user'])->name ?></option>
                                <?php
                                endforeach;
                                } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Manager Name</label><br>
                            <select name="manager" class="modifySelect">
                                <?php
                                if(!empty($managers)){
                                foreach ($managers as $value): ?>
                                <option value="{{$value['id']}}">{{$value['name']}} - Role: <?php echo \App\typesUserModel::find($value['type_user'])->name ?></option>
                                <?php
                                endforeach;
                                } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Activity Name</label><br>
                            <select name="activity" class="modifySelect">
                                <?php
                                if(!empty($activities)){
                                foreach ($activities as $value): ?>
                                <option value="{{$value['id']}}">{{$value['name']}}</option>
                                <?php
                                endforeach;
                                } ?>
                            </select>
                        </div>

                        <div class="form-group" >
                            <label>Note</label>
                            <textarea name="note" cols="30" class="form-control" rows="3"></textarea>
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
