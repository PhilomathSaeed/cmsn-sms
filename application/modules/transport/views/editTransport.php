
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE CONTENT-->

        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    Edit Transport Information<small></small>
                </h3>
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        Home
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        Transport
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        All Transport
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
                            <i class="fa fa-bars"></i> Give The Information For Edit Transport.
                        </div>
                        <div class="tools">
                            <a href="" class="collapse">
                            </a>
                            <a href="" class="reload">
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <form class="form-horizontal" role="form" action="index.php?module=transport&view=editTransport&id=<?php echo$this->input->get('id'); ?>" method="POST">
                            <?php foreach ($transport as $row) { ?>    
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Route Title <span class="requiredStar"> * </span></label>
                                        <div class="col-md-6">
                                            <input  class="form-control" type="text" name="routeTitle" placeholder="" value="<?php echo $row['rout_title']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Route Start and End <span class="requiredStar"> * </span></label>
                                        <div class="col-md-6">
                                            <input  class="form-control" type="text" name="startEnd" placeholder="" value="<?php echo $row['start_end']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Vehicles Amount <span class="requiredStar"> * </span></label>
                                        <div class="col-md-6">
                                            <input  class="form-control" type="text" name="vehiclesAmount" placeholder="" value="<?php echo $row['vicles_amount']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Description<span class="requiredStar"></span></label>
                                        <div class="col-md-6">
                                            <textarea class="form-control" rows="3" name="description"> <?php echo $row['descriptions']; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="form-actions fluid">
                                <div class="col-md-offset-3 col-md-6">
                                    <button type="submit" class="btn green" name="submit" value="Submit">Submit</button>
                                    <button type="reset" class="btn default">Cancel</button>
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

