<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content contentHeight">
        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    Set Weekly Holy Day <small></small>
                </h3>
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        Home
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        Configuration
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        Weekly Day 
                    </li>
                    <li id="result" class="pull-right topClock"></li>
                </ul>
                <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
        </div>
        <!-- END PAGE HEADER-->

        <div class="row">
            <div class="col-sm-12">
                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-gears"></i> You Can set a weekly holy day.
                        </div>
                        <div class="tools">

                        </div>
                    </div>
                    <div class="portlet-body form">
                        <form action="index.php?module=configuration&view=conWeeklyDay" class="form-horizontal" method="POST">
                            <div class="form-body">
                                <div  id="div_scents">
                                    <?php $i = 1;
                                    foreach ($WeeklyDay as $row) {
                                        ?>
                                        <div class="row">
                                            <div class="col-sm-5 col-sm-offset-3 classGroupInput">
                                                <div class="form-group floatLeft">
                                                    <input type="text" name="dayID<?php echo $i; ?>" value="<?php echo $row['day_name']; ?>" class="form-control <?php echo $row['status']; ?>" readonly>
                                                </div>

                                                <div class="col-sm-5 floatRight">
                                                    <select name="status<?php echo $i; ?>" class="form-control <?php echo $row['status']; ?>">
                                                        <option value="<?php echo $row['status']; ?>"><?php echo $row['status']; ?> Selected</option>
                                                        <option value="Open" class="configWeeklyOpen">Open ( Working Day )</option>
                                                        <option value="Holyday" class="configWeeklyClose">Close ( Holy Day )</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <?php $i++;
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="form-actions fluid">
                                <div class="col-md-offset-3 col-md-9">
                                    <button type="submit" class="btn blue" name="submit" value="Save">Save</button>
                                    <button type="reset" class="btn default">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

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
