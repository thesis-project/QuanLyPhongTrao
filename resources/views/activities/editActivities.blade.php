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
                        Activities <small>Edit</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li class="active">
                            <i class="fa fa-dashboard"></i> Activities/Edit
                        </li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-lg-12">
                    <form role="form" action="{{Route('editActivity')}}" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="id" value="{{$activities['id']}}">
                        <div class="form-group" >
                            <label>Movement Name</label>
                            <input type="text" name="movement_name" class="form-control" placeholder="Please input the field" value="{{$activities['name']}}">
                        </div>

                        <div class="form-group">
                            <label>Date Time Start</label>
                            <input type="datetime-local" name="datetime" class="form-control" value="{{$activities['start_datetime']}}">
                        </div>

                        <div class="form-group" >
                            <label>Short Content</label>
                            <input type="text" name="short_content" placeholder="Please input the field" class="form-control" value="{{$activities['short_content']}}">
                        </div>

                        <div class="form-group">
                            <label>Organizer</label><br>
                            <select name="organizer" class="modifySelect">
                                <?php
                                if(!empty($users)) {
                                    foreach ($users as $value): ?>
                                        <option value="{{$value['id']}}"
                                            <?php
                                            if(!empty($activities)){
                                                if ($activities['organizer']==$value['id']): ?>
                                                selected="selected"
                                            <?php
                                                endif;
                                            } ?>>
                                            Name: {{$value['name']}} - Role: <?php echo \App\typesUserModel::find($value['type_user'])->name ?>
                                        </option>
                                <?php
                                    endforeach;
                                } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Location</label><br>
                            <select name="location" class="modifySelect">
                                <?php
                                if(!empty($locations)){
                                    foreach ($locations as $value): ?>
                                    <option value="{{$value['id']}}"
                                        <?php
                                        if(!empty($activities)){
                                            if ($activities['location']==$value['id']): ?>
                                                selected="selected"
                                        <?php
                                            endif;
                                        } ?>>
                                        {{$value['name']}}
                                    </option>
                                <?php endforeach;
                                } ?>
                            </select>
                        </div>

                        <div class="form-group" >
                            <label>Limited Number</label>
                            <input type="number" name="limitNumber" value="{{$activities['name']}}" placeholder="Please input the field" class="form-control">
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
