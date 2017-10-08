<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE CONTENT-->
        <div class="row">
            <div class="col-md-12 ">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet box green ">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-bars"></i> Edit Accounts Information 
                        </div>
                        <div class="tools">
                            <a href="" class="collapse">
                            </a>
                            <a href="" class="reload">
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <form class="form-horizontal" role="form" action="index.php?module=account&view=editAccountInfo&id=<?php echo $this->input->get('id'); ?>" method="POST">
                            <?php foreach ($accountInfo as $row) { ?>
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Account Title <span class="requiredStar"> * </span></label>
                                        <div class="col-md-6">
                                            <input class="form-control" type="text" placeholder="" name="accountTitle" value="<?php echo $row['account_title']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Account Type <span class="requiredStar"> * </span></label>
                                        <div class="col-md-6">
                                            <select  class="form-control" name="type">
                                                <option value="<?php echo $row['category']; ?>"> <?php echo $row['category']; ?></option>
                                                <option value="Income">Income</option>
                                                <option value="Expense">Expense</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Description <span class="requiredStar"> * </span></label>
                                        <div class="col-md-6">
                                            <textarea class="form-control" rows="3" name="description"><?php echo $row['description']; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="form-actions fluid">
                                <div class="col-md-offset-3 col-md-6">
                                    <button type="submit" class="btn green" name="submit" value="Update">Update</button>
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
