<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE CONTENT-->

        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    Check Result sheet <small></small>
                </h3>
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <a href="index.php?module=welcome&view=admission">
                            Home
                        </a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        Examination
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        Add Exam Routine
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
                            <i class="fa fa-bars"></i> Check <?php echo $examTitle; ?> Result for <?php echo $class; ?>, Subject " <?php echo $subject; ?> " 
                        </div>
                        <div class="tools">
                            <a href="" class="collapse">
                            </a>
                            <a href="" class="reload">
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label textAlignRight">Exam Title <span class="requiredStar"> * </span></label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Title here" name="examTitle" value="<?php echo $examTitle; ?>" readonly="">
                                </div><div class="clearfix"> </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label textAlignRight">Class <span class="requiredStar"> * </span></label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" name="class" value="<?php echo $class; ?>" readonly="">
                                </div><div class="clearfix"> </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label textAlignRight">Teacher Title <span class="requiredStar"> * </span></label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" name="teacherName" value="<?php echo $teacher; ?>" readonly="">
                                </div><div class="clearfix"> </div>
                            </div>
                            <div class="portlet box blue">
                                <div class="portlet-title">
                                    <div class="caption">
                                        All Students Result
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
                                                <?php foreach ($resultShit as $row) { ?>
                                                    <tr>
                                                        <td><?php echo $row['roll_number'] ?></td>
                                                        <td><?php echo $row['student_name'] ?></td>
                                                        <td><?php echo $row['student_id'] ?></td>
                                                        <td><?php echo $row['result'] ?></td>
                                                        <td><?php echo $row['grade'] ?></td>
                                                        <td><?php echo $row['point'] ?></td>
                                                        <td><?php echo $row['mark'] ?></td>
                                                        <td>
                                                            <a href="index.php?module=examination&amp;view=editResult&id=<?php echo $row['id'] ?>" class="btn btn-xs default"> <i class="fa fa-pencil-square"></i> Edit </a>
                                                        </td>
                                                    </tr>
                                                <?php } ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions fluid">
                            <div class="col-md-offset-3 col-md-6">
                                <button type="submit" class="btn yellow" name="submit">Accept Result sheet</button>
                                <button onclick="location.href = 'javascript:history.back()'" class="btn default">Go Back</button>

                            </div>
                        </div>
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
