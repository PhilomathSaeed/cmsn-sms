<!-- END PAGE LEVEL STYLES -->
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE CONTENT-->

        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    Edit Class Routine<small></small>
                </h3>
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        Home
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        Class
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        Class Routine<i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        Edit Routine
                    </li>

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
                            <i class="fa fa-bars"></i> Edit Routine For <?php $classTile = $_GET['class'];
echo $classTile;
?>
                        </div>
                        <div class="tools">
                            <a href="" class="collapse">
                            </a>
                            <a href="" class="reload">
                            </a>
                            </d                    <div class="portlet-body form">
                                <form class="form-horizontal" role="form" action="index.php?module=sclass&view=editRoutine&id=<?php echo $_GET['id']; ?>&class=<?php echo $classTile; ?>" method="POST">
                                    <div class="form-body">
                                        <div class="alert alert-info marginBottomNone">
                                            <div class="form-group marginBottomNone">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <?php
                                                        if (!empty($message)) {
                                                            echo $message;
                                                        }
                                                        ?>
<?php foreach ($previousRoutin as $routin) { ?>
                                                            <input type="hidden" name="class" value="<?php $classTile;
    echo $classTile;
    ?>">
                                                            <div class="col-md-2 routineFildMarginBottom">
                                                                <select class="form-control" name="day" required="">
                                                                    <option value="<?php echo $routin['day_title']; ?>" class="editRoutineSelectColor"><?php echo $routin['day_title']; ?></option>
    <?php foreach ($day as $row) { ?>
                                                                        <option class="<?php echo $row['status']; ?>"><?php echo $row['day_name']; ?></option>
    <?php } ?>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-2 routineFildMarginBottom">
                                                                <select class="form-control" name="subject" required="">
                                                                    <option value="<?php echo $routin['subject']; ?>" class="editRoutineSelectColor"><?php echo $routin['subject']; ?></option>
    <?php foreach ($subject as $row1) { ?>
                                                                        <option><?php echo $row1['subject_title'] ?></option>
    <?php } ?>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-2 routineFildMarginBottom">
                                                                <select class="form-control" name="teacher" required="">
                                                                    <option value="<?php echo $routin['subject_teacher']; ?>" class="editRoutineSelectColor"><?php echo $routin['subject_teacher']; ?></option>
    <?php foreach ($teacher as $row2) { ?>
                                                                        <option><?php echo $row2['fullname'] ?></option>
    <?php } ?>
                                                                    <option>Sunday</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-2 routineFildMarginBottom">
                                                                <input type="text" class="form-control" placeholder="Start Time" value="<?php echo $routin['start_time']; ?>" name="startTime" required="">
                                                            </div>
                                                            <div class="col-md-2 routineFildMarginBottom">
                                                                <input type="text" class="form-control" placeholder="End Time" value="<?php echo $routin['end_time']; ?>" name="endTime" required="">
                                                            </div>
                                                            <div class="col-md-2 routineFildMarginBottom">
                                                                <input type="text" class="form-control" placeholder="Rome No" value="<?php echo $routin['room_number']; ?>" name="roomNumber" required="">
                                                            </div>
<?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions fluid marginTopNone">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button class="btn blue" type="submit" name="update" value="Update">Update</button>

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
    </div>
