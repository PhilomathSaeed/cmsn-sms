<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE CONTENT-->

        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    Add Class Routine<small></small>
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
                        Add Class Routine
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
                            <i class="fa fa-bars"></i> Make Routine For <?php $classTile;
echo $classTile; ?>
                        </div>
                        <div class="tools">
                            <a href="" class="collapse">
                            </a>
                            <a href="" class="reload">
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <form class="form-horizontal" role="form" action="index.php?module=sclass&view=addClassRoutin" method="POST">
                            <div class="form-body">
                                <div class="alert alert-info marginBottomNone">
                                    <div class="form-group marginBottomNone">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="hidden" name="class" value="<?php $classTile;
echo $classTile; ?>">
                                                <div class="col-md-2 routineFildMarginBottom">
                                                    <select class="form-control" name="day" required="">
                                                        <?php foreach ($day as $row) { ?>
                                                            <option class="<?php echo $row['status']; ?>"><?php echo $row['day_name']; ?></option>
<?php } ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-2 routineFildMarginBottom">
                                                    <select class="form-control" name="subject" required="">
                                                        <option>Select Subject</option>
                                                        <?php foreach ($subject as $row1) { ?>
                                                            <option><?php echo $row1['subject_title'] ?></option>
<?php } ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-2 routineFildMarginBottom">
                                                    <select class="form-control" name="teacher" required="">
                                                        <option>Select Teacher</option>
                                                        <?php foreach ($teacher as $row2) { ?>
                                                            <option><?php echo $row2['fullname'] ?></option>
<?php } ?>
                                                        <option>Sunday</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-2 routineFildMarginBottom">
                                                    <input type="text" class="form-control" placeholder="Start Time" name="startTime" required="">
                                                </div>
                                                <div class="col-md-2 routineFildMarginBottom">
                                                    <input type="text" class="form-control" placeholder="End Time" name="endTime" required="">
                                                </div>
                                                <div class="col-md-2 routineFildMarginBottom">
                                                    <input type="text" class="form-control" placeholder="Rome No" name="roomNumber" required="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions fluid marginTopNone">
                                <div class="col-md-offset-3 col-md-9">
                                    <button class="btn blue" type="submit" name="submit2" value="Add Routine Subject">Add Routine Subject</button>
                                    <button class="btn default" type="reset">Refresh</button>
                                </div>
                            </div>
                        </form>

                        <div class="alert alert-warning">
                            <div class="portlet box blue">
                                <div class="portlet-title">
                                    <div class="caption">
<?php $classTile;
echo $classTile;
?> Routine
                                    </div>
                                    <div class="tools">
                                        <a href="javascript:;" class="collapse">
                                        </a>
                                        <a href="javascript:;" class="reload">
                                        </a>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <?php
                                    foreach ($day as $row3) {
                                        $dayTitle = $row3['day_name'];
                                        $dayStatus = $row3['status'];
                                        ?>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="col-sm-2 day <?php echo $dayStatus; ?>">
                                                <?php echo $dayTitle; ?>
                                                </div>
                                                <?php
                                                //$query = array();
                                                $query = $this->classmodel->getWhere('class_routine', 'day_title', $dayTitle, 'class_title', $classTile);
                                                foreach ($query as $row4) {
                                                    ?>
                                                    <div class="col-sm-2 subject">
                                                        <p><?php echo $row4['subject']; ?></p>
                                                        <p><?php echo $row4['subject_teacher']; ?></p>
                                                        <p class="pFontSize"><?php echo $row4['start_time']; ?> - <?php echo $row4['end_time']; ?></p>
                                                        <p class="pFontSize">Rome: <?php echo $row4['room_number']; ?></p>
                                                    </div>
                                        <?php } ?>
                                            </div>
                                        </div>
<?php } ?>
                                </div>
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
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="assets/global/plugins/jquery.input-ip-address-control-1.0.min.js"></script>
<script>
    jQuery(document).ready(function() {
//here is auto reload after 1 second for time and date in the top
        jQuery(setInterval(function() {
            jQuery("#result").load("index.php?module=home&view=iceTime");
        }, 1000));
    });
</script>