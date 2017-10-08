<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="assets/global/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
<!-- END PAGE LEVEL STYLES -->


<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    Edit exam Attendance Info<small></small>
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
                        Exam Attendance
                    </li>
                    <li id="result" class="pull-right topClock"></li>
                </ul>
                <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
        </div>
        <!-- END PAGE HEADER-->

        <!-- BEGIN PAGE CONTENT-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet box green-haze">
                    <div class="portlet-title">
                        <div class="caption">
                            Edit Student's Exam Attendance 
                        </div>
                        <div class="tools">
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <!-- BEGIN FORM-->
                        <form class="form-horizontal" action="index.php?module=examination&view=editExamAttendance&id=<?php echo $_GET['id']; ?>" method="POST">
                            <?php $i = 1;
                            foreach ($examAttendanceInf as $row) {
                                ?>
                                <div class="form-body">
                                    <div class="form-group">
                                        <div class="col-sm-offset-1 col-sm-2">
                                            <input type="text" name="rollNumber" value="<?php echo $row['roll_no'] ?>" class="form-control" readonly="">  
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" name="studentName" value="<?php echo $row['student_title']; ?>" class="form-control" readonly="">  
                                        </div>
                                        <div class="col-sm-3">
                                            <select class="form-control" name="action" required>
                                                <?php
                                                $att = $row['attendance'];
                                                if ($att == 'P') {
                                                    ?>
                                                    <option value="P" class="examAttendancePresent">Present</option>
                                                <?php } else { ?>
                                                    <option value="A" class="examAttendanceAbsent">Absent</option>
    <?php } ?>
                                                <option value="P">Present</option>
                                                <option value="A">Absent</option>
                                            </select> 
                                        </div>
                                    </div>
                                </div>
    <?php $i++;
}
?>

                            <div class="form-actions fluid">
                                <div class="col-sm-offset-3 col-md-9">
                                    <button class="btn green" type="submit" name="submit" value="Update">Update</button>
                                    <button onclick="location.href = 'javascript:history.back()'" type="button" class="btn blue">Go Back</button>
                                </div>
                            </div>
                        </form>
                        <!-- END FORM-->
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>
        <!-- END PAGE CONTENT-->
    </div>
</div>
<!-- END CONTENT -->


<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="assets/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<script src="assets/admin/pages/scripts/table-advanced.js"></script>

<script>
    jQuery(document).ready(function() {
    //here is auto reload after 1 second for time and date in the top
        jQuery(setInterval(function() {
            jQuery("#result").load("index.php?module=home&view=iceTime");
        }, 1000));
    });
</script>