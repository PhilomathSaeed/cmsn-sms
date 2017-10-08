<!-- END PAGE LEVEL STYLES -->
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE CONTENT-->
        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    <?php $classTile;
                    echo $classTile; ?> Routine<small></small>
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
                        Class Routine
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
                            <i class="fa fa-bars"></i><?php $classTile;
                    echo $classTile;
                    ?> Full Routine.
                        </div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse">
                            </a>
                            <a href="javascript:;" class="reload">
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body form">

                        <div class="alert alert-warning">
                            <div class="portlet box blue">
<?php if ($this->ion_auth->is_admin()) { ?>
                                    <div class="portlet-title">
                                        <div class="caption">
                                            Edit Or Delete <?php $classTile;
    echo $classTile; ?> Routine's Bellow.
                                        </div>
                                        <div class="tools">
                                            <a href="javascript:;" class="collapse">
                                            </a>
                                            <a href="javascript:;" class="reload">
                                            </a>
                                        </div>
                                    </div>
                                    <?php } ?>
                                <div class="portlet-body">
                                    <?php
                                    foreach ($day as $row3) {
                                        $dayTitle = $row3['day_name'];
                                        $dayStatus = $row3['status'];
                                        ?>
                                        <div class="row">
                                            <div class="col-md-12 classRoutineRow">
                                                <div class="col-sm-2 day <?php echo $dayStatus; ?>">
                                                <?php echo $dayTitle; ?>
                                                </div>
                                                <?php
                                                //$query = array();
                                                $query = $this->classmodel->getWhere('class_routine', 'day_title', $dayTitle, 'class_title', $classTile);
                                                foreach ($query as $row4) {
                                                    ?>
                                                    <div class="">
                                                        <div class="col-sm-2 effect left_to_right subjectMotherDiv">
                                                            <div class="backDiv subject">
                                                                <p><?php echo $row4['subject']; ?></p>
                                                                <p><?php echo $row4['subject_teacher']; ?></p>
                                                                <p class="pFontSize"><?php echo $row4['start_time']; ?> - <?php echo $row4['end_time']; ?></p>
                                                                <p class="pFontSize">Rome: <?php echo $row4['room_number']; ?></p>
                                                            </div>
        <?php if ($this->ion_auth->is_admin()) { ?>
                                                                <div class="info">
                                                                    <button class="btn blue btn-xs buttonMargin" onclick="window.location.href = 'index.php?module=sclass&view=editRoutine&id=<?php echo $row4['id']; ?>&class=<?php echo $classTile; ?>'" type="button"><i class="fa fa-cogs"></i> Edit</button>
                                                                    <a class="btn btn-xs red buttonMargin" href="index.php?module=sclass&view=deleteRoutine&id=<?php echo $row4['id']; ?>&class=<?php echo $classTile; ?>" onClick='javascript:return confirm("Are you sure you want to delete this student?")'> <i class="fa fa-trash-o"></i> Delete </a>
                                                                </div>
                                                    <?php } ?>
                                                        </div>
                                                    </div>
                                        <?php } ?>
                                            </div>
                                        </div>
<?php } ?>
                                </div>
                            </div>
                            <div class="form-actions fluid marginTopNone">
                                <div class="col-md-offset-3 col-md-9">
                                    <button class="btn blue col-sm-9 col-xs-12 routineGoBack" type="button" onclick="window.location.href = 'javascript:history.back()'">Go Back</button>
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


<!-- BEGIN GOOGLE RECAPTCHA -->
<script type="text/javascript">
    var RecaptchaOptions = {
        theme: 'custom',
        custom_theme_widget: 'recaptcha_widget'
    };
</script>
<script>
    $(document).ready(function() {
        $("button").click(function() {
            $("p").toggle();
        });
    });
</script>
<script>
    jQuery(document).ready(function() {
        //here is auto reload after 1 second for time and date in the top
        jQuery(setInterval(function() {
            jQuery("#result").load("index.php?module=home&view=iceTime");
        }, 1000));
    });
</script>
