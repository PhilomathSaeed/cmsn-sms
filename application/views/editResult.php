<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE CONTENT-->
        <div class="row">
            <div class="col-md-12 ">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet box green ">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-bars"></i> Edit Previous Result's Number, Grade And Point
                        </div>
                        <div class="tools">
                            <a href="" class="collapse">
                            </a>
                            <a href="" class="reload">
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <form class="form-horizontal" role="form" action="index.php?module=examination&view=editResult&id=<?php echo $this->input->get('id'); ?>" method="POST">
                            <?php $user = $this->ion_auth->user()->row(); ?>
                            <div class="form-body">
                                <div class="portlet box blue">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            Give The Number And Grade Point.
                                        </div>
                                        <div class="tools">
                                            <a href="javascript:;" class="collapse"></a>
                                            <a href="javascript:;" class="reload"></a>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            Roll No
                                                        </th>
                                                        <th>
                                                            Student Name
                                                        </th>
                                                        <th>
                                                            Student ID
                                                        </th>
                                                        <th>
                                                            Result
                                                        </th>
                                                        <th>
                                                            Grade
                                                        </th>
                                                        <th>
                                                            Point
                                                        </th>
                                                        <th>
                                                            Total Mark
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $i = 0;
                                                    foreach ($previousResult as $row) {
                                                        ?>
                                                        <tr>
                                                            <td>    <?php echo $row['roll_number']; ?>
                                                            </td>
                                                            <td>    <?php echo $row['student_name']; ?>
                                                            </td>
                                                            <td>    <?php echo $row['student_id']; ?>
                                                            </td>
                                                            <td>
                                                                <select class="form-control editresultSelect" name="result" required>
                                                                    <option value="<?php echo $row['result']; ?>"><?php echo $row['result']; ?></option>
                                                                    <option value="Pass"> Pass </option>
                                                                    <option value="Fail"> Fail </option>
                                                                    <option value="Absent"> Absent </option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <select class="form-control editresultSelect" name="gread" required>
                                                                    <option value="<?php echo $row['grade']; ?>"><?php echo $row['grade']; ?></option>
                                                                    <?php foreach ($gread as $row1) { ?>
                                                                        <option value="<?php echo $row1['grade_name']; ?>"> <?php echo $row1['grade_name']; ?> </option>
    <?php } ?>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <select class="form-control editresultSelect" name="point"  required>
                                                                    <option value="<?php echo $row['point']; ?>"><?php echo $row['point']; ?></option>
                                                                    <?php foreach ($gread as $row1) { ?>
                                                                        <option value="<?php echo $row1['point']; ?>"> <?php echo $row1['point']; ?> </option>
    <?php } ?>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <input class="form-control" type="text" name="mark" placeholder="Mark" value="<?php echo $row['mark']; ?>" required>
                                                            </td>
                                                        </tr>
<?php } ?>
                                                <input class="form-control" type="hidden" name="ivalue" value="<?php echo $i; ?>"/>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions fluid">
                                <div class="col-md-offset-3 col-md-6">
                                    <button type="submit" class="btn green" name="submit" name="Update" value="Update">Update Result</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- END SAMPLE FORM PORTLET-->
            </div>
        </div>


        <!-- END PAGE CONTENT-->
    </div>
</div>
<!-- END CONTENT -->

