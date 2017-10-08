<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="assets/global/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css"/>
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
                    Class Attendance <small></small>
                </h3>
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <a href="index.php?module=welcome&view=allStudent">Home</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="index.php?module=welcome&view=allStudent">Attendance</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="index.php?module=welcome&view=allStudent">Class Title </a>
                    </li>

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
                            Attendance Information's are here. 
                        </div>
                        <div class="tools">
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <!-- BEGIN FORM-->
                        <form class="form-horizontal" action="index.php?module=dailyAttendance&view=editAttendance&ghtnidjdfjkid=<?php echo $_GET['ghtnidjdfjkid']; ?>" method="POST">
                            <div class="form-body">
                                <div class="form-group">
                                    <div class="col-sm-offset-1 col-sm-2">
                                        <input type="text" placeholder="Roll Number" class="form-control" disabled="">  
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" placeholder="Student Name" class="form-control" disabled="">  
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" placeholder="Action" class="form-control" disabled="">  
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" placeholder="Attendence %" class="form-control" disabled="">  
                                    </div>
                                </div>
                            </div>



                            <?php $i = 1;
                            foreach ($editInfo as $row) {
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
                                                <option value="0">Select now..</option>
                                                <option value="P">Present</option>
                                                <option value="A">Absent</option>
                                            </select> 
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="text" placeholder="<?php echo $row['percentise_month']; ?> %" class="form-control" disabled="">

                                        </div>

                                        <input type=hidden name="userId" value="<?php echo $row['user_id']; ?>">
                                        <input type="hidden" name="studentInfoId" value="<?php echo $row['student_id'] ?>">
                                        <input type=hidden name="classTitle" value="<?php echo $row['class_title']; ?>">
                                        <input type="hidden" name="section" value="<?php echo $row['section'] ?>">
                                        <input type=hidden name="in_velu" value="<?php echo $i; ?>">
                                    </div>
                                </div>
                                <?php $i++;
                            }
                            ?>

                            <div class="form-actions fluid">
                                <div class="col-sm-offset-3 col-md-9">
                                    <button class="btn blue" type="submit" name="submit" value="Submit">Submit</button>
                                    <button class="btn default" type="reset">Cancel</button>
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

