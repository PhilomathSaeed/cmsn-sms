
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
                        All Subject
                    </li>
                    <li id="result" class="pull-right topClock"></li>
                </ul>
                <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
        </div>
        <!-- END PAGE HEADER-->

        <div class="row">
            <div class="col-md-12 ">
                <?php
                if (!empty($success)) {
                    echo $success;
                }
                ?>
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet box green ">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-book"></i><?php $class =$this->input->get('class');
                echo $class;
                ?>  all subject's. 
                        </div>
                        <div class="tools">
                            <a href="" class="collapse">
                            </a>
                            <a href="" class="reload">
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body form subjectDetailsPadintTop">
                        <div class="col-sm-6 col-sm-offset-3">

                            <div class="row">
                                <div class="col-sm-12">
<?php foreach ($SubjectInfo as $row) { ?>
                                        <div class="alert alert-info">
                                            <h2 class="marginTopNone"><?php echo $row['subject_title']; ?></h2>
                                            <strong><?php echo $row['writer_name']; ?></strong>&nbsp;&nbsp;&nbsp;&nbsp; This subject Editions is: <?php echo $row['edition']; ?> .
                                        </div>
<?php } ?>

                                </div>
                            </div>

                        </div><div class="clearfix"> </div>
                        <div class="form-actions fluid">
                            <div class="col-md-offset-3 col-md-9">
                                <button onclick="location.href = 'javascript:history.back()'" class="btn green classSubjectDetailsGoBack" type="button"> Go Back </button>
                            </div>
                        </div>
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