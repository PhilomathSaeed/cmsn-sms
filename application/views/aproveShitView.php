<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE CONTENT-->

        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    View Result sheet<small>And Approve The sheet</small>
                </h3>
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        Home
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        Examination
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        Make Result
                    </li>
                    <li id="result" class="pull-right topClock"></li>

                </ul>
                <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
        </div>
        <!-- END PAGE HEADER-->

        <div class="row">
            <div class="col-sm-8 ">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet box green ">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-bars"></i> Check Or Approve The Result sheet.
                        </div>
                        <div class="tools">
                            <a href="" class="collapse">
                            </a>
                            <a href="" class="reload">
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>
                                            Date
                                        </th>
                                        <th>
                                            Class Title
                                        </th>
                                        <th>
                                            Exam Title
                                        </th>
                                        <th>
                                            Subject
                                        </th>
                                        <th>
                                            Teacher Name
                                        </th>
                                        <th>
                                            Show/Approve
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($shitList as $row) { ?>
                                        <tr>
                                            <td>
                                                <?php echo $row['date']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['class']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['exam_title']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['subject']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['teacher']; ?>
                                            </td>
                                            <td>
                                                <a class=" btn btn-xs purple tableActionButtonMargin" href="index.php?module=examination&view=checkResultShit&id=<?php echo $row['id']; ?>" class="btn btn-xs green"> <i class="fa fa-file-text-o"></i> Check Result</a>
                                                <a class=" btn btn-xs yellow tableActionButtonMargin" href="index.php?module=examination&view=approuveResultShit&id=<?php echo $row['id']; ?>&class=<?php echo $row['class']; ?>" class="btn btn-xs yellow"> <i class="fa fa-check"></i> Accept Result sheet </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- END SAMPLE FORM PORTLET-->
            </div>
            <div class="col-sm-4 ">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet box green ">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-bars"></i> Complete Full Class Result 
                        </div>
                        <div class="tools">
                            <a href="" class="collapse">
                            </a>
                            <a href="" class="reload">
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body form" >
                        <?php foreach ($classAction as $row1) { ?>
                            <a class="btn default btn-block" href="index.php?module=examination&view=finalResult&class=<?php echo $row1['class_title']; ?>&exam=<?php echo $row1['exam_title']; ?>&id=<?php echo $row1['id']; ?>"><?php echo $row1['class_title']; ?></a>
                        <?php } ?>
                    </div>
                </div>
                <!-- END SAMPLE FORM PORTLET-->
            </div>
        </div>
        <?php if (!empty($massage)) {
            echo $massage;
        } ?>
        <div class="row">
            <div class="col-sm-12 ">
                <div class="publishButton">
                    <a class="btn purple btn-block publishButtonFont" href="index.php?module=examination&view=publishResult" onclick="javascript:return confirm('Are you sure? You want to publich result today?')">Publish Result </a>
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