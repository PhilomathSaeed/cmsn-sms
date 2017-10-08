<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE CONTENT-->

        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    Books Category  <small></small>
                </h3>
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        Home
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        Library
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        Add Books Category
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
                            <i class="fa fa-bars"></i> Add New Books Category. 
                        </div>
                        <div class="tools">
                            <a href="" class="collapse">
                            </a>
                            <a href="" class="reload">
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <form class="form-horizontal" role="form" action="index.php?module=library&view=editCategory" method="POST">
                            <div class="form-body">
                                <?php foreach ($books as $row) { ?> 

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Category Title <span class="requiredStar"> * </span></label>
                                        <div class="col-md-6">
                                            <input  class="form-control" type="text" name="category" placeholder="" value="<?php echo $row['category_title'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Parents Category <span class="requiredStar"> * </span></label>
                                        <div class="col-md-6">

                                            <select class="form-control" name="parent_category">
                                                <?php if (!empty($row['parent_category'])) { ?>
                                                    <option value="<?php echo $row['parent_category']; ?>"><?php echo $row['parent_category']; ?></option>
                                                <?php } else { ?>
                                                    <option value=""> </option>
                                                    <?php
                                                }
                                                foreach ($category as $row1) {
                                                    ?>
                                                    <option value="<?php echo $row1['category_title']; ?>"><?php echo $row1['category_title']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Description <span class="requiredStar"> * </span></label>
                                        <div class="col-md-6">
                                            <textarea class="form-control" name="description" rows="3"><?php echo $row['description'] ?></textarea>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="form-actions fluid">
                                <div class="col-md-offset-3 col-md-6">
                                    <button type="submit" name="submit" class="btn green" value="Submit">Submit</button>
                                    <button type="reset" onclick="location.href = 'javascript:history.back()'" class="btn default">Go Back</button>
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
