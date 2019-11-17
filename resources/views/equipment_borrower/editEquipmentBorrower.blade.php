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
                        EquipmentBorrower <small>Edit</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li class="active">
                            <i class="fa fa-dashboard"></i> EquipmentBorrower/Edit
                        </li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-lg-12">
                    <form role="form" action="{{Route('editEquipmentBorrower')}}" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="id" value="{{$equipmentBorrow['id']}}">
                        <div class="form-group" >
                            <label>Title</label>
                            <input type="text" value="{{$equipmentBorrow['name']}}" name="name" placeholder="Please input the field" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Equipment Name</label><br>
                            <select name="equipment" class="form-control">
                                <?php
                                if(!empty($equipments)){
                                    foreach ($equipments as $value):
                                ?>
                                <option value="{{$value['id']}}"
                                    <?php
                                        if(!empty($equipmentBorrow)){
                                            if ($equipmentBorrow['equipment']==$value['id']): ?>
                                                selected="selected"
                                <?php
                                            endif;
                                        } ?>>
                                    {{$value['name']}}</option>
                                <?php
                                    endforeach;
                                } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Borrower Name</label><br>
                            <select name="borrower" class="form-control">
                                <?php
                                if(!empty($borrowers)){
                                    foreach ($borrowers as $value):
                                ?>
                                <option value="{{$value['id']}}"
                                        <?php
                                        if(!empty($equipmentBorrow)){
                                            if ($equipmentBorrow['borrower']==$value['id']): ?>
                                                selected="selected"
                                <?php
                                            endif;
                                        } ?>>
                                    {{$value['name']}} - Role: <?php echo \App\typesUserModel::find($value['type_user'])->name ?></option>
                                <?php
                                    endforeach;
                                } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Manager Name</label><br>
                            <select name="manager" class="form-control">
                                <?php
                                if(!empty($managers)){
                                    foreach ($managers as $value):
                                ?>
                                <option value="{{$value['id']}}"
                                        <?php
                                        if(!empty($equipmentBorrow)){
                                            if ($equipmentBorrow['manager']==$value['id']): ?>
                                                selected="selected"
                                <?php
                                            endif;
                                        } ?>>
                                    {{$value['name']}} - Role: <?php echo \App\typesUserModel::find($value['type_user'])->name ?></option>
                                <?php
                                endforeach;
                                } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Activity Name</label><br>
                            <select name="activity" class="form-control">
                                <?php
                                if(!empty($activities)){
                                    foreach ($activities as $value):
                                ?>
                                <option value="{{$value['id']}}"
                                        <?php
                                        if(!empty($equipmentBorrow)){
                                            if ($equipmentBorrow['activity']==$value['id']): ?>
                                                selected="selected"
                                <?php
                                            endif;
                                        } ?>>
                                    {{$value['name']}}</option>
                                <?php
                                    endforeach;
                                } ?>
                            </select>
                        </div>

                        <div class="form-group" >
                            <label>Note</label>
                            <textarea name="note" cols="30" class="form-control" rows="3">{{$equipmentBorrow['note']}}</textarea>
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
