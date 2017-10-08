<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    Add Exam Grade <small></small>
                </h3>
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>Home
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        Examination
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        Exam Grade
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
                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-gift"></i>Form Actions On Bottom
                        </div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse">
                            </a>
                            <a href="javascript:;" class="reload">
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <?php $id = $_GET['id']; ?>
                        <!-- BEGIN FORM-->
                        <form action="index.php?module=examination&view=editGrade&id=<?php echo $id; ?>" class="form-horizontal" method="POST">
                            <?php foreach ($gradInfo as $row) { ?>
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Grade Name <span class="requiredStar"> * </span></label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" placeholder="Grade name like A+, A, A- or B"  value="<?php echo $row['grade_name']; ?>" name="gradeName" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Grade Point <span class="requiredStar"> * </span></label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" placeholder="Grade point like 5, 4, 3, ...."  value="<?php echo $row['point']; ?>" name="gradePoint" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Number From <span class="requiredStar"> * </span></label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" placeholder="Grade number area start number like 80-100 so give 80 here"  value="<?php echo $row['number_form']; ?>" name="numberFrom" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Number TO <span class="requiredStar"> * </span></label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" placeholder="Grade number area end number like 80-100 so give 100 here"  value="<?php echo $row['number_to']; ?>" name="nameTo" required="">
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="form-actions fluid">
                                <div class="col-md-offset-3 col-md-9">
                                    <button type="submit" class="btn blue" name="submit" value="Update">Update</button>
                                    <button type="button" class="btn default" onclick="location.href = 'javascript:history.back()'">Go Back</button>
                                </div>
                            </div>
                        </form>
                        <!-- END FORM-->
                    </div>
                </div>
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
