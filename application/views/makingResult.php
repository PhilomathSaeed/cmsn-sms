<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE CONTENT-->

        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    Make Result <small> <?php echo $examTitle; ?> For <?php echo $class; ?></small>
                </h3>
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        Home
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        Examination
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        Make Results
                    </li>
                    <li id="result" class="pull-right topClock"></li>
                </ul>
                <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
        </div>
        <!-- END PAGE HEADER-->

        <div class="row">
            <div class="col-md-12 ">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet box green ">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-bars"></i> Make Exam Result
                        </div>
                        <div class="tools">
                            <a href="" class="collapse">
                            </a>
                            <a href="" class="reload">
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <form class="form-horizontal" role="form" action="index.php?module=examination&view=submitResult" method="POST">
                            <?php $user = $this->ion_auth->user()->row(); ?>
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Exam Title <span class="requiredStar"> * </span></label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="Title here" name="examTitle" value="<?php echo $examTitle; ?>" readonly="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Class <span class="requiredStar"> * </span></label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="class" value="<?php echo $class; ?>" readonly="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Teacher Title <span class="requiredStar"> * </span></label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="teacherName" value="<?php echo $user->username; ?>" readonly="">
                                        <input class="form-control" type="hidden" name="teacherId" value="<?php echo $teacherInfo['id']; ?>">
                                    </div>
                                </div>
                                <input class="form-control" type="hidden" name="subjectName" value="<?php echo $subjectTitle; ?>">
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
                                                            Total Mark
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $i = 0;
                                                    foreach ($students as $row) {
                                                        $i++;
                                                        ?>
                                                        <tr>
                                                            <td>
    <?php echo $row['roll_number']; ?>
                                                                <input type="hidden" name="rollNumber_<?php echo $i; ?>" value="<?php echo $row['roll_number']; ?>">
                                                            </td>
                                                            <td>
    <?php echo $row['student_title']; ?>
                                                                <input type="hidden" name="studentTitle_<?php echo $i; ?>" value="<?php echo $row['student_title']; ?>">
                                                            </td>
                                                            <td>
    <?php echo $row['student_id']; ?>
                                                                <input type="hidden" name="studentId_<?php echo $i; ?>" value="<?php echo $row['student_id']; ?>">
                                                            </td>
                                                            <td>
                                                                <select class="form-control editresultSelect" name="result_<?php echo $i; ?>"required>
                                                                    <option value=""> Select.... </option>
                                                                    <option value="Pass"> Pass </option>
                                                                    <option value="Fail"> Fail </option>
                                                                    <option value="Absent"> Absent </option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <select class="form-control editresultSelect" name="gread_<?php echo $i; ?>" required>
                                                                    <option value="">  </option>
                                                                    <?php foreach ($gread as $row1) { ?>
                                                                        <option value="<?php echo $row1['grade_name']; ?>,<?php echo $row1['point']; ?>"> <?php echo $row1['grade_name']; ?> </option>
    <?php } ?>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <input class="form-control" type="text" name="totalMark_<?php echo $i; ?>" placeholder="Totla Mark" required>
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
                                    <button type="submit" class="btn green" name="submit">Submit</button>
                                    <button onclick="location.href = 'javascript:history.back()'" class="btn default">Go Back</button>
                                    <button type="reset" class="btn red">Cancel</button>
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

<script>
    jQuery(document).ready(function() {
//here is auto reload after 1 second for time and date in the top
        jQuery(setInterval(function() {
            jQuery("#result").load("index.php?module=home&view=iceTime");
        }, 1000));
    });
</script>
