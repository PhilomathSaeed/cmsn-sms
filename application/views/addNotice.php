

<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    Add New Notice <small></small>
                </h3>
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>Home
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>Notice Board
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>Add New Notice
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
                <!-- BEGIN EXTRAS PORTLET-->
                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-gift"></i>Give Your Massage.
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <!-- BEGIN FORM-->
                        <form action="index.php?module=notice&view=addNotice" class="form-horizontal form-bordered" method="POST">

                            <div class="form-body">
                                <div class="form-group last">
                                    <label class="control-label col-md-3">Subject</label>
                                    <div class="col-md-9">
                                        <input class="form-control"  type="text" name="noticeSubject">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Notice Follower</label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="receiver">
                                            <option value="all">All Users</option>
                                            <option value="teacher">All Teacher</option>
                                            <option value="student">All student</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group last">
                                    <label class="control-label col-md-3">Notice or Massage</label>
                                    <div class="col-md-9">
                                        <textarea class="ckeditor form-control" name="noticeDetails" rows="6"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions fluid">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button type="submit" class="btn green" name="submit" value="Submit"><i class="fa fa-check"></i> Submit</button>
                                            <button type="reset" class="btn default">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- END FORM-->
                    </div>
                </div>
                <!-- END EXTRAS PORTLET-->
            </div>
        </div>
        <!-- END PAGE CONTENT-->
    </div>
</div>
<!-- END CONTENT -->

<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="assets/global/plugins/ckeditor/ckeditor.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<script>
    jQuery(document).ready(function() {
//here is auto reload after 1 second for time and date in the top
        jQuery(setInterval(function() {
            jQuery("#result").load("index.php?module=home&view=iceTime");
        }, 1000));
    });
</script>
