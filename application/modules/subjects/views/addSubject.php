
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content contentHeight">
        <!-- BEGIN PAGE CONTENT-->

        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    Add Subject For Class <small></small>
                </h3>
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>Home
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        Subject
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        Add Subject
                    </li>
                    <li id="result" class="pull-right topClock"></li>
                </ul>
                <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
        </div>
        <!-- END PAGE HEADER-->

        <div class="row">
            <div class="col-md-12 ">
                <?php if (!empty($success)) {
                    echo $success;
                } ?>
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet box green ">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-book"></i> Add New Subject. 
                        </div>
                        <div class="tools">
                            <a href="" class="collapse">
                            </a>
                            <a href="" class="reload">
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <form class="form-horizontal" method="post" action="index.php?module=subjects&view=selectSubject">
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Class <span class="requiredStar"> * </span></label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="class_title" required="">
                                            <option>Select one</option>
                                            <?php foreach ($class as $row) { ?>
                                                <option value="<?php echo $row['class_title']; ?>"><?php echo $row['class_title']; ?></option>
<?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Subject Title <span class="requiredStar">  </span></label>
                                    <div class="col-md-6">
                                        <input type="text" name="subject_title_1" class="form-control" placeholder="Subject title here" required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Edition <span class="requiredStar">  </span></label>
                                    <div class="col-md-6">
                                        <input type="text" name="edition" class="form-control" placeholder="Subject Edition here">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Author Name <span class="requiredStar">  </span></label>
                                    <div class="col-md-6">
                                        <input type="text" name="writer_name" class="form-control" placeholder="Subject Authore Name here">
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions fluid">
                                <div class="col-md-offset-3 col-md-6">
                                    <button type="submit" name="submit" class="btn green" value="Add Subject">Add Subject</button>
                                    <button type="reset" class="btn default">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- END SAMPLE FORM PORTLET-->
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
