<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE CONTENT-->

        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    Edit Book's Previous Informations <small></small>
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
                        Add Book
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
                            Give the new book Information bellow.
                        </div>
                        <div class="tools">
                            <a href="" class="collapse">
                            </a>
                            <a href="" class="reload">
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <form class="form-horizontal" role="form" action="index.php?module=library&view=editBook&id=<?php echo $this->input->get('id'); ?>" method="POST">
                            <?php foreach ($Book as $row) { ?>    
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Book Title <span class="requiredStar"> * </span></label>
                                        <div class="col-md-6">
                                            <input  class="form-control" type="text" name="bookTitle" value="<?php echo $row['books_title']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Book Editions <span class="requiredStar"> </span></label>
                                        <div class="col-md-6">
                                            <input  class="form-control" type="text" name="bookEdition" placeholder="Books Editions"  value="<?php echo $row['edition']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Book's Authors <span class="requiredStar"> * </span></label>
                                        <div class="col-md-6">
                                            <input  class="form-control" type="text" name="bookAuthor" placeholder="Book's Author" value="<?php echo $row['authore']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Category <span class="requiredStar"> * </span></label>
                                        <div class="col-md-6">
                                            <select class="form-control" name="booksCategory">
                                                <option value="<?php echo $row['category']; ?>"><?php echo $row['category']; ?> </option>
                                                <?php foreach ($category as $row1) { ?>
                                                    <option value="<?php echo $row1['category_title']; ?>"> <?php echo $row1['category_title']; ?></option>
                                                <?php } ?>


                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Pages<span class="requiredStar"> * </span></label>
                                        <div class="col-md-6">
                                            <input  class="form-control" type="text" name="pages" placeholder="Page Amount" value="<?php echo $row['pages']; ?>" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Short Descriptions <span class="requiredStar"> </span></label>
                                        <div class="col-md-6">
                                            <textarea class="form-control" name="description" rows="3"> <?php echo $row['description']; ?></textarea>
                                        </div>
                                    </div>

                                </div>
                            <?php } ?>
                            <div class="form-actions fluid">
                                <div class="col-md-offset-3 col-md-6">
                                    <button type="submit" name="submit" class="btn green" value="Submit">Submit</button>
                                    <button type="reset" class="btn default" onclick="location.href = 'javascript:history.back()'">Go Back</button>
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
